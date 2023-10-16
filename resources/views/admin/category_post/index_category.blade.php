@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang chu</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'category','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          {{-- @can('category-add') --}}
          <a href="{{ route('category_post.create') }}" class="btn btn-success float-right m-2">Add</a>
          {{-- @endcan --}}
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục bài viết</th>
                <th scope="col">Keyword</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($category_posts as $category)
                
            
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->meta_keywords }}</td>
                <td>{{ $category->meta_des }}</td>
                <td>
                  {{-- @can('category-edit') --}}
                  <a href="{{ route('category_post.edit',$category->id) }}" class="btn btn-default">Edit</a>   
                  {{-- @endcan --}}
                  {{-- @can('category-delete') --}}
                    
                  <a href="{{ route('category_post.delete',$category->id) }}" class="btn btn-danger">Delete</a>
                  {{-- @endcan --}}
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          <div class="col-md-2">
            {{ $category_posts->links('pagination::bootstrap-4') }}
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