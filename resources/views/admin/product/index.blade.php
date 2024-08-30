@extends('master.admin')
@section('title','Danh Sách Sản Phẩm')
@section('main')
<main>

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary"><i style="font-size: 20px;" class="fa fa-search"></i></button>
    <a href="{{route('product.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add New</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->cat->name}}</td>
            <td>{{$model->price}}<span class="label label-success">{{$model->sale_price}}</span></td>
            <td>{{$model->status==0 ? 'ẩn':'hiện'}}</td>
            <td>
                <img src="uploads/product/{{$model->image}}" width="100px" alt="">
            </td>
            <td class="text-right">
                <form action="{{route('product.destroy',$model->id)}}" method="post" onsubmit="return confirm('bạn có chắc chắn muốn xóa sản phẩm này?')">
                    @csrf @method('DELETE')

                
                <a href="{{route('product.edit',$model->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i>Edit</a>
                <button href="" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Delete</>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</main>
<div class="pagination">
            {{ $data->links() }}
        </div>
@stop
