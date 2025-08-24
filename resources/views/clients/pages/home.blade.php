@extends('layout.client_home')
@section('title', 'Trang Chủ')

@section('content')

  <main class="page-wrapper">


    <!-- Hero (Banners + Slider)-->
    <section class="bg-secondary py-4 pt-md-5">
    <div class="container py-xl-2">
      <div class="row">
      <!-- Slider     -->
      <div class="col-xl-9 pt-xl-4 order-xl-2">
        <div class="tns-carousel">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;loop&quot;: false}">
          <div>
          <div class="row align-items-center">
            <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
              src="{{ asset('assets/clients/img/home/hero-slider/home3-sale1-qwmlxbwfz37zvabadpxftziq4wbso35msl6lfwiwm8.png') }}"
              alt="VR Collection"></div>
            <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
            <h2 class="fw-light pb-1 from-bottom">Trải nghiệm tuyệt vời</h2>
            <h1 class="display-4 from-bottom delay-1">Mua sắm thông minh</h1>
            <h5 class="fw-light pb-3 from-bottom delay-2">Công Nghệ Vượt Trội - Hiệu Năng Đỉnh Cao</h5>
            <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow"
              href="{{ route('products.index') }}">Mua ngay<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
          </div>
          <div>
          <div class="row align-items-center">
            <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
              src="{{ asset('assets/clients/img/home/hero-slider/home3-sale2-qwmlxbwfpvns6a15rfnk56acxqz6zl826rdnjkv2cw.png') }}"
              alt="VR Collection"></div>
            <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
            <h2 class="fw-light pb-1 from-start">Khám Phá Bộ Sưu Tập</h2>
            <h1 class="display-4 from-start delay-1">VR Collection</h1>
            <h5 class="fw-light pb-3 from-start delay-2">trên thị trường</h5>
            <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow"
              href="{{ route('products.index') }}">Mua ngay<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
          </div>
          <div>
          <div class="row align-items-center">
            <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
              src="https://file.hstatic.net/200000722513/file/gearvn-acer-back-to-school-2025-slider.jpg"
              alt="VR Collection"></div>
            <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
            <h2 class="fw-light pb-1 scale-up">Ngập tràn ưu đãi</h2>
            <h1 class="display-4 scale-up delay-1">Quà tặng khủng</h1>
            <h5 class="fw-light pb-3 scale-up delay-2">&amp; hàng ngàn ưu đãi khác</h5>
            <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow"
              href="{{ route('products.index') }}">Mua ngay<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      <!-- Banner group-->
      <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0">
        <div class="table-responsive" data-simplebar>
        <div class="d-flex d-xl-block"><a
          class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0" href="#"
          style="min-width: 16rem;"><img
            src="https://file.hstatic.net/200000722513/file/gearvn-build-pc-slider-right-t8.png" width="500"
            alt="Banner">
          <div class="py-4 px-2"> </div>
          </a></div>
        <div class="d-flex d-xl-block"><a
          class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0" href="#"
          style="min-width: 16rem;"><img
            src="https://file.hstatic.net/200000722513/file/gearvn-ban-phim-slider-right-t8.png" width="600"
            alt="Banner">
          <div class="py-4 px-2"> </div>
          </a></div>
        <div class="d-flex d-xl-block"><a
          class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0" href="#"
          style="min-width: 16rem;"><img
            src="https://file.hstatic.net/200000722513/file/gearvn-laptop-gaming-slider-bot-t8.png" width="700"
            alt="Banner">
          <div class="py-4 px-2"> </div>
          </a></div>
        </div>
      </div>
      </div>
    </div>
    </section>

    <!-- Category Product -->
    <section class="container pt-5">
    <!-- Heading-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
      <h2 class="h3 mb-0 pt-3 me-2">Danh mục sản phẩm</h2>
      <!-- <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm sản phẩm<i class="ci-arrow-right ms-1 me-n1"></i></a></div>
      </div> -->
      <!-- Grid-->
      <div class="row pt-2 mx-n2">
      <!-- Category-->
      @foreach($categories as $category)
      <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
      <div class="card product-card d-flex align-items-center flex-row p-2" style="height: 80px;">
      <a class="d-block overflow-hidden me-3" href="#" style="width: 60px; height: 60px;">
        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
        style="width: 100%; height: 100%; object-fit: cover;">
      </a>
      <div class="card-body py-0 px-0 text-start flex-grow-1 d-flex align-items-center" style="height: 60px;">
        <h3 class="product-title fs-sm mb-0">
        <a href="#" style="white-space: nowrap;">{{ $category->name }}</a>
        </h3>
      </div>
      </div>
      <hr class="d-sm-none">
      </div>
    @endforeach

      </div>
    </section>
    <!-- Products grid (Trending products)-->
    <section class="container pt-5">
    <!-- Heading-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
      <h2 class="h3 mb-0 pt-3 me-2">Sản phẩm bán chạy</h2>
      <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="{{ route('products.index') }}">Xem thêm sản
        phẩm<i class="ci-arrow-right ms-1 me-n1"></i></a></div>
    </div>
    <!-- Grid-->
    <div class="row pt-2 mx-n2">
      <!-- Product-->
      @php
    $displayed = 0;
    @endphp
      @foreach ($categories as $category)
      @foreach ($category->products as $product)
      @if ($displayed < 16)
      <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
      <div class="card product-card">
      <div class="product-card-actions d-flex align-items-center">
      </div>
      <a class="card-img-top d-block overflow-hidden" href="{{ route('products.detail', $product->slug) }}">
      <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
      </a>
      <div class="card-body py-2">
      <a class="product-meta d-block fs-xs pb-1" href="#">{{ $category->name }}</a>
      <h3 class="product-title fs-sm"><a href="shop-single-v2.html">{{ $product->name }}</a></h3>
      <div class="d-flex justify-content-between">
      <div class="product-price">
      <span class="text-accent">{{ number_format($product->price, 0, ',', '.') }}<small>₫</small></span>
      </div>

      </div>
      </div>
      <div class="card-body card-body-hidden">
      <button class="btn btn-primary btn-shadow d-block w-100 add-to-cart" type="button"
      data-id="{{ $product->id }}">
      <i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
      </button>

      </div>
      </div>
      <hr class="d-sm-none">
      </div>
      @php $displayed++; @endphp
    @else
      @break
    @endif
    @endforeach
      @if ($displayed >= 16)
      @break
    @endif
    @endforeach
    </div>
    </section>

    <!-- Promo banner-->
    <section class="container mt-4 mb-grid-gutter">
    <div class="bg-faded-info rounded-3 py-4">
      <div class="row align-items-center">
      <div class="col-md-5">

      </div>
      <div class="col-md-12"><img
        src="https://file.hstatic.net/200000722513/file/man_hinh_thang_04_banner_1580x510.jpg" alt="iPad Pro Offer">
      </div>
      </div>
    </div>
    </section>
    <!-- Brands carousel-->
    <section class="container mb-5">
    <div class="tns-carousel border-end">
      <div class="tns-carousel-inner"
      data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/13.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/14.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/17.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/16.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/15.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/18.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/19.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img
          class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/20.png') }}" style="width: 165px;"
          alt="Brand"></a></div>
      </div>
    </div>
    </section>


    <!-- Blog + Instagram info cards-->
    <section class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
        href="{{ route('about') }}">
        <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
        <h3 class="h5 mb-1">Về chúng tôi</h3>
        <p class="text-muted fs-sm">Đồng Hành Cùng Bạn Trên Mọi Nẻo Đường Công Nghệ.</p>
        </div>
      </a></div>
      <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
        <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
        <h3 class="h5 mb-1">Theo dõi chúng tôi trên Instagram</h3>
        <p class="text-muted fs-sm">#ShopWithCartzilla</p>
        </div>
      </a></div>
    </div>
    </section>
  </main>

  <!-- Toolbar for handheld devices (Default)-->
  <div class="handheld-toolbar">
    <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item"
      href="account-wishlist.html"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span
      class="handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell handheld-toolbar-item"
      href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
      onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span
      class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item"
      href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span
        class="badge bg-primary rounded-pill ms-1">4</span></span><span
      class="handheld-toolbar-label">$265.00</span></a></div>
  </div>
@endsection