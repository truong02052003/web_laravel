@extends('master.main')
@section('title','Trang chủ')
@section('main')
<main>

<!-- area-bg -->
<div class="area-bg" data-background="uploads/bg/area_bg.jpg">

    <!-- banner-area -->
    <section class="banner-area banner-bg tg-motion-effects" data-background="{{$topBanner->image}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1 class="title wow fadeInUp" data-wow-delay=".2s">{{$topBanner->name}}</h1>
                        <span class="sub-title wow fadeInUp" data-wow-delay=".4s"></span>
                        <a href="{{$topBanner->link}}" style="margin-top:150px;" class="btn wow fadeInUp" data-wow-delay=".6s">order now</a>
                    </div>
                    <div class="banner-img text-center wow fadeInUp" data-wow-delay=".8s">
                        <!-- <img src="uploads/banner/banner_img.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape-wrap">
            <img src="uploads/banner/banner_shape01.png" alt="" class="tg-motion-effects5">
            <img src="uploads/banner/banner_shape02.png" alt="" class="tg-motion-effects4">
            <img src="uploads/banner/banner_shape03.png" alt="" class="tg-motion-effects3">
            <img src="uploads/banner/banner_shape04.png" alt="" class="tg-motion-effects5">
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- features-area -->
    <section class="features-area pt-130 pb-70">
        <div class="container">
            <div class="row">
                @foreach ($news_products as $np)
                <div class="col-lg-6">
                    <div class="features-item tg-motion-effects">
                        <div class="features-content">
                            <span>{{$np->cat->name}}</span>
                            <h4 class="title"><a href="{{route('home.product',$np->id)}}">{{$np->name}}</a></h4>
                            @if(auth('cus')->check())
                            <p style="font-size: 20px;" class="a">{{$np->content}} <br> 
                                @if($np->favorited)
                                <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ thích không')" href="{{route('home.favorite',$np->id)}}"><i class="fas fa-heart"></i></a>
                                @else
                                <a title="Yêu thích" href="{{route('home.favorite',$np->id)}}"><i class="far fa-heart"></i></a>
                               @endif 
                               <a title="Thêm vào giỏ hàng" href="{{route('cart.add',$np->id)}}"><i class="fa fa-shopping-cart"></i></a>
                               @else
                               <a title="Thêm vào giỏ hàng" href="{{route('account.login')}}"onclick="alert('Vui lòng đăng nhập để thêm giỏ hàng')"><i class="fa fa-shopping-cart"></i></a>

                            </p>
                            @endif
                            <br>    
                            @if($np->sale_price > 0)
                            <span> <s> ${{$np->price}}</s></span>
                            <span class="price">${{$np->sale_price}}</span>
                            @else
                            <span class="price">${{$np->price}}</span>
                            @endif
                        </div>
                        <div class="features-img">
                            <img src="uploads/product/{{$np->image}}" alt="">
                            <div class="features-shape">
                                <!-- <img src="uploads/images/features_shape.png" alt="" class="tg-motion-effects4"> -->
                            </div>
                        </div>
                        <div class="features-overlay-shape" data-background="uploads/images/features_overlay.png"></div>
                    </div>
                </div>                               
                @endforeach
            </div>
        </div>
    </section>
    <!-- features-area-end -->

</div>
<!-- area-bg-end -->

<!-- product-area -->
<section class="product-area product-bg" data-background="uploads/bg/product_bg01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">Organic Shop</span>
                    <h2 class="title">Sale Products</h2>
                    <div class="title-shape" data-background="uploads/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach ($sale_products as $sp)
            <div class="col-lg-4 col-md-6">
                <div class="product-item">
                    <div class="product-img">
                        <a href="{{route('home.product',$sp->id)}}"><img src="uploads/product/{{$sp->image}}" alt=""></a>
                    </div>
                    <div class="product-content">
                        <div class="line" data-background="uploads/images/line.png"></div>
                        <h4 class="title"><a href="{{route('home.product',$sp->id)}}">{{$sp->name}}</a></h4>
                        @if(auth('cus')->check())
                            <p style="font-size: 20px;" class="a">{{$np->content}} <br> 
                                @if($sp->favorited)
                                <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ thích không')" href="{{route('home.favorite',$sp->id)}}"><i class="fas fa-heart"></i></a>
                                @else
                                <a title="Yêu thích" href="{{route('home.favorite',$sp->id)}}"><i class="far fa-heart"></i></a>
                               @endif 
                               <a title="Thêm vào giỏ hàng" href="{{route('cart.add',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                               @else
                               <a title="Thêm vào giỏ hàng" href="{{route('account.login')}}"onclick="alert('Vui lòng đăng nhập để thêm giỏ hàng')"><i class="fa fa-shopping-cart"></i></a>

                            </p>
                            @endif
                            <br>    
                            @if($sp->sale_price > 0)
                            <span> <s> ${{$sp->price}}</s></span>
                            <span class="price">${{$sp->sale_price}}</span>
                            @else
                            <span class="price">${{$sp->price}}</span>
                            @endif
                    </div>
                    <div class="product-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 401 314" preserveAspectRatio="none">
                            <path d="M331.5,1829h361a20,20,0,0,1,20,20l-29,274a20,20,0,0,1-20,20h-292a20,20,0,0,1-20-20l-40-274A20,20,0,0,1,331.5,1829Z" transform="translate(-311.5 -1829)" />
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="shop-shape">
        <img src="uploads/product/product_shape01.png" alt="">
    </div>
</section>
<!-- product-area-end -->

<!-- gallery-area -->
<div class="gallery-area gallery-bg" data-background="uploads/bg/product_bg01.jpg">
    <div class="container">
        <div class="gallery-item-wrap">
            <div class="row justify-content-center">
                <div class="col-88">
                    <div class="gallery-active">
                        @foreach ($gallerys as $ga )
                        <div class="gallery-item">
                            <a href="uploads/gallery/{{$ga->image}}" class="popup-image"><img src="uploads/gallery/gallery_img01.png" alt=""></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallery-area-end -->

<!-- product-area -->
<section class="product-area-two product-bg-two" data-background="uploads/bg/product_bg02.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-70">
                    <span class="sub-title">Organic Shop</span>
                    <h2 class="title">Hot Products</h2>
                    <div class="title-shape" data-background="uploads/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach ($hot_products as $hp )
            <div class="col-lg-6 col-md-10">
                <div class="product-item-two">
                    <div class="product-img-two">
                    @if(auth('cus')->check())
                            <p style="font-size: 20px;" class="a"> <br> 
                                @if($hp->favorited)
                                <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ thích không')" href="{{route('home.favorite',$hp->id)}}"><i class="fas fa-heart"></i></a>
                                @else
                                <a title="Yêu thích" href="{{route('home.favorite',$hp->id)}}"><i class="far fa-heart"></i></a>
                               @endif 
                               <a title="Thêm vào giỏ hàng" href="{{route('cart.add',$hp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                               @else
                               <a title="Thêm vào giỏ hàng" href="{{route('account.login')}}"onclick="alert('Vui lòng đăng nhập để thêm giỏ hàng')"><i class="fa fa-shopping-cart"></i></a>

                            </p>
                            @endif
                        <a href="{{route('home.product',$hp->id)}}"><img src="uploads/product/{{$hp->image}}" alt=""></a>
                    </div>
                    <div class="product-content-two">
                        <div class="product-info">
                            <h4 class="title"><a href="{{route('home.product',$hp->id)}}">{{$hp->name}}</a></h4>
                            <p>{{$hp->content}}</p>
                        </div>
                        <div class="product-price">
                            @if($hp->sale_price > 0)
                            <span> <s> ${{$hp->price}}</s></span>
                            <span class="price">${{$hp->sale_price}}</span>
                            @else
                            <span class="price">${{$hp->price}}</span>
                            @endif
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="shop-now-btn text-center mt-40">
            <a href="shop.html" class="btn">Shop Now</a>
        </div>
    </div>
</section>

<!-- cta-area -->
<section class="cta-area position-relative">
    <div class="cta-bg" data-background="uploads/bg/cta_bg.jpg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <img src="uploads/icons/cta_icon.png" alt="">
                    <h2 class="title">Get a Free Quote</h2>
                    <div class="cta-bottom">
                        <a href="shop.html" class="btn">buy now</a>
                        <a href="tel:0123456789" class="btn call-btn"><i class="fas fa-headphones-alt"></i>make a call</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta-area-end -->

<!-- blog-post-area -->
<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-70">
                    <span class="sub-title">Blogs Product New</span>
                    <h2 class="title">Product News Update</h2>
                    <div class="title-shape" data-background="uploads/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach ($blogs_product as $bp )
            <div class="col-lg-4 col-md-6">
                <div class="blog-post-item">
                    <div class="blog-post-thumb">
                    <p style="font-size: 20px;" class="a"> <br> 
                                @if($bp->favorited)
                                <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ thích không')" href="{{route('home.favorite',$bp->id)}}"><i class="fas fa-heart"></i></a>
                                @else
                                <a title="Yêu thích" href="{{route('home.favorite',$bp->id)}}"><i class="far fa-heart"></i></a>
                               @endif 
                            </p>
                        <a href="{{route('home.product',$bp->id)}}"><img src="uploads/product/{{$bp->image}}" alt=""></a>
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-meta">
                            <ul class="list-wrap">
                                <li><a href="blog.html"><i class="fas fa-user"></i>Hamolin Pilot</a></li>
                                <li><i class="fas fa-comments"></i>03</li>
                            </ul>
                        </div>
                        <h4 class="title"><a href="{{route('home.product',$bp->id)}}">{{$bp->name}}</a></h4>
                        <p>{{$bp->content}}</p>
                        <div class="blog-post-bottom">
                            <a href="blog-details.html" class="link-btn">Read More</a>
                            <a href="blog-details.html" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach 
        </div>
    </div>
</section>
<!-- blog-post-area-end -->

</main>
@stop