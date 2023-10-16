@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Thêm Mới Bài Viết</title>
@endsection
@section('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css') }}">


{{-- coppy link phía trên ra ngoài web rồi lưu file với tên select2.min.css  --}}
@endsection

@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Bài Viết','key'=>'Thêm Mới'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
         
         
          <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tiêu Đề Bài Viết </label>
                <textarea  rows="3" name="post_title" class="form-control @error('post_title') is-invalid @enderror "  placeholder="Nhập tiêu đề bài viết">{{ old('post_title') }}</textarea>
                @error('post_title')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>                  
                @enderror
              </div>
              <div class="mb-3 ">
                <label  class="form-label">Mô Tả Bài Viết</label>
                <textarea  type="text" rows="3" name="post_des" class="form-control editor" @error('post_des') is-invalid @enderror  placeholder="Nhập Mô Tả Bài Viết">{{ old('post_des') }}</textarea>
                @error('post_des')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3 ">
                <label  class="form-label">Nội dung Bài Viết</label>
                <textarea id="editor"  rows="5" name="post_content" class="form-control" @error('post_content') is-invalid @enderror  placeholder="Nhập Nội dung Bài Viết">{{ old('post_content') }}</textarea>
                @error('post_content')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div> 
              <div class="mb-3 ">
                <label  class="form-label">Mô Tả Cho Meta</label>
                <input type="text" name="post_meta_des" class="form-control" @error('post_meta_des') is-invalid @enderror value="{{ old('post_meta_des') }}" placeholder="Nhập Mô Tả Cho Meta">
                @error('post_meta_des')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Từ Khóa Meta</label>
                <input type="text" name="post_meta_keywords" class="form-control" @error('post_meta_keywords') is-invalid @enderror value="{{ old('post_meta_keywords') }}" placeholder="Nhập Từ Khóa Thẻ Meta">
                @error('post_meta_keywords')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
     
           
              <div class="mb-3">
                <label  class="form-label">Ảnh sản phẩm </label>
                <input type="file"  name="post_image_path" class="form-control-file @error('post_image_path') is-invalid @enderror" >
                @error('post_image_path')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
             
             <div class="form-group">
              <label >Chọn danh mục cha</label>
              <select class="form-control select2_init" @error('category_post_id') is-invalid @enderror value="{{ old('category_post_id') }}" aria-label="Default select example" name="category_post_id" >
                <option value="" >Chọn danh mục </option>
               {{!! $htmlOption !!}}
              </select>

              @error('category_post_id')
                  <div class="alert alert-danger erro-message">
                    {{ $message }}
                  </div>
                  @enderror
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
@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/3eep4009mp8pb8t6mf1nypp69buwbn8dss6u581xjitpgnu3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: 'textarea.editor',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
     
    });

</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection