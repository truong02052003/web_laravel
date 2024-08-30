<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function login()
    {
        return view('account.login');
    }
    public function favorite()
    {
        $favorites=auth('cus')->user()->favorites ? auth('cus')->user()->favorites :[];
        // dd($favorites);
        return view('account.favorite',compact('favorites'));
    }
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('account.login')->with('ok', 'bạn vừa đăng suất');
    }
    public function check_login(Request $request)
{
    $rules = [
        'email' => 'required|email|min:6|max:100',
        'password' => 'required',
    ];
    
    $request->validate($rules);
    $data = $request->only('email', 'password');
    // dd($data);
    $check = auth('cus')->attempt($data);
    if ($check) {
        if (auth('cus')->user()->email_verified_at === null) {
            auth('cus')->logout();
            return redirect()->back()->with('no', 'Tài khoản chưa được xác nhận');
        }
        return redirect()->route('home.index')->with('ok', 'Đăng nhập thành công');
    }
    return redirect()->back()->with('no', 'Tài khoản hoặc mật khẩu không đúng');
}
    
    public function register()
    {
        return view('account.register');
    }
    public function check_register(Request $request)
    {
        // dd($request->all());
        $rules=[
            'name'=>'required|min:6|max:100',
            'email'=>'required|email|min:6|max:100',
            'phone'=>'required|min:10|max:15',
            'address'=>'required|min:4|max:255',
            'password'=> 'required|min:4|max:255',
            'confirm_password'=>'required|same:password',
        ];
        $message=[
            'name.required' => 'Họ tên không được để trống.',
            'name.min' => 'Họ tên phải có ít nhất 6 ký tự.',
            'name.max' => 'Họ tên không được vượt quá 100 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'email.min' => 'Email phải có ít nhất 6 ký tự.',
            'email.max' => 'Email không được vượt quá 100 ký tự.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.min' => 'Địa chỉ phải có ít nhất 4 ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 15 ký tự.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 4 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 225 ký tự.',
            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống.',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu đã nhập.'
        

        ];
        $request->validate($rules, $message);
        $data = $request->only('name', 'email', 'phone', 'address', 'gender');
        $data['password']=bcrypt($request->password);
        // dd($data);
        if($acc=Customer::create($data))
        {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok','đăng ký thành công');
        }
        return redirect()->back()->with('no','đăng ký không thành công');
    }
    public function veryfy($email)
    {
        $acc=Customer::where('email',$email)->whereNULL('email_verified_at')->firstOrFail();
        Customer::where('email',$email)->update(['email_verified_at'=> date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok','đăng ký thành công');
    }
    public function change_password()
    {
        return view('account.change_password');
    }
    public function check_change_password()
    {
        
    }
    public function forgot_password()
    {
        return view('account.forgot_password');
    }
    public function check_forgot_password()
    {
        
    }
    public function profile()
    {
        return view('account.profile');
    }
    public function check_profile()
    {
        
    }
    public function reset_password()
    {
        return view('account.reset_password');
    }
    public function check_reset_password()
    {
        
    }
    
}
