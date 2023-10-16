@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Add Product</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweatAlert2.js')}}"></script>
<script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Product','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @can('product-list')           
          <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
          @endcan
        </div>
        <div class="col-md-12">
          <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá gốc</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Action</th>               
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $productItem)
        {{-- {{ dd($productItem->category) }} --}}
            
              <tr>
                <th scope="row">{{ $productItem->id }}</th>
                <td>{{ $productItem->name }}</td>
                <td>{{ number_format($productItem->discount) }}</td>
                <td>{{ number_format($productItem->price) }}</td>
                <td>
                    <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                </td>
                <td>
                   {{optional($productItem->category)->name}}
                   {{-- optinal :dù giá trị của category là null thì nó vẫn trả về  --}}
                </td>

                <td>
                  @can('product-edit')
                  <a href="{{ route('product.edit',['id'=>$productItem->id]) }}" class="btn btn-default">Edit</a>
                  @endcan
                  @can('product-delete')                   
                  <a href="" class="btn btn-danger action_delete" data-url="{{ route('product.delete',['id'=>$productItem->id]) }}">Delete</a>
                  @endcan
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          </div>
          <div class="col-md-2">
            {{ $products->links('pagination::bootstrap-4') }}
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