@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Roles</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add.css') }}">
@endsection
@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweatAlert2.js')}}"></script>
<script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Role','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Vai trò</th>
                <th scope="col">Mô tả vai trò</th>
                <th scope="col">Action</th>            
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)         
              <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                           
                <td>
                  <a href="{{ route('roles.edit',['id'=>$role->id]) }}" class="btn btn-default">Edit</a>
                  <a href="" class="btn btn-danger action_delete" 
                   {{-- data-url="{{ route('roles.delete',['id'=>$role->id]) }}" --}}
                   >Delete</a>
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          <div class="col-md-2">
            {{ $roles->links('pagination::bootstrap-4') }}
            {{-- {{ $categories->links('pagination::bootstrap-4') }} trong Laravel được 
            sử dụng để hiển thị các liên kết phân trang cho đối tượng $categories. Tham số 'pagination::bootstrap-4' 
            được truyền vào phương thức links() để chỉ định rằng các liên kết phân trang sẽ sử dụng kiểu phân trang của Bootstrap 4 --}}

       </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection