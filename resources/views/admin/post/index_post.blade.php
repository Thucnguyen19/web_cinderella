@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Danh Sách Bài Viết</title>
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
 @include('partials.content-header',['name'=>'Bài Viết','key'=>'Danh Sách'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @can('product-list')           
          <a href="{{ route('post.create') }}" class="btn btn-success float-right m-2">Add</a>
          @endcan
        </div>
        <div class="col-md-12">
          <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên Tiêu Đề</th>
                {{-- <th scope="col">Mô Tả</th> --}}
                <th scope="col">Nội dung </th>
                <th scope="col">Danh mục bài viết</th>
                <th scope="col">Action</th>               
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $postItem)
        {{-- {{ dd($postItem->category) }} --}}
            
              <tr>
                <th scope="row">{{ $postItem->id }}</th>
                <td>
                    <img class="product_image_150_100" src="{{ $postItem->post_image_path }}" alt="{{ $postItem->post_image_name }}">
                </td>
                <td> {{  \Illuminate\Support\Str::limit($postItem->post_title, $limit = 30, $end = '...')   }}</td>
                {{-- <td> {{  strip_tags(\Illuminate\Support\Str::limit($postItem->post_des, $limit = 100, $end = '...'))   }}</td> --}}
                <td> {{  strip_tags(\Illuminate\Support\Str::limit($postItem->post_content, $limit = 100, $end = '...'))   }}</td>

        
               
                <td>
                   {{optional($postItem->category_post)->name}}
                   {{-- optinal :dù giá trị của category là null thì nó vẫn trả về  --}}
                </td>

                <td>
                  {{-- @can('product-edit') --}}
                  <a href="{{ route('post.edit',['id'=>$postItem->id]) }}" class="btn btn-default">Edit</a>
                  {{-- @endcan --}}
                  {{-- @can('product-delete')                    --}}
                  <a href="" class="btn btn-danger action_delete" data-url="{{ route('post.delete',['id'=>$postItem->id]) }}">Delete</a>
                  {{-- @endcan --}}
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          </div>
          <div class="col-md-2">
            {{ $posts->links('pagination::bootstrap-4') }}
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