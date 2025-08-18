<header class="shadow-sm">
        <!-- Topbar-->
        <div class="topbar topbar-dark bg-dark">
          <div class="container">
            <div>
              <!-- <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img class="me-2" src="img/flags/en.png" width="20" alt="English">Eng / $</a>
                <ul class="dropdown-menu my-1">
                  <li class="dropdown-item">
                    <select class="form-select form-select-sm">
                      <option value="usd">$ USD</option>
                      <option value="eur">€ EUR</option>
                      <option value="ukp">£ UKP</option>
                      <option value="jpy">¥ JPY</option>
                    </select>
                  </li>
                  <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/fr.png" width="20" alt="Français">Français</a></li>
                  <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/de.png" width="20" alt="Deutsch">Deutsch</a></li>
                  <li><a class="dropdown-item" href="#"><img class="me-2" src="img/flags/it.png" width="20" alt="Italiano">Italiano</a></li>
                </ul>
              </div> -->
              <div class="topbar-text text-nowrap d-none d-md-inline-block border-start border-light ps-3 ms-3"><span class="text-muted me-1">Tổng đài chăm sóc khách hàng</span><a class="topbar-link" href="tel:00331697720">0123456789</a></div>
            </div>
            <div class="topbar-text dropdown d-md-none ms-auto"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Yêu thích / So sánh / Kiểm tra đơn hàng</a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="account-wishlist.html"><i class="ci-heart text-muted me-2"></i>Yêu thích (3)</a></li>
                <li><a class="dropdown-item" href="comparison.html"><i class="ci-compare text-muted me-2"></i>So sánh (3)</a></li>
                <li><a class="dropdown-item" href="order-tracking.html"><i class="ci-location text-muted me-2"></i>Kiểm tra đơn hàng</a></li>
              </ul>
            </div>
            <div class="d-none d-md-block ms-3 text-nowrap"><a class="topbar-link d-none d-md-inline-block" href="account-wishlist.html"><i class="ci-heart mt-n1"></i>Yêu thích (3)</a><a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" href="comparison.html"><i class="ci-compare mt-n1"></i>So sánh (3)</a><a class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block" href="order-tracking.html"><i class="ci-location mt-n1"></i>Kiểm tra đơn hàng</a></div>
          </div>
        </div>
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <div class="navbar-sticky bg-light">
          <div class="navbar navbar-expand-lg navbar-light">
            <div class="container"><a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="{{ route('home') }}"><img src="{{ asset('assets/clients/img/logo-dark.png') }}" width="142" alt="Cartzilla"></a><a class="navbar-brand d-sm-none me-2" href="index-2.html"><img src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
              <!-- Search-->
              <div class="input-group d-none d-lg-flex flex-nowrap mx-4"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                <input class="form-control rounded-start w-100" type="text" placeholder="Search for products">
                
              </div>
              <!-- Toolbar-->
              <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-tool navbar-stuck-toggler" href="#">
                  <span class="navbar-tool-tooltip">Toggle menu</span>
                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                </a>
                <div class="navbar-tool dropdown ms-1 ms-lg-0 me-n1 me-lg-2">
                  <a class="navbar-tool" href="#" data-bs-toggle="dropdown">
                    <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                    <div class="navbar-tool-text ms-n3">Tài khoản</div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    @if (Auth::check())
                      <li><a class="dropdown-item" href="{{ route('account') }}">Tài khoản</a></li>
                      <li><a class="dropdown-item" href="{{ route('account') }}">Yêu thích</a></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    @else
                      <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                      <li><a class="dropdown-item" href="{{ route('register') }}">Đăng kí</a></li>
                    @endif
                  </ul>
                </div>
                <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html"><span class="navbar-tool-label">4</span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="shop-cart.html"><small>Giỏ hàng</small>10000đ</a>
                  <!-- Cart dropdown-->
                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                      <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                        <div class="widget-cart-item pb-2 border-bottom">
                          <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                          <div class="d-flex align-items-center"><a class="d-block flex-shrink-0" href="shop-single-v2.html"><img src="img/shop/cart/widget/05.jpg" width="64" alt="Product"></a>
                            <div class="ps-2">
                              <h6 class="widget-product-title"><a href="shop-single-v2.html">Bluetooth Headphones</a></h6>
                              <div class="widget-product-meta"><span class="text-accent me-2">$259.<small>00</small></span><span class="text-muted">x 1</span></div>
                            </div>
                          </div>
                        </div>
                       
                      </div>
                      <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                        <div class="fs-sm me-2 py-2"><span class="text-muted">Tổng cộng:</span><span class="text-accent fs-base ms-1">$1,247.<small>00</small></span></div><a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Kiểm tra giỏ hàng<i class="ci-arrow-right ms-1 me-n1"></i></a>
                      </div><a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Thanh Toán</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Search-->
                <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                  <input class="form-control rounded-start" type="text" placeholder="Search for products">
                </div>
                <!-- Departments menu-->
                <!-- <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ci-menu align-middle mt-n1 me-2"></i>Danh sách sản phẩm</a>
                    <ul class="dropdown-menu">
                      <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="ci-laptop opacity-60 fs-lg mt-n1 me-2"></i>Laptop Gaming &amp; Đồ Họa </a>
                        <div class="dropdown-menu p-0">
                          <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                            <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                              <div class="widget widget-links">
                                <h6 class="fs-base mb-3">Laptop Gaming</h6>
                                <ul class="widget-list">
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming Acer</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming ASUS</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming Gigabyte</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming Lenovo</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming MSI</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming HP</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Gaming Dell</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="mega-dropdown-column py-4 px-3">
                              <div class="widget widget-links">
                                <h6 class="fs-base mb-3">Laptop Đồ Họa</h6>
                                <ul class="widget-list">
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Acer</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa ASUS</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Gigabyte</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Lenovo</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa MSI</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa HP</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Dell</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Vivo</a></li>
                                  <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptop Đồ Họa Xiaomi</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="img/shop/departments/07.jpg" alt="Computers &amp; Accessories"></a>
                              <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$149.<small>80</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="ci-arrow-right fs-xs ms-1"></i></a>
                            </div>
                          </div>
                        </div>
                      </li>
                      
                    </ul>
                  </li>
                </ul> -->
                <!-- Primary menu-->
                <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Về chúng tôi</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Cửa hàng</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Liên hệ</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>