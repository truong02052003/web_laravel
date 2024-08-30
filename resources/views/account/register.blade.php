@extends('master.main')

@section('main')
<main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Register</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Register</li>
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
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="contact-content">
                                    <div class="section-title mb-15">
                                        <span class="sub-title">Register account</span>
                                        <h2 class="title">Chào <span>Bạn</span></h2>
                                    </div>
                                    <p>Bạn hãy đăng ký tài khoản trước sử dụng website của chúng tôi</p>
                                    <form action="" method="post">
                                       
                                        <div class="contact-form-wrap">
                                            <div class="form-grp">
                                                <input name="name" type="text" placeholder="Your Name *" required>
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="email" type="email" placeholder="Your Email *" required>
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="phone" type="text" placeholder="Your Phone *" required>
                                                @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="address" type="text" placeholder="Your Address *" required>
                                                @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            
                                            <div class="form-grp">
                                                <input name="password" type="text" placeholder="Your Password *" required>
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <div class="form-grp">
                                                <input name="confirm_password" type="text" placeholder="Your Confirm Password *" required>
                                                @error('confirm_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            </div>
                                            <button type="submit">Gửi</button>
                                        </div>
                                        @csrf   
                                    </form>
                                    <p class="ajax-response mb-0"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14881.31441601116!2d105.62952345!3d21.1791013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1721824468673!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
@stop()