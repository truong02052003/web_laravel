@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Thông tin đặt hàng</h2>
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
                        <div class="row">
                            <div class="col-md-4">
                                <form action="" method="post">
                                    @csrf
                                    <div class="contact-form-wrap">
                                            <div class="form-grp">
                                                <input name="name" value="{{$auth->name}}" type="text" placeholder="Your Name *" required>
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="email"value="{{$auth->email}}" type="email" placeholder="Your Email *" required>
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="phone"value="{{$auth->phone}}" type="text" placeholder="Your Phone *" required>
                                                @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="address" value="{{$auth->address}}" type="text" placeholder="Your Address *" required>
                                                @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <button type="submit">Đặt hàng</button>
                                        </div>
                                    
                                </form>
                            </div>
                            <div class="col-md-8">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $total=0; ?>
                               @foreach ($carts as $item )
                               
                               
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->prod->name}}</td>
                                    <td>{{$item->price}} </td>
                                    
                                    <td>
                                        <img src="uploads/product/{{$item->prod->image}}" width="50px" alt="">
                                    </td>
                                    <td> 
                                        {{$item->quantity}}                                        </form>
                                    </td>
                                    <th>{{$item->price*$item->quantity}}</th>
                                </tr>
                                <?php $total+=$item->price*$item->quantity; ?>
                                @endforeach
                            </tbody>
                        </table>
                        
                        </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
@stop()