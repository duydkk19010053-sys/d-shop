@extends('layout.client')
@section('title', 'Sản phẩm')

@section('content')
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang chủ</a></li>
        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
        </li>
        <li class="breadcrumb-item text-nowrap active" aria-current="page">Sản phẩm</li>
      </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Danh sách sản phẩm</h1>
    </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
    <!-- Sidebar-->
    <aside class="col-lg-4">
      <!-- Sidebar-->
      <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
      style="max-width: 22rem;">
      <div class="offcanvas-header align-items-center shadow-sm">
        <h2 class="h5 mb-0">Filters</h2>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
        <!-- Categories-->
        <div class="widget widget-categories mb-4 pb-4 border-bottom">
        <h3 class="widget-title">Danh mục sản phẩm</h3>
        <div class="accordion mt-n1" id="shop-categories">
          <!-- Shoes-->
          @foreach ($categoryes as $category)
        <div class="accordion-item">
        <h3 class="accordion-header"><a class="accordion-button collapsed" href="javascript:void(0)"
        class="category-filter" data-id="{{ $category->id }}">{{ $category->name }}</a></h3>

        </div>
      @endforeach

        </div>
        </div>
        <!-- Price range-->
        <!-- <div class="widget mb-4 pb-4 border-bottom">
            <h3 class="widget-title">Price</h3>
            <div class="range-slider" data-start-min="250" data-start-max="680" data-min="0" data-max="1000" data-step="1">
            <div class="range-slider-ui"></div>
            <div class="d-flex pb-1">
              <div class="w-50 pe-2 me-2">
              <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                <input class="form-control range-slider-value-min" type="text">
              </div>
              </div>
              <div class="w-50 ps-2">
              <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                <input class="form-control range-slider-value-max" type="text">
              </div>
              </div>
            </div>
            </div>
          </div> -->


      </div>
      </div>
    </aside>
    <!-- Content  -->
    <section class="col-lg-8">
      <!-- Toolbar-->
      <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
      <div class="d-flex flex-wrap">
        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
        <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sắp xếp
          theo:</label>
        <select class="form-select" id="sorting" onchange="location = this.value;">
          <option value="?sort=popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Phổ biến</option>
          <option value="?sort=price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá thấp - cao
          </option>
          <option value="?sort=price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá cao - thấp
          </option>
        </select>
        </div>
      </div>
      <div class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"></div>
      </div>
      <!-- Products grid-->
      <div class="row mx-n2">
      <!-- Product-->
      @foreach ($products as $product)
      <div class="col-md-4 col-sm-6 px-2 mb-4">
      <div class="card product-card">
      <a class="card-img-top d-block overflow-hidden" href="{{ route('products.detail', $product->slug) }}"><img
        src="{{ $product->image_url }}" alt="{{ $product->name }}"></a>
      <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
        href="#">{{ $product->category->name }}</a>
        <h3 class="product-title fs-sm"><a
        href="{{ route('products.detail', $product->slug) }}">{{ $product->name }}</a></h3>
        <div class="d-flex justify-content-between">
        <span class="text-accent">{{ number_format($product->price, 0, ',', '.') }}<small>₫</small></span>
        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
        class="star-rating-icon ci-star-filled active"></i><i
        class="star-rating-icon ci-star-filled active"></i><i
        class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
        </div>
        </div>
      </div>
      <div class="card-body card-body-hidden">
        <div class="text-center pb-2">

        </div>
        <button class="btn btn-primary btn-shadow d-block w-100 add-to-cart" type="button"
        data-id="{{ $product->id }}">
        <i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
        </button>
        <!-- <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a></div> -->
      </div>
      </div>
      <hr class="d-sm-none">
      </div>
    @endforeach

      </div>
     
      <!-- Products grid-->
      <div class="row mx-n2">

      </div>
      <hr class="my-3">
      <!-- Pagination-->
      <nav class="d-flex justify-content-center pt-4" aria-label="Page navigation">
      {{ $products->links('pagination::bootstrap-4') }}
      </nav>
    </section>
    </div>
  </div>
  @include('clients.components.modals.quick_view_modal')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Xử lý sự kiện thay đổi sắp xếp
    document.getElementById('sorting').addEventListener('change', function () {
      fetchProducts(this.value);
    });

    // Xử lý sự kiện click vào phân trang
    document.addEventListener('click', function (e) {
      if (e.target.tagName === 'A' && e.target.closest('.pagination')) {
      e.preventDefault();
      fetchProducts(e.target.getAttribute('href'));
      }
    });

    // Hàm lấy dữ liệu sản phẩm qua AJAX
    function fetchProducts(url) {
      fetch(url, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
      })
      .then(response => response.text())
      .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newContent = doc.querySelector('.row.mx-n2');
        const newPagination = doc.querySelector('nav[aria-label="Page navigation"]');

        // Cập nhật danh sách sản phẩm
        document.querySelector('.row.mx-n2').innerHTML = newContent.innerHTML;

        // Cập nhật phân trang
        document.querySelector('nav[aria-label="Page navigation"]').innerHTML = newPagination.innerHTML;
      })
      .catch(error => console.error('Error fetching products:', error));
    }
    });
  </script>
@endsection