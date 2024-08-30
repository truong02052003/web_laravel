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
    <a href="{{route('category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add New</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Category Name</th>
            <th>Category Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $cat)
        
        
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->status==0 ? 'ẩn':'hiện'}}</td>
            <td class="text-right">
                <form action="{{route('category.destroy',$cat->id)}}" method="post">
                    @csrf @method('DELETE')
                
                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i>Edit</a>
                <button href="" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</main>

@stop