@extends('layout.client')
@section('title', 'Tìm kiếm sản phẩm')

@section('content')
    <div class="bg-dark pt-4 pb-5">
        <div class="container pt-2 pb-3 pt-lg-3 pb-lg-4">
          <div class="d-lg-flex justify-content-between pb-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                  <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item text-nowrap"><a href="{{ route('products.index') }}">Cửa hàng</a>
                  </li>
                  <li class="breadcrumb-item text-nowrap active" aria-current="page">Tìm kiếm</li>
                </ol>
              </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
              <h1 class="h3 text-light mb-0">Tìm kiếm </h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
       
        <!-- Products grid-->
        <div class="row pt-3 mx-n2">
          @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
              <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden" href="{{ route('products.detail', $product->slug) }}">
                  <img src="{{ $product->image_url ?? asset('storage/uploads/products/default-product.png') }}" alt="{{ $product->name }}">
                </a>
                <div class="card-body py-2">
                  <a class="product-meta d-block fs-xs pb-1" href="#">{{ $product->category->name ?? '' }}</a>
                  <h3 class="product-title fs-sm"><a href="{{ route('products.detail', $product->slug) }}">{{ $product->name }}</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">{{ number_format($product->price, 0, ',', '.') }}<small>đ</small></span></div>
                    
                  </div>
                </div>
                <div class="card-body card-body-hidden">
                  <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ</button>
                </div>
              </div>
              <hr class="d-sm-none">
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <h5>Không tìm thấy sản phẩm phù hợp với từ khóa.</h5>
            </div>
          @endforelse
          
        <!-- Banners-->
       
        <!-- Products grid-->
        <div class="row mx-n2">
          
          
        <hr class="my-3">
        
      </div>
@endsection