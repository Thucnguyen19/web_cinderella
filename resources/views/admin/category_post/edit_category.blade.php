@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Sửa Bài Đăng</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Category Post','key'=>'Edit'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <form action="{{ route('category_post.update',['id'=>$category_posts->id]) }}" method="get">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên danh mục </label>
                <input type="text" name="name" class="form-control" value="{{ $category_posts->name }}" placeholder="Nhập tên danh mục">
              </div>
             <div class="form-group">
              <label >Chọn danh mục cha</label>
              <select class="form-control" aria-label="Default select example" name="parent_id" >
                <option value="0" >Chọn danh mục cha</option>
              {{!! $htmlOption !!}}
              </select>
             </div>
             <div class="mb-3">
              <label  class="form-label">Từ Khóa danh mục </label>
              <input type="text" name="keywords" class="form-control" value="{{ $category_posts->meta_keywords }}" placeholder="Nhập từ khóa cho danh mục">
            </div>
            <div class="mb-3">
              <label  class="form-label">Mô Tả danh mục </label>
              <input type="text" name="description" class="form-control" value="{{ $category_posts->meta_des }}" placeholder="Nhập mô tả cho danh mục">
            </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection