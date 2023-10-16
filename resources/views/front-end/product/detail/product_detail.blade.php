
@extends('front-end.layouts.master')
@section('title')
<title>{{$meta_title }}</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="{{ $meta_keywords }}" name="keywords">
<meta content="{{ $meta_des }}" name="description">
<meta content="{{ $url_canonical }}" name="canonical">
<meta property="og:image" content="{{  'http://localhost:8000/'.$product->feature_image_path  }}" />

<meta property="og:site_name" content="http://localhost/chi-tiet-san-pham" />
	<meta property="og:type" content="Website" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="fb:app_id" content="232505114857147" />
    <meta property="fb:pages" content="1128104117285467" />
	<meta property="og:title" itemprop="name" content="" />
	<meta property="og:url" itemprop="url" content="" />
	<meta property="og:description" content="{{ $url_canonical }}" />
    <meta content="" property="og:image" itemprop="thumbnailUrl" />
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">CHI TIẾT SẢN PHẨM</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">TRANG CHỦ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">CHI TIẾT SẢN PHẨM</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="" style="object-fit:contain;width:543px;height:543px" src="{{ $product->feature_image_path }}" alt="Image">
                        </div>
                        {{-- {{ dd($product->productImage) }} --}}
    
                        @foreach ($product->productImage as $value )
                        <div class="carousel-item ">
                            <img class="" style="object-fit: contain;width:543px;height:543px" src="{{ $value->image_path }}" alt="Image">
                        </div>
                        @endforeach
                       
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ strtoupper($product->name) }}</h3>
             {{-- {{ dd($rating->avg()); }} --}}
             <div class="d-flex mb-3">
                @if (count($rating)===0)
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                </div>
               @elseif (count($rating)!==0 && $averageRating <=2)
               <div class="text-primary mr-2">
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
               </div>
               @elseif (count($rating)!==0 && $averageRating <=3)
               <div class="text-primary mr-2">
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                
            </div>
               @elseif (count($rating)!==0 && $averageRating <=4)
               <div class="text-primary mr-2">
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
            </div>
               @elseif (count($rating)!==0 && $averageRating <5)
               <div class="text-primary mr-2">
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star"></small>
                <small class="fas fa-star-half-alt"></small>
                @elseif (count($rating)!==0 && $averageRating =5)
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                </div>
            </div>
               @endif
               

                    @if (count($rating)===0)
                    <small class="pt-1"> CHƯA CÓ ĐÁNH GIÁ</small>
                    @else
                    <small class="pt-1"> {{ count($rating) }} ĐÁNH GIÁ</small>
                    @endif
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->price).' '.'vnd' }}</h3>
                    <h3 class="font-weight-semi-bold mb-4" style="margin-left:20px"><del>{{ $product->discount === 0 ? '' : number_format($product->discount).' '.'vnd' }}</del></h3>


                </div>
                <p class="mb-4 ">{!! ucfirst($product->content) !!}</p>
                <form action="{{ route('save-cart') }}" class=" d-flex flex-column" method="post">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">SIZES:</p>
                        @csrf
                        @php
                            $count =1;
                        @endphp
                        @foreach ($product->sizes as $sizeItem )
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" onclick="" id="size-{{ $count }}" value="{{ $sizeItem ->name }}" name="size">
                            <label class="custom-control-label" for="size-{{ $count }}">{{ strtoupper($sizeItem->name) }}</label>
                        </div>  
                        @php
                            $count++;
                        @endphp                        
                        @endforeach
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">COLORS:</p>
                  
                        @php
                            $count=1;
                        @endphp
                        @foreach ($product->colors as $colorItem )
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-{{ $count }}" value="{{ $colorItem ->name }}" name="color">
                            <label class="custom-control-label" for="color-{{ $count }}">{{ ucfirst($colorItem->name) }}</label>
                        </div>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                 
                </div>
                <div class="d-flex align-items-center mb-4 pt-2 align-content-center">
                        @csrf
                        <div class="input-group quantity mr-3" style="width: 180px;">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Số lượng</p>

                            {{-- <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus"  >
                                <i class="fa fa-minus"></i>
                                </button>
                            </div> --}}
                            <input type="number" name="qty" class="form-control bg-secondary text-center" value="1">
                            <input type="hidden" name="productid_hidden" class="form-control bg-secondary text-center" value="{{ $product->id }}">
                            {{-- <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div> --}}
                        </div>
                        <button class="btn btn-primary px-3" name="submit"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào Giỏ</button>
                </div>
                </form>

                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Chia Sẻ:</p>
                    <div class="d-inline-flex">
                        <div class="fb-like" data-href="http://localhost:8000/chi-tiet-san-pham/73" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Chi Tiết Sản Phẩm</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Mô Tả Sản Phẩm </a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh Giá ({{ count($rating) }})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Chi Tiết Sản Phẩm</h4>
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Mô Tả Sản Phẩm</h4>
                        
                        <div class="row">
                            {!! $product->product_info !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{ count($rating) }} Nhận Xét Cho "{{ $product->name }}"</h4>
                                @foreach ($rating as $value )
                                <div class="media mb-4">
                                    <img src="https://haycafe.vn/wp-content/uploads/2022/02/Avatar-trang-cho-nu.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{ $value->name }}<small> - <i>{{$value->created_at}}</i></small></h6>
                                        @switch($value->rating)
                                            @case(1)
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            @break
                                            @case(2)
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            @break
                                            @case(3)
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            @break
                                            @case(4)
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            @break
                                            @case(5)
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                                @break
                                        
                                            @default
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>                                                
                                        @endswitch
                                        
                                        <p>{{ $value->review }}</p>
                                    </div>
                                </div>                                    
                                @endforeach
                            </div>
                           @include('front-end.product.detail.review_product')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm tương tự</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    {{-- {{ dd($related_product) ;}} --}}
                    @foreach ($related_product as $key => $value )
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="width:315px;height:315px ; object-fit:cover" src="{{ $value->feature_image_path }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $value->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($value->price)}} vnd</h6><h6 class="text-muted ml-2"><del>{{ $value->discount === 0 ? '': number_format($value->discount).' '.'vnd' }}</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product_detail',['id'=>$value->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>       
                    @endforeach
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Products End -->
    <div class="row px-xl-5">
        <div class="container">
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="20"></div>
        </div>
    </div>




    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


   






<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection
