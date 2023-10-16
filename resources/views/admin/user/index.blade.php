@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>User</title>
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
 @include('partials.content-header',['name'=>'User','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên User</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                
            
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                               
                <td>
                  <a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-default">Edit</a>
                  <a href="" class="btn btn-danger action_delete"  
                  data-url=" {{ route('users.delete',['id'=>$user->id]) }}"
                  >Delete</a>
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          <div class="col-md-2">
            {{ $users->links('pagination::bootstrap-4') }}
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