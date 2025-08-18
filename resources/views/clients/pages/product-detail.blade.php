@extends('layout.client')
@section('title', 'Chi tiết sản phẩm')

@section('content')
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Trang
          chủ</a></li>
        <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng</a>
        </li>
        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $product->name }}</li>
      </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">{{ $product->name }}</h1>
    </div>
    </div>
  </div>
  <div class="container">
    <!-- Gallery + details-->
    <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
    <div class="px-lg-3">
      <div class="row">
      <!-- Product gallery-->
      <div class="col-lg-7 pe-lg-0 pt-lg-4">
        <div class="product-gallery">
        <div class="product-gallery-preview order-sm-2">
          @foreach ($product->images as $key => $image)
        <div class="product-gallery-preview-item {{ $key === 0 ? 'active' : '' }}" id="image-{{ $key }}">
        <img class="image-zoom" src="{{ asset('storage/' . $image->image) }}"
        data-zoom="{{ asset('storage/' . $image->image) }}" alt="{{ $product->name }}">
        <div class="image-zoom-pane"></div>
        </div>
      @endforeach
        </div>
        <div class="product-gallery-thumblist order-sm-1">
          @foreach ($product->images as $key => $image)
        <a class="product-gallery-thumblist-item {{ $key === 0 ? 'active' : '' }}" href="#image-{{ $key }}">
        <img src="{{ asset('storage/' . $image->image) }}" alt="Product thumbnail">
        </a>
      @endforeach
        </div>
        </div>
      </div>
      <!-- Product details-->
      <div class="col-lg-5 pt-4 pt-lg-0">
        <div class="product-details ms-auto pb-3">
        <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
          </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Đánh giá</span>
          </a>
          
        </div>
        <div class="mb-3"><span
          class="h3 fw-normal text-accent me-1">{{ number_format($product->price, 0, ',', '.') }}</span>
          <span class="badge bg-danger badge-shadow align-middle mt-n2">Khuyến mại</span>
        </div>
        <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Danh mục:</span><span class="text-muted"
          id="colorOption">{{ $product->category->name }}</span></div>
        <div class="position-relative me-n4 mb-3">
          <div class="form-check form-option form-check-inline mb-2">
          </div>
          <div class="form-check form-option form-check-inline mb-2">
          </div>
          <div class="form-check form-option form-check-inline mb-2">
          </div>
          <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Sản phẩm có sẵn</div>
        </div>
        <form class="mb-grid-gutter" method="post" action="{{ route('cart.add') }}">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <div class="mb-3 d-flex align-items-center">
          <label for="quantity" class="form-label me-2 mb-0">Số lượng:</label>
          <input type="number" id="quantity" name="quantity" class="form-control me-3" style="width: 5rem;"
            min="1" max="{{ $product->stock ?? 100 }}" value="1">
          <button class="btn btn-primary btn-shadow d-block w-100" type="submit">
            <i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
          </button>
          </div>
        </form>
        <!-- Special Offers Section -->
        <div class="special-offers">
          <h3>Khuyến mãi</h3>
          <ul>
            <li>Ưu đãi 50% khi mua chuột kèm Laptop Gaming (Tối đa 150.000đ). <a href="#">(Xem thêm)</a></li>
            <li>Ưu đãi 50% khi mua chuột kèm Laptop văn phòng (Tối đa 150.000đ). <a href="#">(Xem thêm)</a></li>
          </ul>

          <h3>Showroom HCM</h3>
          <ul>
            <li>📍78-80-82 Hoàng Hoa Thám, Phường Bảy Hiền, TP.HCM</li>
            <li>📍905 Kha Vạn Cân, Phường Linh Tây, TP.HCM</li>
            <li>📍1081-1083 Trần Hưng Đạo, Phường An Đông, TP.HCM</li>
            <li>📍63 Nguyễn Cửu Vân, Phường Gia Định, TP.HCM <span style="color:#ff9800;">New✨</span></li>
          </ul>

          <h3>Showroom HN</h3>
          <ul>
            <li>📍162-164 Thái Hà, Phường Đống Đa, Hà Nội</li>
          </ul>
        </div>

        <style>
          .special-offers {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
          }
          .special-offers h3 {
            color: #333;
            font-size: 20px;
            margin-top: 15px;
          }
          .special-offers ul {
            list-style: none;
            padding: 0;
          }
          .special-offers ul li {
            color: #555;
            font-size: 16px;
            margin-bottom: 5px;
          }
          .special-offers ul li a {
            color: #007bff;
            text-decoration: none;
          }
          .special-offers ul li a:hover {
            text-decoration: underline;
          }
        </style>
        <!-- Sharing-->
        <label class="form-label d-inline-block align-middle my-2 me-3">Chia sẻ:</label><a
          class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a
          class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a
          class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
        </div>
      </div>
      </div>
    </div>
    </div>
    <!-- Product description section 1-->
    <!-- Product description section -->
    <div class="row align-items-center py-4">
    <div class="col-lg-10 offset-lg-1 py-4">
      <h2 class="h3 mb-4 pb-2">Giới thiệu sản phẩm</h2>
      <div class="fs-sm text-muted pb-2">
      {!! $product->description !!}
      </div>
    </div>
    </div>
  </div>
  <!-- Reviews-->
  <div class="border-top border-bottom my-lg-3 py-5">
    <div class="container pt-md-2" id="reviews">
    <div class="row pb-3">
      <div class="col-lg-4 col-md-5">
      <h2 class="h3 mb-4">74 Đánh giá</h2>
      <div class="star-rating me-2"><i class="ci-star-filled fs-sm text-accent me-1"></i><i
        class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star-filled fs-sm text-accent me-1"></i><i
        class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star fs-sm text-muted me-1"></i></div><span
        class="d-inline-block align-middle">4.1 Đánh giá tổng thể</span>
      <p class="pt-3 fs-sm text-muted">58 trong số 74 (77%)<br>Khách hàng đã giới thiệu sản phẩm này</p>
      </div>
      <div class="col-lg-8 col-md-7">
      <div class="d-flex align-items-center mb-2">
        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i
          class="ci-star-filled fs-xs ms-1"></i></div>
        <div class="w-100">
        <div class="progress" style="height: 4px;">
          <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60"
          aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div><span class="text-muted ms-3">43</span>
      </div>
      <div class="d-flex align-items-center mb-2">
        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i
          class="ci-star-filled fs-xs ms-1"></i></div>
        <div class="w-100">
        <div class="progress" style="height: 4px;">
          <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;"
          aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div><span class="text-muted ms-3">16</span>
      </div>
      <div class="d-flex align-items-center mb-2">
        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i
          class="ci-star-filled fs-xs ms-1"></i></div>
        <div class="w-100">
        <div class="progress" style="height: 4px;">
          <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;"
          aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div><span class="text-muted ms-3">9</span>
      </div>
      <div class="d-flex align-items-center mb-2">
        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i
          class="ci-star-filled fs-xs ms-1"></i></div>
        <div class="w-100">
        <div class="progress" style="height: 4px;">
          <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;"
          aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div><span class="text-muted ms-3">4</span>
      </div>
      <div class="d-flex align-items-center">
        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i
          class="ci-star-filled fs-xs ms-1"></i></div>
        <div class="w-100">
        <div class="progress" style="height: 4px;">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4"
          aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div><span class="text-muted ms-3">2</span>
      </div>
      </div>
    </div>
    <hr class="mt-4 mb-3">
    <div class="row pt-4">
      <!-- Reviews list-->
      <div class="col-md-7">
      <div class="d-flex justify-content-end pb-4">
        <div class="d-flex align-items-center flex-nowrap">
        <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sắp xếp theo:</label>
        <select class="form-select form-select-sm" id="sort-reviews">
          <option>Mới nhất</option>
          <option>Cũ nhất</option>
          <option>Phổ biến</option>
          <option>Đánh giá cao</option>
          <option>Đánh giá thấp</option>
        </select>
        </div>
      </div>
      <!-- Review-->
      <div class="product-review pb-4 mb-4 border-bottom">
        <div class="d-flex mb-3">
        <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle" src="img/shop/reviews/01.jpg"
          width="50" alt="Rafael Marquez">
          <div class="ps-3">
          <h6 class="fs-sm mb-0">Rafael Marquez</h6><span class="fs-ms text-muted">June 28, 2019</span>
          </div>
        </div>
        <div>
          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i
            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
          </div>
          <div class="fs-ms text-muted">83% of users found this review helpful</div>
        </div>
        </div>
        <p class="fs-md mb-2">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus
        id quod maxime placeat facere possimus, omnis voluptas assumenda est...</p>
        <ul class="list-unstyled fs-ms pt-1">
        <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span>Consequuntur magni, voluptatem sequi, tempora
        </li>
        <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span>Architecto beatae, quis autem</li>
        </ul>
        <div class="text-nowrap">
        <button class="btn-like" type="button">15</button>
        <button class="btn-dislike" type="button">3</button>
        </div>
      </div>

      <div class="text-center">
        <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Xem thêm đánh giá</button>
      </div>
      </div>
      <!-- Leave review form-->
      <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
      <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
        <h3 class="h4 pb-2">Viết đánh giá</h3>
        <form class="needs-validation" method="post" novalidate>
        <div class="mb-3">
          <label class="form-label" for="review-name">Tên của bạn<span class="text-danger">*</span></label>
          <input class="form-control" type="text" required id="review-name">
          <div class="invalid-feedback">Vui lòng nhập tên của bạn!</div><small class="form-text text-muted">Sẽ được
          hiển thị trên bình luận.</small>
        </div>
        <div class="mb-3">
          <label class="form-label" for="review-email">Email của bạn<span class="text-danger">*</span></label>
          <input class="form-control" type="email" required id="review-email">
          <div class="invalid-feedback">Vui lòng nhập địa chỉ email hợp lệ!</div><small
          class="form-text text-muted">Chỉ để xác thực - chúng tôi sẽ không gửi thư rác cho bạn.</small>
        </div>
        <div class="mb-3">
          <label class="form-label" for="review-rating">Đánh giá<span class="text-danger">*</span></label>
          <select class="form-select" required id="review-rating">
          <option value="">Chọn đánh giá</option>
          <option value="5">5 sao</option>
          <option value="4">4 sao</option>
          <option value="3">3 sao</option>
          <option value="2">2 sao</option>
          <option value="1">1 sao</option>
          </select>
          <div class="invalid-feedback">Vui lòng chọn đánh giá!</div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="review-text">Đánh giá<span class="text-danger">*</span></label>
          <textarea class="form-control" rows="6" required id="review-text"></textarea>
          <div class="invalid-feedback">Vui lòng viết đánh giá!</div><small class="form-text text-muted">Đánh giá
          của bạn phải có ít nhất 50 ký tự.</small>
        </div>
        <div class="mb-3">
          <label class="form-label" for="review-pros">Ưu điểm</label>
          <textarea class="form-control" rows="2" placeholder="Viết đánh giá" id="review-pros"></textarea>
        </div>
        <div class="mb-3 mb-4">
          <label class="form-label" for="review-cons">Nhược điểm</label>
          <textarea class="form-control" rows="2" placeholder="Viết đánh giá" id="review-cons"></textarea>
        </div>
        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Gửi đánh giá</button>
        </form>
      </div>
      </div>
    </div>
    </div>
  </div>


  <!-- Product carousel (You may also like)-->
  <div class="container py-5 my-md-3">
    <h2 class="h3 text-center pb-4">Sản phẩm tương tự</h2>
    <div class="tns-carousel tns-controls-static tns-controls-outside">
    <div class="tns-carousel-inner"
      data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
      <!-- Product-->
      @foreach ($relatedProducts as $product)
      <div>
      <div class="card product-card card-static">
      <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
      title="Thêm vào danh sách yêu thích">
      <i class="ci-heart"></i>
      </button>
      <a class="card-img-top d-block overflow-hidden" href="{{ route('products.detail', $product->id) }}">
      <img src="{{ asset('storage/' . ($product->images->first()->image ?? 'storage/default-product.png')) }}"
        alt="{{ $product->name }}">
      </a>
      <div class="card-body py-2">
      <a class="product-meta d-block fs-xs pb-1" href="#">{{ $product->category->name ?? '' }}</a>
      <h3 class="product-title fs-sm">
        <a href="{{ route('products.detail', $product->id) }}">{{ $product->name }}</a>
      </h3>
      <div class="d-flex justify-content-between">
        <div class="product-price">
        <span class="text-accent">{{ number_format($product->price, 0, ',', '.') }}</span>
        </div>
      </div>
      </div>
      </div>
      </div>

    @endforeach

    </div>
    </div>
  </div>

@endsection