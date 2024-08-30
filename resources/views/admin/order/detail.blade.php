@extends('master.admin')
@section('title','Chi tiết đơn hàng')
@section('main')
@if($order->status !=2)
@if($order->status !=3)
<a href="{{route('order.update',$order->id)}}?status=2" class="btn btn-primary">Đã giao hàng</a>
<a href="{{route('order.update',$order->id)}}?status=3" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn hủy')">Hủy</a>
@else
<a href="{{route('order.update',$order->id)}}?status=1" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn khôi phục lại đơn hàng này')">Khôi phục đơn hàng</a>
@endif
@endif
<h3>Thông tin khách hàng</h3>

<table class="table">
    <thead>
        <tr>
            <th>Họ tên</th>
            <td>{{$auth->name}}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{$auth->phone}}</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>{{$auth->address}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$auth->email}}</td>
        </tr>
    </thead>

</table>
<h3>Thông tin sản phẩm</h3>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

        @foreach ($order->details as $item )


        <tr>
            <td>{{$loop->index+1}}</td>
            <td>
                {{$item->product->name}}
            </td>
            <td>
                <img src="uploads/product/{{$item->product->image}}" width="40px" alt="">
            </td>
            <td>
                {{$item->quantity}}
            </td>
            <td>
                {{$item->price}}
            </td>


            <td>{{$item->price*$item->quantity}}</td>


        </tr>
        @endforeach
    </tbody>
</table>
@stop()