<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto py-0">
        <a href="{{ route('home') }}" class="nav-item nav-link active">TRANG CHỦ</a>
        <a href="{{ route('home') }}#new_products" class="nav-item nav-link">SẢN PHẨM MỚI</a>       
        <a href="{{ route('home') }}#trend_products" class="nav-item nav-link">XU HƯỚNG</a>       
        <a href="{{ route('show_blog') }}" class="nav-item nav-link">TIN TỨC</a>
        <a href="{{ route('show_contact') }}" class="nav-item nav-link">LIÊN HỆ</a>
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
