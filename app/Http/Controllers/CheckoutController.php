<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Mail;
class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth=auth('cus')->user();
        return view('home.checkout',compact('auth'));
    }
    public function history()
    {
        $auth=auth('cus')->user();
        
        return view('home.history',compact('auth'));
    }
    public function detail(Order $order)
    {
        $auth=auth('cus')->user();
        
        return view('home.detail',compact('auth','order'));
    }
    public function post_checkout(Request $request)
    {
        $auth=auth('cus')->user();

        $rules=[
            'name'=>'required|min:6|max:100',
            'email'=>'required|email|min:6|max:100',
            'phone'=>'required|min:10|max:15',
            'address'=>'required|min:4|max:255',
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
        

        ];
        $request->validate($rules, $message);
        $data = $request->only('name', 'email', 'phone', 'address');
        $data['customer_id']=$auth->id;

        if($order=Order::create($data))
        {
            $token=\Str::random(40);
            foreach($auth->carts as $cart)
            {
                $data1=[
                    'order_id'=>$order->id,
                    'product_id'=>$cart->product_id,
                    'price'=>$cart->price,
                    'quantity'=>$cart->quantity
                ];
                Order_Detail::create($data1);
            }
            // $auth->carts()->delete();
            $order->token=$token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order,$token));
            return redirect()->route('home.index')->with('ok','Đặt hàng thành công,vui lòng kiểm tra gmail để xác nhận');

        }
        return redirect()->route('home.index')->with('no','Đặt hàng thất bại');

    }
    public function verify($token){
       $order=Order::where('token',$token)->first();
       if($order)
       {
        $order->status=1;
        $order->token=null;
        $order->save();
        return redirect()->route('home.index')->with('ok','Đơn hàng của bạn đã được xác nhận');
    }
       
    }
}
