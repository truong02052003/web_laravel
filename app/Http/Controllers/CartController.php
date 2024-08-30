<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        
        return view('home.cart');
        
    }
    public function add(Product $product ,Request $request)
    {
        $quantity=$request->quantity ?floor($request->quantity):1;
        $cus_id=auth('cus')->id();
        $cartExist=Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])->first();
        if($cartExist)
        {
            Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])->increment('quantity',$quantity);
            // $cartExist->update([
            //     'quantity'=>$cartExist->quantity+$quantity
            // ]);
            return redirect()->route('cart.index')->with('ok','Bạn cập nhập số lượng sản phẩm');

        }
        else
        {
            $data=[
                'customer_id'=>auth('cus')->id(),
                'product_id'=>$product->id,
                'price'=>$product->sale_price ? $product->sale_price : $product->pice,
                'quantity'=>$quantity
            ];
        }
        
        if(Cart::create($data))
        {
            return redirect()->route('cart.index')->with('ok','Bạn vừa thêm sản phẩm vào giỏ hàng');
        }
        return redirect()->back()->with('no','Lỗi xảy ra');

    }
    public function update(Product $product,Request $request)
    {
        
        $quantity=$request->quantity ?floor($request->quantity):1;
        $cus_id=auth('cus')->id();
        $cartExist=Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])->first();
        if($cartExist)
        {
            Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])
            ->update([
                'quantity'=>$quantity
            ]);
            return redirect()->route('cart.index')->with('ok','Bạn cập nhập số lượng sản phẩm');

        }
        
        return redirect()->back()->with('no','Lỗi xảy ra');

    }
    public function delete($product_id)
    {   
        $cus_id=auth('cus')->id();
        Cart::where(['customer_id'=>$cus_id,'product_id'=>$product_id])
        ->delete();
        return redirect()->back()->with('ok','Bạn vừa xóa sản phẩm ra khỏi giỏ hàng');

    }
    public function clear()
    {
        $cus_id=auth('cus')->id();

        Cart::where(['customer_id'=>$cus_id])
        ->delete();
    
    return redirect()->back()->with('ok','Bạn vừa xóa hết sản phẩm ra khỏi giỏ hàng');
    }
}
