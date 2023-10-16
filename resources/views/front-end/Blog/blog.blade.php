

@extends('front-end.layouts.master')
@section('title')
<title>Trang Tin Tức</title>
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

<section class="breadcrumb-blog set-bg" data-setbg="{{ asset('front-end/blog/img/pasted image 0.png') }}" style="background-image:url('https://lh4.googleusercontent.com/_YA7IZhpoJ2kl7LX1HKYR_1qw78JvFdTd4LkitTG39oropDXJJa_yNTRd27SeyUao8VTdFXCIgIaukJHzz8_GV0SgA72W1eblsq1fvuKS9HVPj3cfT7WrueiltuSfSIUxFey2by0')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Blog</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
			@foreach ($blog as $blogItem )
				
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    {{-- <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div> --}}
                    <div class="blog__item__text">
                        <span><img src="{{ $blogItem->post_image_path }}" alt="">{{ $blogItem->created_at }}</span>
                        <h5>{{ $blogItem->post_title }}</h5>
						<a href="{{ route('blog_detail', ['slug' => $blogItem->post_slug, 'id' => $blogItem->id]) }}">Đọc bài viết</a>

                    </div>
                </div>
            </div>
			@endforeach

        </div>
		{{ $blog->links('pagination::bootstrap-4') }}
    </div>
</section>
<!-- Blog Section End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection


