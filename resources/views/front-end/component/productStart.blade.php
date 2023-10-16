<div class="container-fluid pt-5" id="new_products">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">SẢN PHẨM MỚI</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($products as $product )
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ $product->feature_image_path }}" style="height:350px; object-fit:cover" alt="">
                    @if ($product->discount != 0)
                    <div class="discount">
                        <div class="discount-item">
                            <span aria-label="promotion"></span>
                            <span class="percent">{{ 100 - round(($product->price/$product->discount)*100)}} %</span>
                            <span class="text_dc">GIẢM</span>
                        </div>
                    </div>
                    @elseif (
                        ''
                    )
                    @endif
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ strtoupper($product->name) }}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ number_format($product->price) }} đ</h6><h6 class="text-muted ml-2"><del>{{ $product->discount===0 ? '' : number_format($product->discount).'đ' }}</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product_detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>XEM CHI TIẾT</a>
                    <a href="{{ route('product_detail',['id'=>$product->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>THÊM VÀO GIỎ</a>
                </div>
            </div>
        </div>
        @endforeach
      
    </div>
</div>