@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Lịch sử đặt hàng</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Lịch sử đặt hàng</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-area -->
            <section class="contact-area">
                <div class="contact-info-wrap contact-info-bg" data-background="assets/img/bg/contact_info_bg.jpg">
                    
                </div>
                <div class="contact-wrap">
                    <div class="container">
                        
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
                                
                               @foreach ($auth->orders as $item )
                               
                               
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        {{$item->created_at->format('d/m/Y')}}
                                    </td>
                                    <td>
                                        @if($item->status=='default_status_value')
                                        <span>Bạn chưa xác nhận gmail</span>
                                        @elseif($item->status==1)
                                        <span>xác nhận giao hàng</span>
                                        @elseif($item->status==2)
                                        <span>Bạn đã thanh toán đơn hàng</span>
                                        @else
                                        <span>Bạn đã hủy đơn hàng</span>
                                        @endif
                                    </td>
                                    <td>{{$item->totalPrice}}</td>
                                    <td>
                                        <a href="{{route('order.detail',$item->id)}}">Xem chi tiết</a>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        
                        <div class="text-center">
                            <a href="" class="btn btn-primary"  >Tiếp tục mua</a>
                            @if($carts->count())
                            <a href="{{route('cart.clear')}} " onclick="return confirm('bạn có muốn xóa giỏ hàng không?')"class="btn btn-danger">Xóa giỏ hàng</a>
                            <a href="{{route('order.checkout')}}" class="btn btn-success">Đặt hàng</a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
@stop()