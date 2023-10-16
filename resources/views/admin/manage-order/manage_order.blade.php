@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Liệt Kê Đơn Hàng</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Manage-Order','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          {{-- @can('category-add')
          <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
          @endcan --}}
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tổng Tiền</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Hiển Thị</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($all_order as $order)
                
            
              <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->order_total }}</td>
                <td>{{ $order->order_status}}</td>
              
                <td>                  
                    <a href="{{ route('view-order',['order_id'=>$order->id]) }}" class="btn btn-default">Edit</a>    
                    <a href="" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')" class="btn btn-danger">Delete</a>   
                </td> 
                
              </tr>

              @endforeach
             
            </tbody>
          </table>
          <div class="col-md-2">
            {{ $all_order->links('pagination::bootstrap-4') }}
            {{-- {{ $categories->links('pagination::bootstrap-4') }} trong Laravel được 
            sử dụng để hiển thị các liên kết phân trang cho đối tượng $categories. Tham số 'pagination::bootstrap-4' 
            được truyền vào phương thức links() để chỉ định rằng các liên kết phân trang sẽ sử dụng kiểu phân trang của Bootstrap 4 --}}

       </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection