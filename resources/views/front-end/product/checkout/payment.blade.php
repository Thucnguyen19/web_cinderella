
@extends('front-end.layouts.master')
@section('title')
<title>Thanh Toán </title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="thanh toán" name="keywords">
<meta content="Xem thông tin sản phẩm và số tiền thanh toán" name="description">
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">THANH TOÁN</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">TRANG CHỦ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">THANH TOÁN</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="{{ route('order-place') }}" method="get">
        @csrf
    <div class="row px-xl-5">

        @php
        use Darryldecode\Cart\Facades\CartFacade;
            $content =CartFacade::getContent();
        //  dd($content);
        @endphp
        <div class="col-lg-12">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0 text-center">Tổng Số Đơn Đặt Hàng</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Sản Phẩm</h5>
                    @foreach ($content as $value) 
                    <div class="d-flex justify-content-between">
                        <p>{{ $value->name }}</p>
                        <img src="{{ $value->attributes->image }}" alt="" style="width: 50px;">
                        <p>Màu: {{ strtoupper($value->attributes->color) }}</p>
                        <p>Size: {{ strtoupper($value->attributes->size )}}</p>
                        <p>Số Lượng: {{ $value->quantity }}</p>
                        <p>Giá: {{ number_format($value->price).' '.'vnd' }}</p>
                        <p class="align-middle">Tổng: {{ number_format($value->price * $value->quantity ).' '.'vnd' }}</p>
                    </div>        
                    @endforeach           
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng Thanh Toán<br>(Chưa bao gồm phí ship)</h5>
                        <h5 class="font-weight-bold">{{ number_format(CartFacade::getSubTotal()).' '.'vnd' }}</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    
                    <h4 class="font-weight-semi-bold m-0 text-center">Phương Thức Thanh Toán</h4>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="1" class="custom-control-input" name="payment_option" id="paypal">
                                <label class="custom-control-label" for="paypal">MoMo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="2" class="custom-control-input" name="payment_option" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh Toán Khi Nhận Hàng</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="3" class="custom-control-input" name="payment_option" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Chuyển Khoản Ngân Hàng</label>
                            </div>
                        </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"> Đặt Hàng</button>
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
 