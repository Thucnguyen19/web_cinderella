
@extends('front-end.layouts.master')
@section('title')
<title>{{ $meta_title }}</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="{{ $meta_keywords }}" name="keywords">
<meta content="{{ $meta_des }}" name="description">
<meta content="{{ $url_canonical }}" name="canonical">
    {{-- <meta name="news_keywords" content="o" />
<meta name="robots" content="index,follow,noodp" /><meta name="robots" content="noarchive">
<meta property="og:site_name" content="" />
	<meta property="og:type" content="Website" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="fb:app_id" content="232505114857147" />
    <meta property="fb:pages" content="1128104117285467" />
	<meta property="og:title" itemprop="name" content="" />
	<meta property="og:url" itemprop="url" content="" />
	<meta property="og:description" content="" />
    <meta content="" property="og:image" itemprop="thumbnailUrl" />
<meta http-equiv="Content-Language" content="vi" />
<meta name="Language" content="vi" />
<meta name="copyright" content="" />
<meta name="abstract" content="" />
<meta name="distribution" content="Global" />
<meta name="author" content="" />
<meta name="REVISIT-AFTER" content="" />
<meta name="RATING" content="GENERAL" />
<meta http-equiv="x-dns-prefetch-control" content="on"> --}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('front-end/products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/menu/menu.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/home/home.css') }}">
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
            @include('front-end.component.slider')
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">SẢN PHẨM CHẤT LƯỢNG</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">VẬN CHUYỂN NHANH</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">HOÀN TRẢ TRONG VÒNG 14 NGÀY</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">HỖ TRỢ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
{{-- @include('front-end.component.category_product') --}}
<!-- Categories End -->


<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary-1 text-center text-md-right text-white py-5 px-5">
                {{-- <img src="{{ asset('front-end/products/img/phong-cach-thoi-trang-chau-au.jpg') }}" width="100%" alt=""> --}}
                <div class="position-relative" style="z-index: 1;">
                </div>
            </div>
            <div class="bg-secondary bg-below d-flex justify-between">
                <h5 class=" py-md-2 px-md-3">THỜI TRANG NGƯỜI LỚN</h5>
                    <a href="" class="py-md-2 px-md-3">SHOP NOW</a>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary-2 text-center text-md-left text-white py-5 px-5">
                {{-- <img src="{{ asset('front-end/products/img/banner-thoi-trang-tre-em.jpg') }}" alt=""> --}}
                <div class="position-relative" style="z-index: 1;">
                </div>
            </div>
            <div class="bg-secondary bg-below d-flex justify-between">
                <h5 class=" py-md-2 px-md-3">THỜI TRANG TRẺ EM</h5>
                    <a href="" class="py-md-2 px-md-3">SHOP NOW</a>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
@include('front-end.component.productStart')
<!-- Products End -->


<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">ĐĂNG KÝ BẢN TIN</span></h2>
                <p>ĐĂNG KÝ NHẬN BẢN TIN, ĐỂ NHẬN THÔNG TIN VỀ NHỮNG SẢN PHẨM MỚI NHẤT</p>
            </div>
            <form action="{{ route('news-letter') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control border-white p-4" name="email" placeholder="NHẬP EMAIL">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4" onclick="alert('Bạn đã đăng ký nhận tin tức từ CINDERELLA thành công !')">ĐĂNG KÝ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->


<!--Recommend Products Start (products that are viewed by many people)-->
@include('front-end.component.recommendProduct')
<!--Recommend Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @foreach ($productsRecommend as $value)
                <div class="vendor-item border p-4">
                    <img src="{{ $value ->feature_image_path }}" style="object-fit: cover" alt="">
                </div>                   
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->





<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection
