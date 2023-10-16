@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang chu</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header',['name'=>'Home','key'=>'Home'])

  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">

         <h3>Chào mùng bạn đến với trang admin </h3>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection