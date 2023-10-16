

@extends('front-end.layouts.master')
@section('title')
<title>{{ $meta_title }}</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="{{$meta_des}}" name="keywords">
<meta content="{{ $meta_des }}" name="description">
<meta content="{{ $url_canonical }}" name="canonical">
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

<!-- Blog Details Hero Begin -->
<section class="blog-hero spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 text-center">
                <div class="blog__hero__text">
                    <h2>{{ $post->post_title }}</h2>
                    <ul>
                        <li>By Thu.Tr</li>
                        <li>{{ $post->created_at }}</li>
                        <li>8 Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="img/blog/details/blog-details.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__share">
                        <span>share</span>
                        <ul>
                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                            {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> --}}
                            {{-- <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li> --}}
                        </ul>
                    </div>
                    <div class="blog__details__text">
                        {!! $post->post_content !!}
                    </div>
                    <div class="blog__details__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                {{-- <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="img/blog/details/blog-author.jpg" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h5>Aiden Blair</h5>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__details__tags">
                                    <a href="#">#Fashion</a>
                                    <a href="#">#Trending</a>
                                    <a href="#">#2020</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog__details__btns">
                        <div class="row">
                            @foreach ( $related_post as $blogItem )
                            <div class="col-lg-6 col-md-6 col-sm-6">
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
                    </div>
                    <div class="blog__details__comment">
                        <h4>Để Lại 1 Bình Luận</h4>
                        {{-- <form action="#">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="Phone">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <textarea placeholder="Comment"></textarea>
                                    <button type="submit" class="site-btn">Post Comment</button>
                                </div>
                            </div>
                        </form> --}}
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Blog Details Section End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection


