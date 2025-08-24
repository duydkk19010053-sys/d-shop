@extends('layout.client')
@section('title', 'Thanh toán')

@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang
                                chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Cửa hàng</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Chi tiết thanh toán</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <h2 class="h2 pt-1 pb-3 mb-3 border-bottom" style="margin-top:85px;">Địa chỉ giao hàng</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-fn">Họ và tên</label>
                            <input class="form-control" type="text" id="checkout-fn" name="ltn__name"
                                placeholder="Họ và tên" value="{{ $defaultAddress->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-phone">Số điện thoại</label>
                            <input class="form-control" type="text" id="checkout-phone" name="ltn__phone"
                                placeholder="Số điện thoại" value="{{ $defaultAddress->phone }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-address">Địa chỉ</label>
                            <input class="form-control" type="text" id="checkout-address" name="ltn__address"
                                placeholder="Số nhà, đường, phường/xã" value="{{ $defaultAddress->address }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-city">Thành phố</label>
                            <input class="form-control" type="text" id="checkout-city" name="ltn__city"
                                placeholder="Thành phố" value="{{ $defaultAddress->city }}" readonly>
                        </div>
                    </div>
                </div>
                <style>
                    .address-select-box {
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 18px 20px;
                        background: #fff;
                        margin-bottom: 12px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                    }

                    .address-select-box label {
                        font-weight: 600;
                        margin-bottom: 8px;
                        display: block;
                    }

                    .address-select {
                        width: 100%;
                        padding: 10px 14px;
                        border-radius: 6px;
                        border: 1px solid #ccc;
                        font-size: 1em;
                        background: #f8f9fa;
                        transition: border-color 0.2s;
                    }

                    .address-select:focus {
                        border-color: #007bff;
                        background: #fff;
                    }

                    .address-add-btn {
                        display: inline-block;
                        margin-top: 8px;
                        padding: 10px 22px;
                        border-radius: 6px;
                        font-weight: 600;
                        font-size: 1em;
                        background: #007bff;
                        color: #fff;
                        border: none;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
                        transition: background 0.2s;
                    }

                    .address-add-btn:hover {
                        background: #0056b3;
                        color: #fff;
                    }

                    .address-icon {
                        margin-right: 8px;
                        vertical-align: middle;
                    }
                </style>
                <div class="address-select-box">
                    <label for=""><span class="address-icon">🏠</span>Chọn địa chỉ giao hàng khác:</label>
                                        <select name="address_id" id="list_address" class="address-select">
                                            @foreach($addresses as $address)
                                                <option value="{{ $address->id }}" data-name="{{ $address->full_name }}" data-phone="{{ $address->phone }}" data-address="{{ $address->address }}" data-city="{{ $address->city }}" {{ $address->default ? 'selected' : ''}} >
                                                    {{ $address->full_name }} - {{ $address->address }}
                                                </option>
                                            @endforeach
                                        </select>
                    <a href="{{ route('account') }}" class="address-add-btn"><span class="address-icon">➕</span>Thêm địa chỉ
                        mới</a>
                </div>
                <h2 class="h6 pt-3 pb-3 mb-2 mt-5 border-top">Phương thức thanh toán</h2>
                <style>
                    .payment-method-box {
                        display: flex;
                        align-items: center;
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 18px 20px;
                        margin-bottom: 16px;
                        background: #fff;
                        transition: border-color 0.2s;
                    }

                    .payment-method-box.selected,
                    .payment-method-box:hover {
                        border-color: #007bff;
                        background: #f8f9fa;
                    }

                    .payment-radio {
                        margin-right: 18px;
                        margin-left: 4px;
                        width: 22px;
                        height: 22px;
                        accent-color: #007bff;
                    }

                    .payment-label {
                        font-weight: 600;
                        font-size: 1.1em;
                        display: flex;
                        align-items: center;
                    }

                    .payment-icon {
                        margin-left: 10px;
                        margin-right: 10px;
                        font-size: 1.3em;
                    }

                    .payment-logos {
                        margin-left: 12px;
                    }

                    .payment-desc {
                        font-size: 0.98em;
                        color: #555;
                        margin-top: 4px;
                    }
                </style>
                <form action="{{ route('checkout.place-order') }}" method="POST">
                    @csrf

                    <input type="hidden" name="address_id" value="{{ $defaultAddress->id }}">
                    <div id="payment-methods">
                        <label class="payment-method-box" id="box-cod">
                            <input type="radio" class="payment-radio" name="payment_method" value="cash" checked>
                            <span class="payment-label">
                                Thanh toán khi nhận hàng
                                <span class="payment-icon">
                                </span>
                            </span>
                        </label>
                        <label class="payment-method-box" id="box-paypal">
                            <input type="radio" id="payment_paypal" class="payment-radio" name="payment_method" value="paypal">
                            <span class="payment-label">
                                PayPal
                                <span class="payment-logos">
                                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg"
                                        alt="PayPal" style="height:28px;vertical-align:middle;">

                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="d-none d-lg-flex pt-4" id="checkout-action-group">
                        <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-shipping.html"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Trở lại giỏ hàng</span><span class="d-inline d-sm-none">Back</span></a></div>
                        <div class="w-50 ps-2" id="order-btn-wrapper">
                            <button type="submit" id="order_button_cash" class="btn btn-primary d-block w-100">Thanh toán </button>
                                    <div id="paypal-button-container"></div>
                            
                        </div>
                    </div>
                </form>
                
               
                
            </section>
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                    <div class="py-2 px-xl-2">
                        <div class="widget mb-3">
                            <h2 class="widget-title text-center">Tóm tắt đơn hàng</h2>
                            @foreach ($cartItems as $item)
                                <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"></a>
                                <div class="ps-2">
                                    <h2 class="widget-product-title"><a href="shop-single-v1.html">{{ $item->product->name }}</a></h2>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">{{ number_format($item->product->price , 0, ',', '.') }}₫</span><span class="text-muted">x
                                            {{ $item->quantity }}</span></div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <h3 style="text-align: center;" class="totalPrice_Checkout">{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}</small></h3>

                    </div>
                </div>
            </aside>
        </div>
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-shipping.html"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Trở lại giỏ
                                hàng</span><span class="d-inline d-sm-none">Trở lại giỏ hàng</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-review.html"><span
                                class="d-none d-sm-inline">Thanh toán</span><span class="d-inline d-sm-none">Thanh
                                toán</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function togglePaypalButton() {
                var paypalRadio = document.getElementById('payment_paypal');
                var paypalContainer = document.getElementById('paypal-button-container');
                var orderButton = document.getElementById('order_button_cash');
                if (paypalRadio.checked) {
                    paypalContainer.style.display = 'block';
                    orderButton.style.display = 'none';
                    orderButton.classList.add('d-none');
                } else {
                    paypalContainer.style.display = 'none';
                    orderButton.style.display = 'block';
                    orderButton.classList.remove('d-none');
                }
            }
            document.querySelectorAll('.payment-radio').forEach(function (radio) {
                radio.addEventListener('change', togglePaypalButton);
            });
            togglePaypalButton();
        });
    </script>
@endsection