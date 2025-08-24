@extends('layout.client')
@section('title', 'Giỏ hàng')

@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang
                                chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Cửa hàng</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Giỏ hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Giỏ hàng của bạn</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- List of items-->
            <section class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Sản phẩm</h2><a class="btn btn-outline-primary btn-sm ps-2"
                        href="{{ route('products.index') }}"><i class="ci-arrow-left me-2"></i>Tiếp tục mua sắm</a>
                </div>
                <!-- Item-->
                @php
                    $cartTotal = 0;
                @endphp
                @forelse($cartItems as $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $cartTotal += $subtotal;
                    @endphp
                    <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                        <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                                class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
                                href="script:void(0)">
                                <img src="{{ asset('storage/' . $item['image'] ?? 'uploads/products/default-product.png') }}"
                                    width="160" alt="Sản phẩm"></a>
                            <div class="pt-2">
                                <h3 class="product-title fs-base mb-2"><a
                                        href="script:void(0)">{{ $item['name'] }}</a></h3>
                                <div class="fs-lg text-accent pt-2">
                                    {{ number_format($item['price'], 0, ',', '.') }}<small>₫</small></div>
                            </div>
                        </div>
                        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                            <label class="form-label" for="quantity1">Số lượng</label>
                            <input type="number" id="quantity" name="quantity" class="form-control me-3" style="width: 5rem;"
                                 min="1" max="{{ $item['stock'] }}" value="{{ $item['quantity'] }}" readonly>
                            <button class="remove-from-cart btn btn-link px-0 text-danger" data-id="{{ $item['product_id'] }}"
                                type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm">Xóa</span></button>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <h3 class="mb-4">Giỏ hàng của bạn trống</h3>
                        <p class="fs-sm text-muted">Hãy thêm sản phẩm vào giỏ hàng để bắt đầu mua sắm.</p>
                    </div>
                @endforelse

                <!-- <button class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i
                        class="ci-loading fs-base me-2"></i>Cập nhật giỏ hàng</button> -->
            </section>
            <!-- Sidebar-->
            @if (!empty($cartItems))
                <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Tổng cộng</h2>
<h3 class="fw-normal" id="cart_total">{{ number_format($cartTotal, 0, ',', '.') }}<small>₫</small></h3>                        </div>
                        <div class="mb-3 mb-4">
                            <label class="form-label mb-3" for="order-comments"><span
                                    class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Thêm ghi
                                    chú</span></label>
                            <textarea class="form-control" rows="6" id="order-comments"></textarea>
                        </div>
                        <div class="accordion" id="order-options">
                            <div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button" href="#promo-code" role="button"
                                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="promo-code">Áp dụng mã
                                        khuyến mãi</a></h3>
                                <div class="accordion-collapse collapse show" id="promo-code"
                                    data-bs-parent="#order-options">
                                    <form class="accordion-body needs-validation" method="post" novalidate>
                                        <div class="mb-3">
                                            <input class="form-control" type="text" placeholder="Mã khuyến mãi" required>
                                            <div class="invalid-feedback">Mã giảm giá.</div>
                                        </div>
                                        <button class="btn btn-outline-primary d-block w-100" type="submit">Áp dụng mã
                                            khuyến mãi</button>
                                    </form>
                                </div>
                            </div>

                        </div><a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('checkout') }}"><i
                                class="ci-card fs-lg me-2"></i>Tiến hành thanh toán</a>
                    </div>
                </div>
            </aside>
            @endif
        </div>
    </div>
@endsection