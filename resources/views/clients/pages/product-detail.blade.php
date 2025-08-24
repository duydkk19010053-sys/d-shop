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
          <button class="btn btn-primary btn-shadow d-block w-100 add-to-cart" type="button"
            data-id="{{ $product->id }}">
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
 


  <!-- Product carousel (You may also like)-->
  <div class="container py-5 my-md-3">
    <h2 class="h3 text-center pb-4">Có thể bạn sẽ thích</h2>
    <div class="tns-carousel tns-controls-static tns-controls-outside">
    <div class="tns-carousel-inner"
      data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
      <!-- Product-->
      @foreach ($relatedProducts as $product)
      <div>
      <div class="card product-card card-static">
      <!-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
      title="Thêm vào danh sách yêu thích">
      <i class="ci-heart"></i>
      </button> -->
      <a class="card-img-top d-block overflow-hidden" href="{{ route('products.detail' , $product->slug) }}">
      <img src="{{ asset('storage/' . ($product->images->first()->image ?? 'uploads/products/default-product.png')) }}"
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