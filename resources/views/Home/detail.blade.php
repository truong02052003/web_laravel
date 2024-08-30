@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Chi tiết đơn hàng</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
                        <br>
                        
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
@stop()