@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang chu</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Menu','key'=>'Add'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <form action="{{ route('menus.store') }}" method="get">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên Menu </label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên menu ">
              </div>
             <div class="form-group">
              <label >Chọn Menu cha</label>
              <select class="form-control" aria-label="Default select example" name="parent_id" >
                <option value="0" >Chọn Menu cha</option>
               {{!! $optionSelect !!}}
              </select>
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