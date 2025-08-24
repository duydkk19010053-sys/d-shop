<header class="shadow-sm">
  <!-- Topbar-->
  <div class="topbar topbar-dark bg-dark">
    <div class="container">
      <div>
                
        <div class="topbar-text text-nowrap d-none d-md-inline-block border-start border-light ps-3 ms-3"><span
            class="text-muted me-1">Tổng đài chăm sóc khách hàng</span><a class="topbar-link"
            href="tel:00331697720">0123456789</a></div>
            
      </div>
      <div class="tns-carousel tns-controls-static d-none d-md-block">
              <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                <div class="topbar-text">Miễn phí vận chuyển trên toàn quốc</div>
                <div class="topbar-text">Bảo hành 2 năm trên mọi sản phẩm</div>
                <div class="topbar-text">Chăm sóc khách hàng tận tụy chu đáo</div>
              </div>
            </div>
      <div class="topbar-text dropdown d-md-none ms-auto"><a class="topbar-link dropdown-toggle" href="#"
          data-bs-toggle="dropdown">Yêu thích / So sánh / Kiểm tra đơn hàng</a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="account-wishlist.html"><i class="ci-heart text-muted me-2"></i>Yêu thích
              (3)</a></li>
          <li><a class="dropdown-item" href="comparison.html"><i class="ci-compare text-muted me-2"></i>Tra cứu đơn hàng</a>
          </li>
          <li><a class="dropdown-item" href="order-tracking.html"><i class="ci-location text-muted me-2"></i>Hệ thống
              Showroom</a></li>
        </ul>
      </div>
      <div class="d-none d-md-block ms-3 text-nowrap"><a
          class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" href="comparison.html"><i
            class="ci-compare mt-n1"></i>Tra cứu đơn hàng</a><a
          class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block" href="order-tracking.html"><i
            class="ci-location mt-n1"></i>Hệ thống Showroom</a></div>
    </div>
  </div>
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <div class="navbar-sticky bg-light">
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container"><a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0"
          href="{{ route('home') }}"><img src="{{ asset('assets/clients/img/logo-dark.png') }}" width="142"
            alt="Cartzilla"></a><a class="navbar-brand d-sm-none me-2" href="index-2.html"><img src="img/logo-icon.png"
            width="74" alt="Cartzilla"></a>
        <!-- Search-->
        <div class="input-group d-none d-lg-flex flex-nowrap mx-4">
            <form action="{{ route('search') }}" method="GET" class="d-flex w-100">
              <input class="form-control rounded-start search-input" type="text" name="keyword" value="" placeholder="Tìm kiếm sản phẩm" style="max-width: 100%;">
              <button class="btn btn-primary" type="submit"><i class="ci-search"></i></button>
            </form>
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
          <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
        @else
          <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
          <li><a class="dropdown-item" href="{{ route('register') }}">Đăng kí</a></li>
        @endif
            </ul>
          </div>
          <div class="navbar-tool  ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
              href="{{ asset('cart') }}"><span class="navbar-tool-label" id="cart_count">
                @auth
          {{ \App\Models\CartItem::where('user_id', auth()->id())->count() }}
        @else
          {{ session('cart') ? count(session('cart')) : 0 }}
        @endauth
              </span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
              href="{{ asset('cart') }}">Giỏ hàng</a>
            <!-- Cart dropdown-->
            <!-- <div class="dropdown-menu dropdown-menu-end"> -->
            <!-- @include('clients.components.includes.mini_cart') -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Search-->
        <div class="input-group d-lg-none my-3">
          <form action="{{ route('products.index') }}" method="GET" class="d-flex">
            <input class="form-control rounded-start" type="text" name="search" placeholder="Tìm kiếm sản phẩm">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
          </form>
        </div>
        <!-- Primary menu-->
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Về chúng tôi</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Cửa hàng</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Liên hệ</a>
          </li>

        </ul>
      </div>
    </div>
  </div>
  </div>
</header>