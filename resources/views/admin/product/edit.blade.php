@extends('master.admin')
@section('title','Sửa thông tin sản phẩm')
@section('main')
<main>


    <div class="row">
        <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method("PUT")
            <div class="col-md-9">


                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" id=""
                        placeholder="nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="content" class="form-control"
                        placeholder="content"> {{$product->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Nhiều ảnh sản phẩm</label>
                    <input type="file" name="images[]" class="form-control" placeholder="nhập tên sản phẩm" multiple>
                    <br>
                    <div class="row">
                        @foreach ($product->images as $imgs )
                        <div class="col-md-3" style="position:relative">
                            <a href="#" class="thumbnail">
                                <img src="uploads/product/{{$imgs->image}}" width="200px" alt="">
                                </a>
                                <a onclick="return confirm('bạn chắn chẵn muốn xóa ảnh sản phẩm')" href="{{route('product.destroyImage',$imgs->id)}}" style="position: absolute;top:5px;right:20px" href="" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>                         
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>

                    <select name="category_id" class="form-control">
                        <option value="">Mời bạn chọn</option>
                        @foreach ($cats as $cat)
                        <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>
                            {{$cat->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}" id=""
                        placeholder="nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm giảm giá</label>
                    <input type="text" name="sale_price" class="form-control" value="{{$product->sale_price}}" id=""
                        placeholder="nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="">Trạng Thái</label>

                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1" {{$product->status ==1 ? 'checked' : ''}}>
                            Hiện
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="0" {{$product->status ==0 ? 'checked' : ''}}
                                checked="checked">
                            Ẩn
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" id="" placeholder="nhập ảnh sản phẩm">
                        <img src="uploads/product/{{$product->image}}" width="100px" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary"><i style="margin: 0 2px;" class="fa fa-save"></i>Lưu
                        Lại</button>
                </div>
            </div>
    </div>
    </form>
    </div>


</main>
@stop