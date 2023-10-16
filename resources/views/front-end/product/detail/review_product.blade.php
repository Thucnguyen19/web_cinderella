<div class="col-md-6">
    <form action="{{ route('review_product',['id'=>$product->id]) }}" method="post">
        @csrf
    <h4 class="mb-4">Để Lại 1 Đánh Giá Khách Quan</h4>
    <small>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *
    </small>
    <div class="d-flex my-3">
        <p class="mb-0 mr-2">Đánh Giá * :</p>
        <select class="form-group" name="rating" id="">
            <option value="" disabled selected>Đánh giá sao</option>
            @for ($i=1; $i<=5 ; $i++)
               <option value="{{ $i }}">{{ $i }} Sao</i>
              </option> 
            @endfor
          
           
        </select>
    </div>
        <div class="form-group">
            <label for="message">Đánh Giá Của Bạn *</label>
            <textarea id="message" cols="30" rows="5" class="form-control" name="review"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Họ Tên *</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group mb-0">
            <input type="submit" value="Gửi Đánh Giá" class="btn btn-primary px-3">
        </div>
    </form>
</div>
