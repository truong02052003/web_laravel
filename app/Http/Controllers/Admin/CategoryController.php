<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::orderBy('id','DESC')->paginate(20);     
        return view('admin.category.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {   
        
        $request->validate([
            'name'=>'required|unique:categories'
        ]);
            
            $data=$request->only('name','status');
            
            Category::create($data);
            return redirect()->route('category.index')->with('ok','Thêm mới sản phẩm thành công');
                        
    }
    public function edit(Request $request,Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|unique:categories,name,' . $category->id
    ]);

    $data = $request->only('name', 'status');

    $category->update($data);

    return redirect()->route('category.index')->with('ok', 'Cập nhật sản phẩm thành công');
}

    public function destroy(Category $category)
    {
        
        if ($category) {
            // Kiểm tra xem danh mục có sản phẩm không
            if ($category->products()->count() > 0) {
                return redirect()->back()->with('no', 'Danh mục này không thể xóa vì có sản phẩm liên quan.');
            }

            // Xóa danh mục
            $category->delete();

            return redirect()->route('category.index')->with('ok', 'Danh mục đã được xóa thành công.');
        }

        return redirect()->route('category.index')->with('no', 'Danh mục không tồn tại.');
    }
}
