@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang Sửa slider</title>
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add.css') }}">
@endsection
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Slider','key'=>'Edit'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <form action="{{ route('slider.update',['id'=>$menuEditSlider->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên Slider </label>
                <input type="text" name="name" value=" {{ $menuEditSlider->name }}"  class="form-control  @error('name') is-invalid @enderror" placeholder="Nhập tên slider ">
                @error('name')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Mô tả  </label>
                <textarea  name="description"  rows="4" class="form-control  @error('description') is-invalid @enderror" placeholder="Nhập Mô tả ">{{ $menuEditSlider->description }}</textarea>
                @error('description')
             <div class="alert alert-danger error_message">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Ảnh  slider </label>
                <input type="file" name="image_path"  class="form-control-file  @error('image_path') is-invalid @enderror">
                @error('image_path')
                 <div class="alert alert-danger error_message">{{ $message }}</div>
                 @enderror
              </div>
              <div class="mb-3">
                <img src="{{ $menuEditSlider->image_path }}" width="auto"  height="120" alt="">
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