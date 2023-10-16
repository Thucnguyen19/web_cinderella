
@extends('front-end.layouts.master')
@section('title')
<title>Thanh Toán Bằng Tiền Mặt</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Thanh Toán Bằng Tiền Mặt" name="keywords">
<meta content="Thanh Toán Bằng Tiền Mặt là hình thức thanh toán sau khi nhận được hàng." name="description">
<meta content="" name="canonical">
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('front-end/products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/menu/menu.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/products/login-checkout/login_checkout.css') }}">
    @endsection

@section('content')

<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
      @include('front-end.component.sidebar')
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">H</span>Cindrela</h1>
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh Toán Thành Công</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang Chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Thanh Toán</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->

<h2 class=" text-center">
Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ lại với bạn .    
</h2>

<!-- Checkout End -->
 <!-- Back to Top -->
 <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


 <!-- JavaScript Libraries -->
 @yield('js')
 @endsection
 