@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Giỏ hàng</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
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
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               @foreach ($carts as $item )
                               
                               
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->prod->name}}</td>
                                    <td>{{$item->price}} </td>
                                    
                                    <td>
                                        <img src="uploads/product/{{$item->prod->image}}" width="50px" alt="">
                                    </td>
                                    <td>
                                        <form action="{{route('cart.update',$item->product_id)}}" method="get">
                                            <input type="number" value="{{$item->quantity}}" style="text-align: center;" name="quantity">
                                            <button><i  class="fas fa-save"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                    <a title="Xóa sản phẩm khỏi giỏ hàng" onclick="return confirm('bạn có muốn xóa sản phẩm không?')" href="{{route('cart.delete',$item->product_id)}}"><i class="fas fa-trash"></i></a>
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