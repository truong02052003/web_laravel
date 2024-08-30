@extends('master.admin')
@section('title','Thêm Sản Phẩm Mới')
@section('main')
<main>


        <div class="row">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-9">


                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="nhập tên sản phẩm">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="content" class="form-control" placeholder="content" id=""></textarea>
                        @error('content')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                            <label for="">Nhiều ảnh sản phẩm</label>
                            <input type="file" name="images[]" class="form-control"  placeholder="nhập tên sản phẩm" multiple>
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Danh mục sản phẩm</label>

                        <select name="category_id" class="form-control">
                        <option value="">Mời bạn chọn</option>
                        @foreach ($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" name="price" class="form-control" id="" placeholder="nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm giảm giá</label>
                        <input type="text" name="sale_price" class="form-control" id="" placeholder="nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng Thái</label>

                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="1" checked="checked">
                                Hiện
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="0" checked="checked">
                                Ẩn
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control" id="" placeholder="nhập tên sản phẩm">
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
