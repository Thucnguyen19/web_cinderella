
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
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('menu/menu.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('products/list.css') }}"> --}}
    @endsection
    @section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        // Lấy giá trị của ô kiểm tra đã chọn từ localStorage
        var checkedValue = localStorage.getItem('checked');
    
        // Đặt trạng thái checked cho ô kiểm tra tương ứng
        if (checkedValue) {
            $('#' + checkedValue).prop('checked', true);
        }
    
        // Lưu giá trị của ô kiểm tra đã chọn vào localStorage khi trạng thái của chúng thay đổi
        $('input[type=checkbox]').change(function(){
            $('input[type=checkbox]').not(this).prop('checked', false);
            localStorage.setItem('checked', this.id);
            this.form.submit();
        });
    });
    </script>
    
    
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
        </div>
    </div>
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">OUR SHOP</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">TRANG CHỦ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">OUR SHOP</p>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">SẢN PHẨM THEO GIÁ</h5>
                <form action="{{ route('category.product', ['slug' => $category->slug, 'id' => $category->id]) }}" method="GET">
                    @csrf
                    {{-- <input type="hidden" name="categoryId" value="{{ $category->id }}"> --}}
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="all" id="price-all" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-all">TẤT CẢ GIÁ</label>
                        <span class="badge border font-weight-normal">{{$allProducts->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="0-200000" id="price-1" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-1">0 - 200,000 đ</label>
                        <span class="badge border font-weight-normal">{{ $productsPriceRange1->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="200000-4000000" id="price-2" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-2">200,000 - 400,000 đ</label>
                        <span class="badge border font-weight-normal">{{ $productsPriceRange2->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="400000-600000" id="price-3" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-3">400,000- 600,000 đ</label>
                        <span class="badge border font-weight-normal">{{ $productsPriceRange3->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="600000-800000" id="price-4" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-4">600,000 - 800,000 đ</label>
                        <span class="badge border font-weight-normal">{{ $productsPriceRange4->count() }}</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price" value="800000-5000000" id="price-5" onchange="this.form.submit()" >
                        <label class="custom-control-label" for="price-5">Trên 800,000 đ </label>
                        <span class="badge border font-weight-normal">{{ $productsPriceRange5->count() }}</span>
                    </div>
                    <!-- Các ô kiểm tra khác ở đây -->
                </form>
                
            </div>
            <!-- Price End -->
            
          
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ route('category.product', ['slug' => $category->slug, 'id' => $category->id]) }}" method="get" role="search">
                            <div class="input-group">
                                <input type="search" name="search" value="{{ old('search') }}" class="form-control" placeholder="TÌM KIẾM THEO TÊN">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        LỌC SẢN PHẨM
                                    </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id,'sort'=>'latest']) }}">HÀNG MỚI VỀ </a>
                                <a class="dropdown-item" href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id,'sort'=>'popularity']) }}">PHỔ BIẾN</a>
                                <a class="dropdown-item" href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id,'sort'=>'hightToLow']) }}">GIÁ TỪ CAO XUỐNG THẤP</a>
                                <a class="dropdown-item" href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id,'sort'=>'lowToHight']) }}">GIÁ TỪ THẤP LÊN CAO</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($products as $product )
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="height: 350px ;object-fit:cover" src="{{ $product->feature_image_path }}" alt="{{ $product->feature_image_name }}">
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
                            <h6 class="text-truncate mb-3">{{ strtoupper($product->name) }}</h6>
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
       
                <div class="col-12 pb-1">
            {{ $products->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
<!-- JavaScript Libraries -->
@yield('js')
@endsection

