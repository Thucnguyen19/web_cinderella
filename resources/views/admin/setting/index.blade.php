@extends('layouts.admin')
{{-- kế thừa trang admin  --}}
@section('title')
<title>Setting</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/add.css') }}">
@endsection
@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweatAlert2.js')}}"></script>
<script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection
@section('content')
{{-- <p>This is my body content</p>yes --}}
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 @include('partials.content-header',['name'=>'Setting','key'=>'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="btn-group">
              @can('setting-add')
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                Add Setting
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
               <li><a href="{{ route('settings.create').'?type='.'Text'}}">Text</a></li>
               <li><a href="{{ route('settings.create').'?type='.'Textarea'}}">Textaria</a></li>
              </ul>        
              @endcan
              </div>
        </div>
        <div class="col-md-12">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Config_key</th>
                <th scope="col">Config_value</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($settings as $settingItem)
                
            
              <tr>
                <th scope="row">{{ $settingItem->id }}</th>
                <td>{{ $settingItem->config_key }}</td>
                <td>{{ $settingItem->config_value }}</td>       
                <td>
                  @can('setting-edit')
                  <a href="{{ route('settings.edit',['id'=>$settingItem->id]).'?type='.$settingItem->type }}" class="btn btn-default">Edit</a>                    
                  @endcan
                  @can('setting-delete')
                  <a href="" class="btn btn-danger action_delete" data-url="{{ route('settings.delete',['id'=>$settingItem->id]) }}">Delete</a>
                  @endcan
                </td>
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
          <div class="col-md-2">
            {{ $settings->links('pagination::bootstrap-4') }}
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