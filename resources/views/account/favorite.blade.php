@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Favorites</h2>
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
                                    <th>Ngày yêu thích</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               @foreach ($favorites as $item )
                               
                               
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->prod->name}}</td>
                                    <td>{{$item->prod->price}} / {{$item->prod->sale_price}}</td>
                                    <td>
                                        <img src="uploads/product/{{$item->prod->image}}" width="100px" alt="">
                                    </td>
                                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                                    <td>
                                    @if($item->prod->favorited)
                                    <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ thích không')" href="{{route('home.favorite',$item->product_id)}}"><i class="fas fa-heart"></i></a>
                                    @else
                                    <a title="Yêu thích" href="{{route('home.favorite',$item->product_id)}}"><i class="far fa-heart"></i></a>
                                    @endif 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
@stop()