<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $topBanner=Banner::getBanner()->first();
        $gallerys=Banner::getBanner('gallery')->get();
        $news_products=Product::orderBy('created_at','DESC')->limit(2)->get();
        $sale_products=Product::orderBy('created_at','DESC')->where('sale_price','>',0)->limit(3)->get();
        $hot_products=Product::inRandomOrder()->limit(4)->get();
        $blogs_product=Product::inRandomOrder()->limit(3)->get();

        return view ('home.index',compact('topBanner','gallerys','news_products','sale_products', 'hot_products','blogs_product'));
    }
    public function about()
    {
        return view ('home.about');
    }
    public function category(Category $cat)
    {
        $products=$cat->products()->paginate(9);
        $news_products=Product::orderBy('created_at','DESC')->limit(3)->get();
        return view ('home.category',compact('cat','products','news_products'));
    }
    public function product(Product $product)
    {
        $products=Product::where('category_id',$product->category_id)->limit(12)->get();
        return view ('home.product',compact('product','products'));
    }
    public function favorite($product_id)
    {   
        $user_id=auth('cus')->id();
        $data=[
            'product_id'=>$product_id,
            'customer_id'=>auth('cus')->id()
        ];
        $favorited=Favorite::where(['product_id'=>$product_id,'customer_id'=>auth('cus')->id()])->first();
        if($favorited)
        {
            $favorited->delete();
            return redirect()->back()->with('ok','Bạn bỏ yêu thích sản phẩm này');      

        }
        else{
            Favorite::create($data);
        return redirect()->back()->with('ok','Bạn vừa chọn vào yêu thích sản phẩm này');      
        }
    }
}
