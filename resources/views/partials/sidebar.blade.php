<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin </span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <!-- Thêm liên kết đến trang thông tin tài khoản -->
              <a href="/profile" class="d-block">
                <?php
                $name=Session::get('name');
                if($name){
                    echo $name;
                  
                }
            ?>
              </a>
              <!-- Hiển thị chấm xanh khi người dùng đang trực tuyến -->
              @if(Auth::check()) 
              <i class="fa fa-circle text-success"></i> 
              <span class=" text-white">
                Trực tuyến
              </span>
              @endif 
              <!-- Thêm nút đăng xuất -->
              <a href="{{ route('logout-dashborad') }}" class="btn btn-primary btn-sm">Đăng xuất</a>
          </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item">
                <a href="{{ route('category_post.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
               Danh Mục Bài Viết  
                    
                  </p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('post.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
              Bài Viết  
                  
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
             Danh Mục Sản Phẩm 
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
          Sản phẩm 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link ">
                           <i class="nav-icon fas fa-th"></i>
              <p>Đơn Hàng</p> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage-order') }}" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                  <p>
              Quản lý đặt hàng
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('menus.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
          Menus
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
          Slider 
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            @can('user-list')
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Danh sách nhân viên 
              </p>
            </a>
            @endcan
          </li>
          <li class="nav-item">
            @can('role-list')
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Danh sách vai trò (Roles)
              </p>
            </a>             
            @endcan
          </li>
          <li class="nav-item">
            @can('permissions-add')
            <a href="{{ route('permissions.create') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                 Tạo phân quyền (Permissions)
              </p>
            </a>
            @endcan
          </li>
        </ul>
      </nav>
  </div>
  
  
      <!-- Sidebar Menu -->
      <!-- /.sidebar-menu -->
    
    <!-- /.sidebar -->
  </aside>