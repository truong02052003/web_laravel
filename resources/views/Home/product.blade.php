@extends('master.main')
@section('title',$product->name)
@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">{{$product->name}}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <section class="shop-details-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shop-details-images-wrap">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                                        <a href="uploads/product/{{$product->image}}" class="popup-image">
                                            <img id="big-img" src="uploads/product/{{$product->image}}" style="width:1000px" alt="">
                                        </a>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" >
                                <li class="nav-item" role="presentation">
                                        <button class="nav-link" >
                                            <img class="thumb-image" src="uploads/product/{{$product->image}}" alt="" width="150px">
                                        </button>
                                    </li>
                                    @foreach ($product->images as $img)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link">
                                            <img class="thumb-image" src="uploads/product/{{$img->image}}" alt="" width="150px">
                                        </button>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shop-details-content">
                                <h2 class="title">{{$product->name}}</h2>
                                <div class="review-wrap">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>(4 customer reviews)</span>
                                </div>
                                @if($product->sale_price > 0)
                            <span> <s> ${{$product->price}}</s></span>
                            <span class="price">${{$product->sale_price}}</span>
                            @else
                            <span class="price">${{$product->price}}</span>
                            @endif

                                <p>Meat provide well shaped fresh and the organic meat well animals is Humans have hunted schistoric times meat, the flesh</p>
                                <div class="shop-details-qty">
                                    <span class="title">Quantity :</span>
                                    <div class="shop-details-qty-inner">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <a href="{{route('cart.add',$product->id)}}" class="buy-btn">Buy it now</a>
                                <div class="payment-method-wrap">
                                    <span class="title">GUARANTEED SAFE CHECKOUT:</span>
                                    <img src="uploads/product/payment_method.png" alt="">
                                </div>
                                <div class="shop-add-Wishlist">
                                    <a href="#"><i class="far fa-heart"></i>Add to Wishlist</a>
                                </div>
                                <div class="sd-sku">
                                    <span class="title">SKU:</span>
                                    <a href="#">002</a>
                                </div>
                                <div class="sd-category">
                                    <span class="title">CATEGORY:</span>
                                    <ul class="list-wrap">
                                        <li><a href="#">lipstick</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews (0)</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="descriptionTabContent">
                                    <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                                        <div class="product-description-content">
                                            <p>committed are products that have been produced using sustainable fibers or processes, reducing their environmental impact. Umino’s goal is to support the implementation of practices more committed to the environment. I am like a freight train. Working on the details, twisting and playing with them over the years, but always staying on the same track I design from instinct. It’s the only way I know how to live.</p>
                                            <ul class="list-wrap">
                                                <li>Committed are products that have been produced</li>
                                                <li>It’s the only way I know how to live.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                        <div class="product-desc-review">
                                            <div class="product-desc-review-title mb-15">
                                                <h5 class="title">Customer Reviews (0)</h5>
                                            </div>
                                            <div class="left-rc">
                                                <p>No reviews yet</p>
                                            </div>
                                            <div class="right-rc">
                                                <a href="#">Write a review</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-details-area-end -->

            <!-- product-area -->
            <section class="related-product-area pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-50">
                                <span class="sub-title">Organic Shop</span>
                                <h2 class="title">Related Products</h2>
                                <div class="title-shape" data-background="uploads/images/title_shape.png"></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item-wrap-three">
                        <div class="row justify-content-center rp-active">
                           @foreach ($products as $pros)


                            <div class="col-xl-3">
                                <div class="product-item-three inner-product-item">
                                    <div class="product-thumb-three">
                                        <a href="shop-details.html"><img src="uploads/product/{{$pros->image}}" alt=""></a>
                                        <span class="batch">New<i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="product-content-three">
                                        <a href="shop.html" class="tag">{{$pros->cat->name}}</a>
                                        <h2 class="title"><a href="shop-details.html">{{$pros->name}}</a></h2>
                                        @if($product->sale_price > 0)
                                        <span> <s> ${{$product->price}}</s></span>
                                        <span class="price">${{$product->sale_price}}</span>
                                        @else
                                        <span class="price">${{$product->price}}</span>
                                        @endif
                                        <div class="product-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-shape-two">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                            <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- product-area-end -->

        </main>
        @stop
        @section('js')
        <script>
            $('.thumb-image').click(function(e)
        {
            e.preventDefault();
            let _url=$(this).attr('src');
            $('#big-img').attr("src",_url);
        });
        </script>
        @endsection
