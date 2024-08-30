<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::orderBy('id','DESC')->paginate(5);
        return view('admin.product.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats=Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|min:4|max:150|unique:products',
            'price'=>'required|numeric',
            'content'=>'required|string',
            'sale_price'=>'required|lte:price',
            'image'=>'required|file|mimes:jpg,jpeg,png',
            'category_id'=>'required|exists:categories,id',
        ];
            $message = [
                'name.required' => 'Tên sản phẩm là bắt buộc.',
                'name.min' => 'Tên sản phẩm phải có ít nhất 4 ký tự.',
                'name.max' => 'Tên sản phẩm không được vượt quá 150 ký tự.',
                'name.unique' => 'Tên sản phẩm đã tồn tại trong hệ thống.',
                
                'content'=>"mô tả là bắt buộc",
                'content.string' => 'Nội dung phải là một chuỗi ký tự.',

                'price.required' => 'Giá sản phẩm là bắt buộc.',
                'price.numeric' => 'Giá sản phẩm phải là một số.',
                
                'sale_price.required' => 'Giá bán là bắt buộc.',
                'sale_price.lte' => 'Giá bán phải nhỏ hơn hoặc bằng giá gốc.',
                
                'image.required' => 'Ảnh phải là bắt buộc.',
                'image.file' => 'Ảnh phải là một tệp.',
                'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
                
                'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
                'category_id.exists' => 'Danh mục sản phẩm không tồn tại trong hệ thống.',
            ];
        
            $request->validate($rules, $message);
            $data=$request->only('name','price','sale_price','status','content','category_id');
            $image_name=$request->image->hashName();
            $request->image->move(public_path('uploads/product'),$image_name);
            $data['image']=$image_name;
            
            if($product=Product::create($data))
            {   
                if($request->has('images'))
                {
                    foreach($request->images as $imgs)
                    {
                        $images=$imgs->hashName();
                        $imgs->move(public_path('uploads/product'),$images);
                        Product_Image::create([
                            'image'=>$images,
                            'product_id'=>$product->id
                        ]);
                    }
                }
                return redirect()->route('product.index')->with('ok','Thêm mới sản phẩm thành công');
            }
            return redirect()->back()->with('no','có lỗi trông quá trình thêm mới vui lòng thử lại');
            
        }
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cats=Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.edit',compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules=[
            'name'=>'required|min:4|max:150|unique:products,name,'.$product->id,
            'price'=>'required|numeric',
            'sale_price'=>'required|lte:price',
            'image'=>'file|mimes:jpg,jpeg,png',
            'category_id'=>'required|exists:categories,id',
        ];
            $message = [
                'name.required' => 'Tên sản phẩm là bắt buộc.',
                'name.min' => 'Tên sản phẩm phải có ít nhất 4 ký tự.',
                'name.max' => 'Tên sản phẩm không được vượt quá 150 ký tự.',
                'name.unique' => 'Tên sản phẩm đã tồn tại trong hệ thống.',
                
                'price.required' => 'Giá sản phẩm là bắt buộc.',
                'price.numeric' => 'Giá sản phẩm phải là một số.',
                
                'sale_price.required' => 'Giá bán là bắt buộc.',
                'sale_price.lte' => 'Giá bán phải nhỏ hơn hoặc bằng giá gốc.',
                
                'image.file' => 'Ảnh phải là một tệp.',
                'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
                
                'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
                'category_id.exists' => 'Danh mục sản phẩm không tồn tại trong hệ thống.',
            ];
        
            $request->validate($rules, $message);
            $data=$request->only('name','price','sale_price','status','content','category_id');
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu có
                if (isset($product->image)) {
                    $oldImagePath = public_path(`uploads/product/` . $product->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
        
                // Lưu ảnh mới
                $image_name = $request->file('image')->hashName();
                $request->file('image')->move(public_path('uploads/product'), $image_name);
                $data['image'] = $image_name;
            }
            
            if($product->update($data))
            {   
                if($request->has('images'))
                {
                    Product_Image::where('product_id',$product->id)->delete();
                    foreach($request->images as $imgs)
                    {
                        $images=$imgs->hashName();
                        $imgs->move(public_path('uploads/product'),$images);
                        Product_Image::create([
                            'image'=>$images,
                            'product_id'=>$product->id
                        ]);
                    }
                }
                return redirect()->route('product.index')->with('ok','sửa sản phẩm thành công');
            }
            return redirect()->back()->with('no','có lỗi trông quá trình sửa vui lòng thử lại');
            
        }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
        $images=$product->image;
        $image_path=public_path('uploads/product'). '/' .$images;

        if($product->images->count()>0){
            foreach($product->images as $img)
            {
                $images=$img->image;
                $image_path=public_path('uploads/product'). '/' .$images;
                if(file_exists($image_path))
            {
                unlink($image_path);
            }
            }
            Product_Image::where('product_id',$product->id)->delete();
        
        
            if($product->delete())
        { 
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            return redirect()->route('product.index')->with('ok','Xóa mới sản phẩm thành công');
        }        
    }
    else{
         if($product->delete())
        { 
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            return redirect()->route('product.index')->with('ok','Xóa mới sản phẩm thành công');
        }        
    }
    return redirect()->back()->with('no','có lỗi trông quá trình xóa vui lòng thử lại');
    }

        
    public function destroyImage(Product_Image $image)
    {
        $images=$image->image;
        if($image->delete())
        {   
            $image_path=public_path('uploads/product'). '/' .$images;
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            return redirect()->back()->with('ok','Xóa ảnh sản phẩm thành công');
        }
        return redirect()->back()->with('no','có lỗi trông quá trình xóa vui lòng thử lại');
        
    }
}
