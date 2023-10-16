<div class="col-lg-3 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>
    <nav class="position-absolute collapse {{ $currentPage == 'home' ? 'show' : '' }} navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical" style="width: calc(100% - 30px);background-color: #FFFFFF !important;;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
          @foreach ($categories as $category )
          <div class="nav-item dropdown">
            @if ($category->categoryChildrent->count())
              <a href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id]) }}" class="nav-link" data-toggle="dropdown">{{ $category->name }}
                @if ($category->categoryChildrent->count())
                {{-- Nếu có category con thì mới có thêm icon dropdown  --}}
                <i class="fa fa-angle-down float-right mt-1"></i>
                @endif
            </a>
            @else
            <a href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id]) }}" class="nav-link">{{ $category->name }}            
          </a>
            @endif
              <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
              {{-- chõ đến phương thức categoryChhildrent trong Model Category --}}
                @foreach ($category->categoryChildrent as $categoryChildrent )                   
                {{-- <a href="{{ route('category.product',['slug'=>$category->slug,'id'=>$category->id]) }}" class="dropdown-item"> --}}
                  <a href="{{ route('category.product',['slug'=>$categoryChildrent->slug,'id'=>$categoryChildrent->id]) }}" class="dropdown-item">
                  {{ $categoryChildrent->name }}</a>
                @endforeach  
              </div>
          </div>
              
          @endforeach
           
        </div>
    </nav>
</div>