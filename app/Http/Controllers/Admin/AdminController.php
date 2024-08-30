<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function login(){
        return view('admin.login');
    }
    public function check_login(Request $request){
       
        $rules=[
        'email'=>'required|email|min:6|max:100',
        'password'=>'required'
       ];
       $message=[

        'email.required' => 'Email không được để trống.',
        'email.email' => 'Email không hợp lệ.',
        'email.unique' => 'Email đã được sử dụng.',
        'email.min' => 'Email phải có ít nhất 6 ký tự.',
        'email.max' => 'Email không được vượt quá 100 ký tự.',
        'password.required' => 'Mật khẩu không được để trống.',
        'password.min' => 'Mật khẩu phải có ít nhất 4 ký tự.',
        'password.max' => 'Mật khẩu không được vượt quá 225 ký tự.',
    ];
    $request->validate($rules, $message);
       $data=$request->only('email','password');
       $check=auth()->attempt($data);
       if($check)
       {
        return redirect()->route('admin.index')->with('ok','Xin Chào');
       }
       return redirect()->back()->with('no','tài khoản mật khẩu không chính xác');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('ok','đăng xuất thành công');
     }
}
