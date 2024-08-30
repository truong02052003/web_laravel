<h2>Hi:{{$order->customer->name}}</h2>
<h4>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>
    <?php $total=0; ?>
    @foreach ($order->details as $detail )
    
    
    <tr>
        <th>{{$loop->index+1}}</th>
        <th>{{$detail->product->name}}</th>
        <th>{{$detail->price}}</th>
        <th>{{$detail->quantity}}</th>
        <th>{{$detail->price*$detail->quantity}}</th>
    </tr>
    <?php $total+=$detail->price*$detail->quantity; ?>
    @endforeach
    <th colspan="4">Tổng tiền</th>
    <th>{{$total}}</th>
</table>
</h4>
<p>
    <a href="{{route('order.verify',$token)}}">Click here to verify order</a>
</p>