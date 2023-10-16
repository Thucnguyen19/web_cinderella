@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang sửa Vai trò( Edit Role)</title>
@endsection
@section('content')
@section('css')
   <link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
@endsection
@section('js')
  <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Role','key'=>'Edit'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <form action="{{ route('roles.update',['id'=>$role->id]) }}" method="post" enctype="multipart/form-data" >
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
            <div class="col-md-6">
                <div class="mb-3">
                  <label  class="form-label">Tên Role </label>
                  <input type="text" name="name" value="{{ $role->name }}"  class="form-control  @error('name') is-invalid @enderror" placeholder="Nhập tên slider ">
                  @error('name')
                 <div class="alert alert-danger error_message">{{ $message }}</div>
                 @enderror
                </div>
                <div class="mb-3">
                  <label  class="form-label">Mô tả vai trò  </label>
                  <input type="text"  name="display_name"  class="form-control  @error('display_name') is-invalid @enderror" placeholder="Nhập Mô tả " value="{{ $role->display_name}}">
                  @error('display_name')
               <div class="alert alert-danger error_message">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="col-md-12" >
                <div class="row">
                  <div class="col-md-12">
                    <label >
                      <input type="checkbox" class="checkall">
                      Check All
                    </label>
                  </div>
                  @foreach ( $permissionsParent as  $permissionItem )                   
                    <div class="card border-primary mb-3" style="width:100%">
                        <div class="card-header">
                            <label for="">
                                <input type="checkbox" value="" class="checkbox_wrapper">
                            </label>
                            Module {{ $permissionItem ->name }}
                        </div>
                        <div class="row">
                            @foreach ( $permissionItem->permissionsChildrent as $permissionChildrentItem )
                                                   
                                <div class="card-body text-primary">
                                  <h5 class="card-title">
                                    <label >
                                        <input type="checkbox" name="permission_id[]"
                                         value="{{ $permissionChildrentItem->id }}"
                                        {{ $permissionChecked->contains('id',$permissionChildrentItem->id) ? 'checked' : '' }}
                                         class="checkbox_childrent">
                                    </label>
                                    {{ $permissionChildrentItem->name }} 
                                  </h5>
                                </div>
                            @endforeach
                            
                     </div>
                </div>
                @endforeach
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