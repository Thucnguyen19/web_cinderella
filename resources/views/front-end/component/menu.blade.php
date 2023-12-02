<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
<style>

.f-500{
   font-weight:500; 
   
   position: relative;
   overflow: hidden;
}
    .underline{
        font-weight:600 !important; 
    }


.underline::after {
    content: '';
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
    width: 100%;
    height: 3px;
    background-color: #D19C97;
    animation: slide 5s infinite;
}
@keyframes slide {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
</style>
    <div class="navbar-nav mr-auto py-0">
        <a href="{{ route('home') }}" class="nav-item nav-link f-500 {{ $currentPage === 'home' ? 'active underline' : '' }}">TRANG CHỦ</a>
        <a href="{{ route('home') }}#new_products" class="nav-item f-500 nav-link">SẢN PHẨM MỚI</a>       
        <a href="{{ route('home') }}#trend_products" class="nav-item f-500 nav-link">XU HƯỚNG</a>       
        <a href="{{ route('show_blog') }}" class="nav-item nav-link f-500 {{ $currentPage ==='blog' ? 'active underline' : '' }}">TIN TỨC</a>
        <a href="{{ route('show_contact') }}" class="nav-item nav-link f-500 {{ $currentPage === 'contact' ? 'active underline' : '' }}">LIÊN HỆ</a>
    </div>
    <div class="navbar-nav ml-auto py-0">
        <?php
            $customer_id =Session::get('customer_id');
            if($customer_id === Null){
        ?>
        <a href="{{ route('login-checkout') }}" class="nav-item nav-link">ĐĂNG NHẬP</a>       
        <a href="{{ route('login-checkout') }}" class="nav-item nav-link">ĐĂNG KÝ</a>
       
       <?php 
            }else{
        ?>
                <a href="{{ route('logout-checkout') }}" class="nav-item nav-link">ĐĂNG XUẤT</a>
           <?php }   ?>   
            
     </div>
 </div>
