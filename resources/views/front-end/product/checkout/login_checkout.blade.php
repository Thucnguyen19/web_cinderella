
@extends('front-end.layouts.master')
@section('title')
<title>Đăng nhập</title>
@endsection
@section('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Login" name="keywords">
<meta content="Khách hàng điền thông tin tài khoản để đăng nhập, nếu chưa có thì đăng ký mới." name="description">
<meta content="" name="canonical">
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('front-end/products/discount.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/menu/menu.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/products/login-checkout/login_checkout.css') }}">
    @endsection

@section('content')
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(() =>{
		$("#verified_policy input").change(function() {
			if($("#verified_policy input").is(':checked')){
				$("#btn-register").removeAttr('disabled');
			}else{
			$("#btn-register").attr('disabled','');
			}
		});
	})
</script>
@endsection
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
   

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Tài Khoản</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang Chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tài Khoản</p>
        </div>
    </div>
</div>

		
<div id="PageContainer" class="is-moved-by-drawer">
	<main class="main-content" role="main">
		<section id="page-wrapper" class="customer-login">
<div class="wrapper">
<div class="inner">

	<div class="grid mg-left-110">

		<div class="grid__item large--one-half medium--one-half small--one-whole pd-left110 text-left ">
			<div class="width-80">
				
				<div class="note form-success" id="ResetSuccess" style="display:none;">
					Đổi mật khẩu thành công
				</div>

				<div id="CustomerLoginForm" class="form-vertical">
					<form accept-charset='UTF-8' action='{{ route('login_customer') }}' id='customer_login' method='post'>
						@csrf
<input name='form_type' type='hidden' value='customer_login'>
<input name='utf8' type='hidden' value='✓'>


					<h1>Đăng nhập</h1>
					<div class="desc_login">Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn!</div>
					

					<label for="CustomerEmail" class="">Email</label>
					<input type="email" name="customer_email" id="CustomerEmail" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off" autofocus>

					
					<label for="CustomerPassword" class="">Mật khẩu</label>
					<input type="password" value="" name="customer_password" id="CustomerPassword" class="input-full" placeholder="Mật khẩu">
					

					
					<div class="text-right">
						<p><a href="#recover" id="RecoverPassword">Quên mật khẩu</a></p>
					</div>
					
					<p>
						<input type="submit" class="btn btn--full" value="Đăng nhập">
					</p>

					
{{-- <input id='46233c6b02934287b5450f889bb22743' name='g-recaptcha-response' type='hidden'><script src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script><script>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('46233c6b02934287b5450f889bb22743').value = token;});});</script> --}}
</form>
				</div>

				
				<div id="RecoverPasswordForm" style="display: none;">

					<h2>Khôi phục mật khẩu</h2>

					<div class="form-vertical">
						<form accept-charset='UTF-8' action='' method='post'>
<input name='form_type' type='hidden' value='recover_customer_password'>
<input name='utf8' type='hidden' value='✓'>


						

						
						

						<label for="RecoverEmail" class="">Email</label>
						<input type="email" value="" name="email" id="RecoverEmail" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off">

						<p>
							<input type="submit" class="btn btn--full" value="Khôi phục">
						</p>
						<button type="button" id="HideRecoverPasswordLink" class="text-link">Hủy</button>
						
{{-- <input id='1158a8e7ae8c4278bb3c593f77cf745b' name='g-recaptcha-response' type='hidden'><script src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script> --}}
{{-- <script>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('1158a8e7ae8c4278bb3c593f77cf745b').value = token;});});</script> --}}
</form>
					</div>

				</div>

				
				
			</div>
		</div>
		<div class="grid__item large--one-half medium--one-half small--one-whole pd-left110 text-left br-right">
			<div class="width-80">
				<h1>Đăng ký</h1>
				<div class="desc_login">Hãy đăng ký ngay để tích lũy điểm thành viên và nhận được 
những ưu đãi tốt hơn!</div>
				<div class="form-vertical">
					<form accept-charset='UTF-8' action='{{ route('add_customer') }}' id='create_customer' method='post'>
						@csrf
<input name='form_type' type='hidden' value='create_customer'>
<input name='utf8' type='hidden' value='✓'>
					<label for="customer_name" class="">Họ & Tên</label>
					<input type="text" name="customer_name" id="LastName" class="input-full" placeholder="Họ & Tên"  autocapitalize="words">

					<label for="Email" class="">Email</label>
					<input type="email" name="customer_email" id="Email" class="input-full" placeholder="Email"  autocorrect="off" autocapitalize="off">

					<label for="Phone" class="">Số điện thoại</label>
					<input type="text" name="customer_phone" id="Phone" class="input-full" placeholder="Số điện thoại"  autocorrect="off" autocapitalize="off">
					<label for="CreatePassword" class="">Mật khẩu</label>
					<input type="password" name="customer_password" id="CreatePassword" class="input-full" placeholder="Mật khẩu">
					<div id="verified_email" class="clearfix large_form">
						<input type="checkbox" name="customer[accepts_marketing]"> Đăng ký nhận bản tin
					</div>
					<div id="verified_policy" class="clearfix large_form">
						<input type="checkbox"> Tôi đồng ý với các <a href=""> điều khoản</a> của H-Cinderrella
					</div>
					<p>
						<input type="submit" name="submit_register" value="Đăng ký" class="btn btn--full" id="btn-register" disabled >
					</p>
					
{{-- <input id='9b4fb4dcd9be42e08b62c7e695344b1f' name='g-recaptcha-response' type='hidden'><script src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script><script>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('9b4fb4dcd9be42e08b62c7e695344b1f').value = token;});});</script> --}}
</form>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
</section>

	</main>
</div>
<!-- Checkout End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
@yield('js')
@endsection
