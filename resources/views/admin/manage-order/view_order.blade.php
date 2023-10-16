@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Liệt Kê Đơn Hàng</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Trang Chi Tiết','key'=>'Đơn Hàng '])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 ">
            <h2 >Thông Tin Tài Khoản Khách Hàng</h2>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã Tài khoản</th>
                <th scope="col">Tên khách hàng</th>
                {{-- <th scope="col">Địa Chỉ</th> --}}
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Mgày tạo đơn </th>
               
              </tr>
            </thead>
            <tbody>
           
                
            
              <tr>
                <th scope="row">{{ $orderById->customer_id}}</th>
                <td>{{ $orderById->customer_name }}</td>
                {{-- <td>{{ $orderById->customer_address }}</td> --}}
                <td>{{ $orderById->customer_phone }}</td>
                <td>{{ $orderById->created_at }}</td>

              </tr>

             
            </tbody>
          </table>
          <div class="col-md-2">
       </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
            <h2 >Thông Tin Vận Chuyển</h2>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã Vận Chuyển</th>
                <th scope="col">Tên Người Nhận Hàng</th>
                <th scope="col">Địa Chỉ </th>
                <th scope="col">Số Điện Thoại</th>
               
                
              </tr>
            </thead>
            <tbody>
           
                
            
              <tr>
                <th scope="row">{{ $orderById->shipping_id }}</th>
                <td>{{ $orderById->shipping_name }}</td>
                <td>{{ $orderById->shipping_address }}</td>
                <td>{{ $orderById->shipping_phone}}</td>
              
               
                
              </tr>

             
            </tbody>
          </table>
          <div class="col-md-2">
       </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
            <h2 >Chi Tiết Đơn Hàng</h2>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng Tiền</th>
                
              </tr>
            </thead>
            <tbody>
           
                
            
              <tr>
                <th scope="row">{{ $orderById->product_id }}</th>
                <td>{{ $orderById->product_name }}</td>
                <td>{{ $orderById->product_sales_quantity}}</td>
                <td>{{number_format($orderById->product_price)}} vnd</td>
                <td>{{ number_format($orderById->order_total)}} vnd</td>
              
              
                
              </tr>

             
            </tbody>
          </table>
          <div class="col-md-2">
       </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection