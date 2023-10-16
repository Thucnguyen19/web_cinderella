
@extends('front-end.layouts.master')
@section('title')
<title>TRANG TÌM KIẾM </title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<meta content="" name="canonical">
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('menu/menu.css') }}">
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
        <div class="d-inline-flex">
            <div class="text-center ">
                @if (count($products)> 0 && count($posts) > 0)
                <h4 class="section-title px-5"><span class="px-2">Tìm thấy {{ count($products) }} sản phẩm liên quan và  {{ count($posts) }} bài viết liên quan</span></h4>
                @elseif (count($products)>0 && count($posts)===0)
                <h4 class="section-title px-5"><span class="px-2">Tìm thấy {{ count($products) }} sản phẩm liên quan</span></h4>
                @elseif (count($products)===0 && count($posts)> 0)
                <h4 class="section-title px-5"><span class="px-2">Tìm thấy {{ count($posts) }} bài viết liên quan</span></h4>
                @else
                <h4 class="section-title px-5"><span class="px-2">Không tìm thấy sản phẩm hoặc bài viết nào liên quan đến mục tìm kiếm</span></h4>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->



<div class="container-fluid pt-5">
    
    <div class="row px-xl-5 pb-3">
        @foreach ($products as $product )
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ $product->feature_image_path }}" style="height:350px; object-fit:cover" alt="">
                    @if ($product->discount != 0)
                    <div class="discount">
                        <div class="discount-item">
                            <span aria-label="promotion"></span>
                            <span class="percent">{{ 100 - round(($product->price/$product->discount)*100)}} %</span>
                            <span class="text_dc">GIẢM</span>
                        </div>
                    </div>
                    @elseif (
                        ''
                    )
                        
                    @endif
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ number_format($product->price) }} đ</h6><h6 class="text-muted ml-2"><del>{{ $product->discount===0 ? '' : number_format($product->discount).'vnd' }}</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>XEM CHI TIẾT</a>
                    <a href="{{ route('product_detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>THÊM VÀO GIỎ</a>
                </div>
            </div>
        </div>
        @endforeach
		{{ $products->links('pagination::bootstrap-4') }}
    </div>
    <div class="container">
        <div class="row">
			@foreach ($posts as $blogItem )
				
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    {{-- <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div> --}}
                    <div class="blog__item__text">
                        <img src="{{ $blogItem->post_image_path }}" style="width:300px  ;object-fit:cover" alt="">
                        <span> {{ $blogItem->created_at }}</span>
                        <h5>{{ $blogItem->post_title }}</h5>
						<a href="{{ route('blog_detail', ['slug' => $blogItem->post_slug, 'id' => $blogItem->id]) }}">Đọc bài viết</a>

                    </div>
                </div>
            </div>
			@endforeach

        </div>
        <div class="col-md-12 d-flex justify-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>

<!-- Blog Section Begin -->
<section class="blog spad">

</section>
<!-- Blog Section End -->



<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection
