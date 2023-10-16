@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Slider</title>
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
 @include('partials.content-header',['name'=>'Slider','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @can('slider-add')
          <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>            
          @endcan
        </div>
        <div class="col-md-12">
          <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Slider</th>
                <th scope="col">Nội dung Slider</th>
                <th scope="col">Ảnh Slider</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($sliders as $slider)
              <tr>
                <th scope="row">{{ $slider->id }}</th>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->description }}</td>
                <td>
                    <img src="{{ $slider->image_path }}" class="img_admin_slider" alt="">
                </td>                
                <td>
                  @can('slider-edit')
                  <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-default">Edit</a>
                  @endcan
                  @can('slider-delete')
                  <a href="" class="btn btn-danger action_delete"  data-url="{{ route('slider.delete',['id'=>$slider->id]) }}">Delete</a>
                  @endcan
                </td>  
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="col-md-2">
            {{ $sliders->links('pagination::bootstrap-4') }}
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