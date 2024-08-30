@extends('master.admin')
@section('title','Thêm Sản Phẩm Mới')
@section('main')
<main>


<div class="row">
    <div class="col-md-4">

         <form action="{{route('category.store')}}" method="POST" role="form">

         <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name" id="" placeholder="nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>

                <div class="radio">
                    <label>
                        <input type="radio" name="status"  value="1" checked="checked">
                        Hiện
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status"  value="0" >
                        Ẩn
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary"><i style="margin: 0 2px;" class="fa fa-save"></i>Lưu Lại</button>
         @csrf
        </form>



    </div>
</div>


</main>
@stop
