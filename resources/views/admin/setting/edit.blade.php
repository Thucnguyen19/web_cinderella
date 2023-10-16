@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang Sửa Setting</title>
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add.css') }}">
@endsection
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Setting','key'=>'Add'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ route('settings.update',['id'=>$settings->id]) }}" method="post" >
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Config_key </label>
                <input type="text" name="config_key" value="{{ $settings->config_key }}"  class="form-control  @error('name') is-invalid @enderror" placeholder="Nhập config key">
                @error('config_key')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              @if (request()->type==='Text')
              <div class="mb-3">
                <label  class="form-label">Config_value </label>
                <input type="text" name="config_value" value="{{ $settings->config_value }}"  class="form-control  @error('config_value') is-invalid @enderror" placeholder="Nhập config value">
                @error('config_value')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              @elseif (request()->type==='Textarea')
              <div class="mb-3">
                <label  class="form-label">Config_value </label>
                <textarea rows="5" name="config_value"   class="form-control  @error('config_value') is-invalid @enderror" placeholder="Nhập config value">{{ $settings->config_value }}
                </textarea>
                @error('config_value')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              
              @endif
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->s
</div>
@endsection