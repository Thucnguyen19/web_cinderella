

@extends('front-end.layouts.master')
@section('title')
<title>Giỏ hàng sản phẩm </title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">GIỎ HÀNG</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">TRANG CHỦ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">GIOR HÀNG</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                @php
                use Darryldecode\Cart\Facades\CartFacade;
                    $content =CartFacade::getContent();
                //  dd($content);
                @endphp
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($content as $valueContent )
                        <tr>
                            <td class="align-middle">
                                <img src="{{ $valueContent->attributes->image }}" alt="" style="width: 50px;">
                                {{ $valueContent->name }}</td>
                            <td class="align-middle">{{ strtoupper($valueContent->attributes->color) }}</td>
                            <td class="align-middle">{{ strtoupper($valueContent->attributes->size) }} </td>
                            <td class="align-middle">{{ number_format($valueContent->price) }} vnd</td>
                            <td class="align-middle">
                                <form method="get" action="{{ route('update-cart',['rowId'=>$valueContent->id])}}">
                                    @csrf
                                <div class="input-group quantity mx-auto d-flex" style="width:200px">
                                    <input type="number" name="quantity" class="form-control form-control-sm bg-secondary text-center" value="{{ $valueContent->quantity }}">
                                    <input type="hidden" name="rowId_cart" value="{{ $valueContent->id }}" >
                                        <input type="submit" name="cart_submit" class="btn btn-sm btn-primary btn-plus text-white" style="width: 100px; margin-left:5px" value="Update">
                                    </div>
                                    </form>
                                    
                            </td>
                            <td class="align-middle">{{ number_format($valueContent->price * $valueContent->quantity ).' '.'vnd' }}</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-primary text-danger">
                                <a href="{{ route('delete-cart',['rowId'=>$valueContent->id]) }}" class="text-danger">
                                    <i class="fa fa-times"></i>
                                </a>
                            </button></td>
                        </tr>
                            
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp Dụng Mã Giảm Giá</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng Thanh Toán </h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng Tiền</h6>
                            <h6 class="font-weight-medium">{{ number_format(CartFacade::getSubTotal()).' '.'vnd' }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí Vận Chuyển</h6>
                            <h6 class="font-weight-medium">{{ number_format(30000).' '.'vnd' }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Thành Tiền:</h5>
                            <h5 class="font-weight-bold">{{ number_format(Cart::getTotal() + 30000) }} vnd</h5>
                        </div>
                        <?php
                        // if 'id' of table customer is null => page redirection to login-checkout, else page redirection to checkout, but might have to Sesion in CheckcountController 
                        $customer_id =Session::get('customer_id');
                        // dd($customer_id);
                        $shipping_id = DB::table('customer')->where('id', Session::get('customer_id'))->value('shipping_id');
                        // dd($shipping_id);
                        if($customer_id === Null){
                        ?>
                        <a name="checkout" href="{{ route('login-checkout')}}" class="btn btn-block btn-primary my-3 py-3" >
                                                Tiến Hành Thanh Toán
                                            </a>
                           <?php 
                          }else if ($customer_id !== Null && $shipping_id !== 0 ) {    ?>
                            <a name="checkout" href="{{ route('checkout-saved',['shipping_id'=>$shipping_id])}}" class="btn btn-block btn-primary my-3 py-3" >
                                                       Tiến Hành Thanh Toán
                          </a>
                       <?php
                        }else if ($customer_id !== Null && $shipping_id === 0) {
                        ?>
                        <a name="checkout" href="{{ route('checkout') }}" class="btn btn-block btn-primary my-3 py-3" >
                            Tiến Hành Thanh Toán
                            </a>
                          <?php } 
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection


