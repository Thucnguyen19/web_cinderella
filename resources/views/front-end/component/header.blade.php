<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">

            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="{{  App\Helpers\Helper::getConfigValueFromSettingTable('facebook_link') }}">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">H</span>CINDERELLA</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="{{ route('search') }}" method="get" role="search">
                <div class="input-group">
                    <input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="TÌM KIẾM SẢN PHẨM">
                    <div class="input-group-append">
                        <button class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @php
        use Darryldecode\Cart\Facades\CartFacade;
            $content =CartFacade::getContent();
        //  dd($content);
        @endphp
        <div class="col-lg-3 col-6 text-right">

            <a href="{{ route('show-cart') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{ $content->count() }}</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->