@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Add Product</title>
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
 @include('partials.content-header',['name'=>'Product','key'=>'Add'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
         
         
          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên sản phẩm </label>
                <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror value="{{ old('name') }}" placeholder="Nhập tên sản phẩm">
                @error('name')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>                  
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Giá sản phẩm chưa giảm </label>
                <input type="text" name="discount" class="form-control" @error('discount') is-invalid @enderror value="{{ old('discount') }}" placeholder="Nhập giá gốc">
                @error('discount')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Giá bán sản phẩm </label>
                <input type="text" name="price" class="form-control" @error('price') is-invalid @enderror value="{{ old('price') }}" placeholder="Nhập giá sản phẩm">
                @error('price')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
              </div>
           
              <div class="mb-3">
                <label  class="form-label">Ảnh sản phẩm </label>
                <input type="file"  name="feature_image_path" class="form-control-file" >
              </div>
              <div class="mb-3">
                <label  class="form-label">Ảnh chi tiết sản phẩm  </label>
                <input type="file" multiple name="image_path[]" class="form-control-file" >
              </div>
             <div class="form-group">
              <label >Chọn danh mục cha</label>
              <select class="form-control select2_init" @error('category_id') is-invalid @enderror value="{{ old('category_id') }}" aria-label="Default select example" name="category_id" >
                <option value="" >Chọn danh mục </option>
               {{!! $htmlOption !!}}
              </select>

            </div>
            @error('category_id')
                <div class="alert alert-danger erro-message">
                  {{ $message }}
                </div>
                @enderror
            <div class="form-group">
              <label >Nhập tags cho sản phẩm </label>
              <select class="form-control tags_select_choose"  name="tags[]" multiple="multiple">{{ old('tags[]') }}
              </select>
            </div>
            <div class="form-group">
              <label >Nhập màu cho sản phẩm </label>
              <select class="form-control tags_select_choose" name="colors[]" multiple="multiple">{{ old('color[]') }}
              </select>
            </div>
            <div class="form-group">
              <label >Nhập size cho sản phẩm </label>
              <select class="form-control tags_select_choose" name="sizes[]" multiple="multiple">
                {{ old('sizes[]') }}
              </select>
            </div>
            
            <div class="form-group">
              <label >Nội dung</label>
              <input class="form-control" @error('contents') is-invalid @enderror  name="contents"  rows="3" value="{{ old('contents') }}">
              @error('contents')
              <div class="alert alert-danger erro-message">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label >Mô Tả Sản Phẩm</label>
              <textarea class="form-control my-editor" @error('description') is-invalid @enderror  name="description"  rows="3" >{{ old('description') }}</textarea>
              @error('description')
              <div class="alert alert-danger erro-message">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label >Thông Tin Thêm</label>
              <textarea id="editor" class="form-control "  name="product_info"  rows="3" >{{ old('product_info') }}</textarea>
             
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
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/3eep4009mp8pb8t6mf1nypp69buwbn8dss6u581xjitpgnu3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    tinymce.init({
      selector: '.my-editor',
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