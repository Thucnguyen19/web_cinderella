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
 @include('partials.content-header',['name'=>'Product','key'=>'Edit'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên sản phẩm </label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
              </div>
              <div class="mb-3">
                <label  class="form-label">Giá sản phẩm chưa giảm</label>
                <input type="number" name="discount" value="{{ $product->discount}}" class="form-control" placeholder="Nhập giá sản phẩm">
              </div>
              <div class="mb-3">
                <label  class="form-label">Giá bán sản phẩm </label>
                <input type="number" name="price" value="{{ $product->price}}" class="form-control" placeholder="Nhập giá sản phẩm">
              </div>
              <div class="mb-3">
                <label  class="form-label">Ảnh sản phẩm </label>
                <input type="file" multiple name="feature_image_path" class="form-control-file" >
              <div class="col-md-12"><div class="row">
              <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">  
              </div></div>
              </div>
              <div class="mb-3">
                <label  class="form-label">Ảnh chi tiết sản phẩm  </label>
                <input type="file" multiple name="image_path[]" class="form-control-file" >
             <div class="col-md-12 container">
              <div class="row">
                @foreach ( $product->productImage as $productImageItem)
                  <div class="col-md-3">
                    <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                  </div>
                @endforeach
              </div>
             </div>
              </div>
             <div class="form-group">
              <label >Chọn danh mục cha</label>
              <select class="form-control select2_init" aria-label="Default select example" name="category_id" >
                <option value="" >Chọn danh mục </option>
               {{!! $htmlOption !!}}
              </select>
            </div>
            <div class="form-group">
              <label >Nhập tags cho sản phẩm </label>
              <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
               @foreach ($product->tags as $tagItem )
                 <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
               @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Nhập màu cho sản phẩm </label>
              <select class="form-control tags_select_choose" name="colors[]" multiple="multiple">
                @foreach ($product->colors as $colorItem )
                <option value="{{ $colorItem->name }}" selected>{{ $colorItem->name }}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Nhập size cho sản phẩm </label>
              <select class="form-control tags_select_choose" name="sizes[]" multiple="multiple">
                @foreach ($product->sizes as $sizeItem )
                <option value="{{ $sizeItem->name }}" selected>{{ $sizeItem->name }}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Nội dung</label>
              <input class="form-control " @error('contents') is-invalid @enderror  name="contents"  rows="3" value="{{ $product->content}}">
              @error('contents')
              <div class="alert alert-danger erro-message">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label >Mô Tả Sản Phẩm</label>
              <textarea class="form-control my-editor" @error('description') is-invalid @enderror  name="description"  rows="3" >{{ $product->description}}</textarea>
              @error('description')
              <div class="alert alert-danger erro-message">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label >Thông Tin Thêm</label>
              <textarea id="editor" class="form-control " @error('product_info') is-invalid @enderror  name="product_info"  rows="3" >{{$product->product_info }}</textarea>
              @error('product_info')
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