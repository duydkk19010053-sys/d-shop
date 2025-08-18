@extends('layout.client')
@section('title', 'Tài khoản')

@section('content')
      @include('clients.components.modals.wishlist-modal')

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang
                                chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Tài khoản của tôi</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
                <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
                    <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
                        <div class="d-md-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                                style="width: 6.375rem;"><span class="badge bg-warning position-absolute end-0 mt-n2"
                                    data-bs-toggle="tooltip" title="Reward points">384</span><img class="rounded-circle"
                                    src="{{ $user->getAvatarUrlAttribute() }}" alt="{{ $user->name }}"></div>
                            <div class="ps-md-3">
                                <h3 class="fs-base mb-0">{{ $user->name }}</h3><span
                                    class="text-accent fs-sm">{{ $user->email }}</span>
                            </div>
                        </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu"
                            data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
                    </div>
                    <div class="d-lg-block collapse" id="account-menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <!-- <li class="bg-secondary px-4 py-3">
                            <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                        </li> -->
                            <li class="nav-item border-bottom mb-0"><a
                                    class="nav-link nav-link-style d-flex align-items-center px-4 py-3 active"
                                    href="#profile" data-bs-toggle="tab" role="tab"><i
                                        class="ci-user opacity-60 me-2"></i>Hồ sơ của bạn</a></li>
                            <li class="nav-item border-bottom mb-0"><a
                                    class="nav-link nav-link-style d-flex align-items-center px-4 py-3" href="#password"
                                    data-bs-toggle="tab" role="tab"><i class="ci-user opacity-60 me-2"></i>Đổi mật khẩu</a>
                            </li>
                            <li class="nav-item border-bottom mb-0"><a
                                    class="nav-link nav-link-style d-flex align-items-center px-4 py-3" href="#address"
                                    data-bs-toggle="tab" role="tab"><i class="ci-location opacity-60 me-2"></i>Địa chỉ</a>
                            </li>
                            <li class="nav-item mb-0"><a class="nav-link nav-link-style d-flex align-items-center px-4 py-3"
                                    href="#payment" data-bs-toggle="tab" role="tab"><i
                                        class="ci-card opacity-60 me-2"></i>Phương thức thanh toán</a></li>
                            <li class="nav-item border-bottom mb-0"><a
                                    class="nav-link nav-link-style d-flex align-items-center px-4 py-3" href="#orders"
                                    data-bs-toggle="tab" role="tab"><i class="ci-bag opacity-60 me-2"></i>Đơn hàng<span
                                        class="fs-sm text-muted ms-auto">1</span></a></li>
                            <li class="nav-item border-bottom mb-0"><a
                                    class="nav-link nav-link-style d-flex align-items-center px-4 py-3" href="#wishlist"
                                    data-bs-toggle="tab" role="tab"><i class="ci-heart opacity-60 me-2"></i>Danh sách yêu
                                    thích<span class="fs-sm text-muted ms-auto">3</span></a></li>
                            <li class=" border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                    href="{{ route('logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Đăng xuất</a>
                            </li>

                            <!-- <li class="bg-secondary px-4 py-3 mt-2">
                            <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
                        </li> -->

                        </ul>
                    </div>
                </div>
            </aside>
            <section class="col-lg-8">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <section>
                            <div
                                class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                                <!-- <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign out</a> -->
                            </div>
                            <form action="{{ route('account.update') }}" method="POST" id="update-account"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="bg-secondary rounded-3 p-4 mb-4">
                                    <div class="d-flex align-items-center">
                                        <img class="profile-pic" id="preview-image"
                                            src="{{ $user->getAvatarUrlAttribute() }}" width="90" alt="{{ $user->name }}"
                                            style="cursor: pointer;">
                                        <div class="ps-3">
                                            <input class="btn btn-light btn-shadow btn-sm mb-2 d-none" name="avatar"
                                                id="avatar" accept="image/*" type="file"><i class="ci-loading me-2"></i>Thay
                                            đổi ảnh đại diện</input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-4 gy-3">

                                    <div class="col-sm-6">
                                        <label class="form-label" for="ltn__name">Họ và tên</label>
                                        <input class="form-control" type="text" name="ltn__name" id="ltn__name"
                                            value="{{ $user->name }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="ltn__email">Email</label>
                                        <input class="form-control" type="email" name="ltn__email" id="ltn__email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="ltn__phone_number">Số điện thoại</label>
                                        <input class="form-control" type="number" name="ltn__phone_number"
                                            id="ltn__phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="ltn__address">Địa chỉ</label>
                                        <input class="form-control" type="text" name="ltn__address" id="ltn__address"
                                            value="{{ $user->address }}">
                                    </div>

                                    <div class="col-12">
                                        <hr class="mt-2 mb-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="form-check">
                                                <!-- <input class="form-check-input" type="checkbox" id="subscribe_me" checked> -->
                                                <!-- <label class="form-check-label" for="subscribe_me">Subscribe me to Newsletter</label> -->
                                            </div>
                                            <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Cập nhật tài
                                                khoản</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>

                    <div class="tab-pane fade show active" id="password" role="tabpanel">
                        <section>
                            <div
                                class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                                <!-- <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign out</a> -->
                            </div>
                            <form action="{{ route('account.change-password') }}" method="POST" id="change-password-form">
                                <div class="bg-secondary rounded-3 p-4 mb-4">
                                    <div class="row gx-4 gy-6">
                                        <div class="col-sm-9">
                                            <label class="form-label" for="account-pass">Mật khẩu hiện tại</label>
                                            <div class="password-toggle">
                                                <input class="form-control" type="password" id="account-pass"
                                                    name="current_password" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <label class="form-label" for="account-pass">Mật khẩu mới</label>
                                            <div class="password-toggle">
                                                <input class="form-control" type="password" id="account-pass"
                                                    name="new_password" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <label class="form-label" for="account-confirm-pass">Xác nhận mật khẩu</label>
                                            <div class="password-toggle">
                                                <input class="form-control" type="password" id="account-confirm-pass"
                                                    name="confirm_new_password" autocomplete="new-password" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr class="mt-2 mb-3">
                                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Thay đổi mật
                                                    khẩu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>

                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <section>
                            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                                <div class="d-flex align-items-center">
                                    <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2"
                                        for="order-sort"></label>
                                    <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort"></label>

                                </div>
                            </div>
                            <div class="table-responsive fs-md mb-4">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng #</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                                    data-bs-toggle="modal">34VB5540K83</a></td>
                                            <td class="py-3">May 21, 2019</td>
                                            <td class="py-3"><span class="badge bg-info m-0">In Progress</span></td>
                                            <td class="py-3">$358.75</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>

                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                        <section>
                            <div
                                class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                            </div>
                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a
                                        class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"
                                        style="width: 10rem;"><img src="img/shop/cart/02.jpg" alt="Product"></a>
                                    <div class="pt-2">
                                        <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City
                                                Backpack</a></h3>
                                        <div class="fs-sm"><span class="text-muted me-2">Brand:</span>Tommy Hilfiger</div>
                                        <div class="fs-sm"><span class="text-muted me-2">Color:</span>Khaki</div>
                                        <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button class="btn btn-outline-danger btn-sm" type="button"><i
                                            class="ci-trash me-2"></i>Xóa</button>
                                </div>
                            </div>
                        </section>
                    </div>



                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <section>
                            <div
                                class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                            </div>
                            <div class="table-responsive fs-md">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($addresses as $address)
                                            <tr>
                                                <td class="py-3 align-middle">{{ $address->full_name }}, {{ $address->address }}, {{ $address->city }}<span
                                                        class="align-middle badge bg-info ms-2">{{ $address->default ? 'Mặc định' : '' }}</span></td>
                                                <td class="py-3 align-middle">
                                                    <form action="{{ route('account.addresses.delete', $address->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link nav-link-style text-danger p-0 ms-2" data-bs-toggle="tooltip" title="Xóa địa chỉ" onclick="return confirm('Bạn có chắc chắn muốn xóa địa chỉ này?')">
                                                            <i class="ci-trash"></i>
                                                        </button>
                                                    </form>
                                                    @if (!$address->default)
                                                        <form action="{{ route('account.addresses.update', $address->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-link nav-link-style text-primary p-0 ms-2" data-bs-toggle="tooltip" title="Đặt làm mặc định">
                                                                <i class="ci-star"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-sm-end pt-4"><a class="btn btn-primary" href="#add-address"
                                    data-bs-toggle="modal">Thêm địa chỉ mới</a></div>
                        </section>
                    </div>

                    <!-- Add New Address-->
                    <form action="{{ route('account.addresses.add') }}" class="needs-validation modal fade" method="POST" id="add-address" tabindex="-1" novalidate id="addAddressForm">
                        @csrf
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add a new address</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row gx-4 gy-3">
                                        
                                        <div class="col-sm-6">
                                            <label class="form-label" for="full_name">Tên người dùng</label>
                                            <input class="form-control" type="text" id="full_name" name="full_name" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="address">Địa chỉ</label>
                                            <input class="form-control" type="text" id="address" name="address" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="city">Thành phố</label>
                                            <input class="form-control" type="text" id="city" name="city" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="phone">Số điện thoại</label>
                                            <input class="form-control" type="text" id="phone" name="phone" required>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="default" name="default">
                                                <label class="form-check-label" for="default">Đặt làm địa chỉ mặc định</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-shadow" type="submit">Lưu địa chỉ</button>
                                </div>
                            </div>
                        </div>
                    </form>



                    <div class="tab-pane fade" id="payment" role="tabpanel">
                        <section>
                            <div
                                class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                            </div>
                            <div class="table-responsive fs-md mb-4">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Thẻ tín dụng / thẻ ghi nợ của bạn</th>
                                            <th>Tên trên thẻ</th>
                                            <th>Hết hạn vào</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-3 align-middle">
                                                <div class="d-flex align-items-center"><img src="img/card-visa.png"
                                                        width="39" alt="Visa">
                                                    <div class="ps-2"><span
                                                            class="fw-medium text-heading me-1">Visa</span>ending in
                                                        4999<span class="align-middle badge bg-info ms-2">Primary</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 align-middle">Susan Gardner</td>
                                            <td class="py-3 align-middle">08 / 2019</td>
                                            <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#"
                                                    data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a
                                                    class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip"
                                                    title="Remove">
                                                    <div class="ci-trash"></div>
                                                </a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-sm-end"><a class="btn btn-primary" href="#add-payment"
                                    data-bs-toggle="modal">Thêm phương thức thanh toán</a></div>
                        </section>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection