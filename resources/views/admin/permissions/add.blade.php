@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Trang chu</title>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Permissions','key'=>'Add'])
 {{-- include file content-header và mảng gồm 2 biến name và key  --}}
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <form action="{{ route('permissions.strore') }}" method="post">
            @csrf
            {{-- form trong laravel bat buoc phai co @csrf để submit --}}
         
             <div class="form-group">
              <label >Chọn tên Modul </label>
              <select class="form-control" aria-label="Default select example" name="modul_parent" >
               <option value="">Chọn Modul</option>
                @foreach (config('permissions.table_module') as  $modulItem)
               <option value="{{ $modulItem }}" >{{ $modulItem }}</option>                 
               @endforeach
           
            
              </select>
             </div>
             <div class="form-group">
                <div class="row">
                  @foreach (config('permissions.Modul_childrent') as $modulChild )
                  <div class="col-md-3">
                     <label for="">
                         <input type="checkbox" name="modul_childrent[]" id="" value="{{ $modulChild }}">
                         {{ $modulChild }}
                     </label>
                  </div>               
                  @endforeach
              
                </div>
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