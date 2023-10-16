<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">H</span>CINDERELLA</h1>
            </a>
            <p> </p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> {{  App\Helpers\Helper::getConfigValueFromSettingTable('address') }}</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{  App\Helpers\Helper::getConfigValueFromSettingTable('email') }}</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i> {{  App\Helpers\Helper::getConfigValueFromSettingTable('phone_number') }}</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">MENU</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>TRANG CHỦ</a>
                        {{-- <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i></a> --}}
                        {{-- <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a> --}}
                        <a class="text-dark mb-2" href="{{ route('show_blog') }}"><i class="fa fa-angle-right mr-2"></i>TIN TỨC</a>
                        <a class="text-dark" href="{{ route('show_contact') }}"><i class="fa fa-angle-right mr-2"></i>LIÊN HỆ</a>
                        <a class="text-dark mb-2" href="{{ route('show-cart') }}"><i class="fa fa-angle-right mr-2"></i>GIỎ HÀNG</a>
                    </div>
                </div>
                
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">ĐĂNG KÝ NHẬN TIN</h5>
                    <form action="{{ route('news-letter') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control border-0 py-4" placeholder="HỌ TÊN" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control border-0 py-4" placeholder="EMAIL"
                                required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" onclick="alert('Bạn đã đăng ký nhận tin tức từ CINDERELLA thành công !')" type="submit">ĐĂNG KÝ NGAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            {{-- {!! \App\Helpers\getConfigValueFromSettingTable('footer_information') !!} --}}
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="eshopper-1.0.0/eshopper-1.0.0/img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->