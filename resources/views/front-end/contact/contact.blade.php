

@extends('front-end.layouts.master')
@section('title')
<title>Trang Liên Hệ</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content=" Thông Tin Giỏ hàng" name="keywords">
<meta content="giỏ hàng có sản phẩm " name="description">
<meta content="" name="canonical">
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('front-end/products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/menu/menu.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/blog/blog.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('front-end/products/cart/show_cart.css') }}"> --}}
    @endsection

@section('content')
   


<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
      @include('front-end.component.sidebar')
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">H</span>CINDERELLA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- menu start --}}
                @include('front-end.component.menu')
                {{-- menu end  --}}
            </nav>
            {{-- @include('front-end.component.slider') --}}
        </div>
    </div>
</div>
<!-- Navbar End -->
   <!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">LIÊN HỆ VỚI CHÚNG TÔI</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ route('home') }}">TRANG CHỦ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">LIÊN HỆ</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Mọi Thắc Mắc Xin Liên Hệ</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{ route('send_contact') }}" method="POST">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Họ Tên" name="name_contact"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email_contact" 
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Số Điện Thoại" name="phone_contact"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <select class="form-control" name="subject_contact" id="">
                            <option value="" disabled selected>Vấn Đề</option>
                            <option value="Đơn Hàng" nam>Đơn Hàng</option>
                            <option value="Vận Chuyển">Vận Chuyển</option>
                            <option value="Người Bán">Người Bán</option>
                            <option value="Nhân Viên Tư Vấn">Nhân Viên Tư Vấn</option>
                            <option value="Vấn Đề Khác">Vấn Đề Khác</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="6" id="message" placeholder="Nội Dung" name="content_contact"
                            required="required"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Thông Tin Liên Hệ</h5>
            <p>Mọi Chi Tiết Xin Vui Lòng Liên Hệ Theo Địa Chỉ </p>
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Cinderella Shop</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{  App\Helpers\Helper::getConfigValueFromSettingTable('address') }}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{  App\Helpers\Helper::getConfigValueFromSettingTable('email') }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>{{  App\Helpers\Helper::getConfigValueFromSettingTable('phone_number') }}</p>
            </div>
         
        </div>
    </div>
</div>
<!-- Contact End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection


