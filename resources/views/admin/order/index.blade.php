@extends('master.admin')

@section('title','Danh sách đơn hàng')
@section('main')

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ngày đặt hàng</th>
            <th>status</th>
            <th>Tổng tiền</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

        @foreach ($orders as $item )


        <tr>
            <td>{{$loop->index+1}}</td>
            <td>
                {{$item->created_at->format('d/m/Y')}}
            </td>
            <td>
                @if($item->status=='default_status_value')
                <span>Bạn chưa xác nhận gmail</span>
                @elseif($item->status==1)
                <span> xác nhận đơn hàng</span>
                @elseif($item->status==2)
                <span>Bạn đã thanh toán đơn hàng</span>
                @else
                <span>Bạn đã hủy đơn hàng</span>
                @endif
            </td>
            <td>{{$item->totalPrice}}</td>
            <td>
                <a href="{{route('order.show',$item->id)}}">Xem chi tiết</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@stop()