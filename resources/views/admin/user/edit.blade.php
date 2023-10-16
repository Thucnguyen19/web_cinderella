@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang sửa user</title>
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admins/user/add/add.css') }}">
@endsection
@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/user/add/add.js') }}"></script>
@endsection
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'User','key'=>'edit'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <form action="{{ route('users.update',['id'=>$users->id]) }}" method="post" >
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
              <div class="mb-3">
                <label  class="form-label">Tên User </label>
                <input type="text" name="name" value="{{ $users->name }}"  class="form-control  @error('name') is-invalid @enderror" placeholder="Nhập tên user ">
                @error('name')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Email </label>
                <input type="email" name="email" value="{{ $users->email }}"  class="form-control  @error('email') is-invalid @enderror" placeholder="Nhập Email ">
                @error('email')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Password </label>
                <input type="password" name="password" value="{{ $users->password}}"  class="form-control  @error('password') is-invalid @enderror" placeholder="Nhập tên password ">
                @error('password')
               <div class="alert alert-danger error_message">{{ $message }}</div>
               @enderror
              </div>
              <div class="mb-3">
                <label >Chọn vai trò </label>
                <select name="role_id[]" class="form-control select2_init" multiple id="">
                  <option value=""></option>

                  @foreach ($roles as $role )
                    <option class="select_role" {{ $roleOfUser->contains('id',$role->id) ? 'selected' :'' }} value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                
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