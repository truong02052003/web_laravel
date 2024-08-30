@extends('master.admin')
@section('title','Sửa Thông Tin Sản Phẩm')
@section('main')
<main>


<div class="row">
    <div class="col-md-4">
         
         <form action="{{route('category.update',$category->id)}}" method="POST" role="form">         
         @csrf   @method('PUT')
         <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                
                <div class="radio">
                    <label>
                        <input type="radio" name="status"  value="1" {{$category->status==1 ? 'checkd': ''}} >
                        Hiện
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status"  value="0"  {{$category->status==1 ? 'checkd': ''}}>
                        Ẩn
                    </label>
                </div>
            </div>
            
         
            <button type="submit" class="btn btn-primary"><i style="margin: 0 2px;" class="fa fa-save"></i>Lưu Lại</button>
         </form>
         
    </div>
</div>


</main>
@stop