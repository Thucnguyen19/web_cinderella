
@extends('front-end.layouts.master')
@section('title')
<title> Thông Tin Thanh Toán </title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content=" Thông Tin Thanh Toán" name="keywords">
<meta content="Thanh Toán tiền sản phẩm " name="description">
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">THÔNG TIN VẬN CHUYỂN</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">TRANG CHỦ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">THÔNG TIN VẬN CHUYỂN</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="{{ route('save-checkout-shipping') }}" method="post">
        @csrf
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">THÔNG TIN VẬN CHUYỂN </h4>
                    <div class="row">
                      
                        <div class="col-md-6 form-group">
                            <label>Họ & Tên</label>
                            <input name="shipping_name" class="form-control" type="text" placeholder="Nguyễn Văn A">
                        </div>
                   
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="shipping_email" class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Điện Thoại</label>
                            <input name="shipping_phone" class="form-control" type="text" placeholder="+84xxxxxxxxx">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa Chỉ</label>
                            <input name="shipping_address" class="form-control" type="text" placeholder="Địa Chỉ">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quốc Gia</label>
                            <select class="custom-select">
                                <option selected>Việt Nam</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ghi Chú</label>
                           <textarea name="" id="" class="form-control" rows="1"></textarea>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"> Xác Nhận</button>
                        </div>
                       
                    </div>
            </div>
        
        </div>

     
        </div>
    </div>
</form>

</div>
<!-- Checkout End -->
 <!-- Back to Top -->
 <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
 <!-- JavaScript Libraries -->
 @yield('js')
 @endsection
 