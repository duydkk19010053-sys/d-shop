@extends('layout.client_home')
@section('title', 'Trang Chủ')

@section('content')
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
              <div class="mb-3">
                <label class="form-label" for="si-email">Email address</label>
                <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="si-password">Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="si-password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mb-3 d-flex flex-wrap justify-content-between">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="si-remember">
                  <label class="form-check-label" for="si-remember">Remember me</label>
                </div><a class="fs-sm" href="#">Forgot password?</a>
              </div>
              <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
            </form>
            <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
              <div class="mb-3">
                <label class="form-label" for="su-name">Full name</label>
                <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                <div class="invalid-feedback">Please fill in your name.</div>
              </div>
              <div class="mb-3">
                <label for="su-email">Email address</label>
                <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="su-password">Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="su-password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="su-password-confirm">Confirm password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="su-password-confirm" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <main class="page-wrapper">
      <!-- Quick View Modal-->
      <div class="modal-quick-view modal fade" id="quick-view-electro" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title product-title"><a href="shop-single-v2.html" data-bs-toggle="tooltip" data-bs-placement="right" title="Go to product page">Smartwatch Youth Edition<i class="ci-arrow-right fs-lg ms-2"></i></a></h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Product gallery-->
                <div class="col-lg-7 pe-lg-0">
                  <div class="product-gallery">
                    <div class="product-gallery-preview order-sm-2">
                      <div class="product-gallery-preview-item active" id="first"><img class="image-zoom" src="{{ asset('assets/client/img/shop/single/gallery/05.jpg') }}" data-zoom="{{ asset('assets/client/img/shop/single/gallery/05.jpg') }}" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="second"><img class="image-zoom" src="{{ asset('assets/client/img/shop/single/gallery/06.jpg') }}" data-zoom="{{ asset('assets/client/img/shop/single/gallery/06.jpg') }}" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="third"><img class="image-zoom" src="{{ asset('assets/client/img/shop/single/gallery/07.jpg') }}" data-zoom="{{ asset('assets/client/img/shop/single/gallery/07.jpg') }}" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom" src="{{ asset('assets/client/img/shop/single/gallery/08.jpg') }}" data-zoom="{{ asset('assets/client/img/shop/single/gallery/08.jpg') }}" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                    </div>
                    <div class="product-gallery-thumblist order-sm-1"><a class="product-gallery-thumblist-item active" href="#first"><img src="img/shop/single/gallery/th05.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#second"><img src="img/shop/single/gallery/th06.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#third"><img src="img/shop/single/gallery/th07.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#fourth"><img src="img/shop/single/gallery/th08.jpg" alt="Product thumb"></a></div>
                  </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                  <div class="product-details ms-auto pb-3">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                      </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span>
                    </div>
                    <div class="h3 fw-normal text-accent mb-3 me-1">$124.<small>99</small></div>
                    <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span class="text-muted" id="colorOptionText">Dark blue/Orange</span></div>
                    <div class="position-relative me-n4 mb-3">
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color1" data-bs-label="colorOptionText" value="Dark blue/Orange" checked>
                        <label class="form-option-label rounded-circle" for="color1"><span class="form-option-color rounded-circle" style="background-color: #f25540;"></span></label>
                      </div>
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color2" data-bs-label="colorOptionText" value="Dark gray/Green">
                        <label class="form-option-label rounded-circle" for="color2"><span class="form-option-color rounded-circle" style="background-color: #65805b;"></span></label>
                      </div>
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color3" data-bs-label="colorOptionText" value="White">
                        <label class="form-option-label rounded-circle" for="color3"><span class="form-option-color rounded-circle" style="background-color: #f5f5f5;"></span></label>
                      </div>
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color4" data-bs-label="colorOptionText" value="Black">
                        <label class="form-option-label rounded-circle" for="color4"><span class="form-option-color rounded-circle" style="background-color: #333;"></span></label>
                      </div>
                      <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>
                    </div>
                    <div class="d-flex align-items-center pt-2 pb-4">
                      <select class="form-select me-3" style="width: 5rem;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      <button class="btn btn-primary btn-shadow d-block w-100" type="button"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                    </div>
                    <div class="d-flex mb-4">
                      <div class="w-100 me-3">
                        <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add to </span>Wishlist</button>
                      </div>
                      <div class="w-100">
                        <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-compare fs-lg me-2"></i>Compare</button>
                      </div>
                    </div>
                    <h5 class="h6 mb-3 py-2 border-bottom"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</h5>
                    <h6 class="fs-sm mb-2">General</h6>
                    <ul class="fs-sm pb-2">
                      <li><span class="text-muted">Model: </span>Amazfit Smartwatch</li>
                      <li><span class="text-muted">Gender: </span>Unisex</li>
                      <li><span class="text-muted">OS campitibility: </span>Android / iOS</li>
                    </ul>
                    <h6 class="fs-sm mb-2">Physical specs</h6>
                    <ul class="fs-sm pb-2">
                      <li><span class="text-muted">Shape: </span>Rectangular</li>
                      <li><span class="text-muted">Body material: </span>Plastics / Ceramics</li>
                      <li><span class="text-muted">Band material: </span>Silicone</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Navbar Electronics Store-->
      
      <!-- Hero (Banners + Slider)-->
      <section class="bg-secondary py-4 pt-md-5">
        <div class="container py-xl-2">
          <div class="row">
            <!-- Slider     -->
            <div class="col-xl-9 pt-xl-4 order-xl-2">
              <div class="tns-carousel">
                <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;loop&quot;: false}">
                  <div>
                    <div class="row align-items-center">
                      <div class="col-md-6 order-md-2"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/home/hero-slider/home3-sale1-qwmlxbwfz37zvabadpxftziq4wbso35msl6lfwiwm8.png') }}" alt="VR Collection"></div>
                      <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                        <h2 class="fw-light pb-1 from-bottom">World of music with</h2>
                        <h1 class="display-4 from-bottom delay-1">Headphones</h1>
                        <h5 class="fw-light pb-3 from-bottom delay-2">Choose between top brands</h5>
                        <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row align-items-center">
                      <div class="col-md-6 order-md-2"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/home/hero-slider/home3-sale2-qwmlxbwfpvns6a15rfnk56acxqz6zl826rdnjkv2cw.png') }}" alt="VR Collection"></div>
                      <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                        <h2 class="fw-light pb-1 from-start">Explore the best</h2>
                        <h1 class="display-4 from-start delay-1">VR Collection</h1>
                        <h5 class="fw-light pb-3 from-start delay-2">on the market</h5>
                        <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row align-items-center">
                      <div class="col-md-6 order-md-2"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/home/hero-slider/06.jpg') }}" alt="VR Collection"></div>
                      <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                        <h2 class="fw-light pb-1 scale-up">Check our huge</h2>
                        <h1 class="display-4 scale-up delay-1">Smartphones</h1>
                        <h5 class="fw-light pb-3 scale-up delay-2">&amp; Accessories collection</h5>
                        <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Banner group-->
            <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0">
              <div class="table-responsive" data-simplebar>
                <div class="d-flex d-xl-block"><a class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0" href="#" style="min-width: 16rem;"><img src="{{ asset('assets/clients/img/home/banners/banner-sm01.png') }}" width="125" alt="Banner">
                    <div class="py-4 px-2">
                      <h5 class="mb-2"><span class="fw-light">Next Gen</span><br>Video <span class="fw-light">with</span><br>360 Cam</h5>
                      <div class="text-info fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                    </div></a><a class="d-flex align-items-center bg-faded-warning rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0" href="#" style="min-width: 16rem;"><img src="{{ asset('assets/clients/img/home/banners/banner-sm02.png') }}" width="125" alt="Banner">
                    <div class="py-4 px-2">
                      <h5 class="mb-2"><span class="fw-light">Top Rated</span><br>Gadgets<br><span class="fw-light">are on </span>Sale</h5>
                      <div class="text-warning fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                    </div></a><a class="d-flex align-items-center bg-faded-success rounded-3 pt-2 ps-2 mb-4" href="#" style="min-width: 16rem;"><img src="{{ asset('assets/clients/img/home/banners/banner-sm03.png') }}" width="125" alt="Banner">
                    <div class="py-4 px-2">
                      <h5 class="mb-2"><span class="fw-light">Catch Big</span><br>Deals <span class="fw-light">on</span><br>Earbuds</h5>
                      <div class="text-success fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                    </div></a></div>
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
                  <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="width: 100%; height: 100%; object-fit: cover;">
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
          <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm sản phẩm<i class="ci-arrow-right ms-1 me-n1"></i></a></div>
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
                      <a class="btn-action nav-link-style me-2" href="#"><i class="ci-compare me-1"></i>So sánh</a>
                      <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào danh sách yêu thích"><i class="ci-heart"></i></button>
                    </div>
                    <a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html">
                      <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </a>
                    <div class="card-body py-2">
                      <a class="product-meta d-block fs-xs pb-1" href="#">{{ $category->name }}</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v2.html">{{ $product->name }}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price">
                          <span class="text-accent">{{ number_format($product->price, 0, ',', '.') }}<small>₫</small></span>
                        </div>
                        <div class="star-rating">
                          <i class="star-rating-icon ci-star-filled active"></i>
                          <i class="star-rating-icon ci-star-filled active"></i>
                          <i class="star-rating-icon ci-star-filled active"></i>
                          <i class="star-rating-icon ci-star-filled active"></i>
                          <i class="star-rating-icon ci-star-filled active"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-body-hidden">
                      <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                      <div class="text-center">
                        <a class="nav-link-style fs-ms" href="#quick-view-electro" data-bs-toggle="modal">
                          <i class="ci-eye align-middle me-1"></i>Xem nhanh
                        </a>
                      </div>
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
              <div class="px-4 pe-sm-0 ps-sm-5"><span class="badge bg-danger">Limited Offer</span>
                <h3 class="mt-4 mb-1 text-body fw-light">All new</h3>
                <h2 class="mb-1">Last Gen iPad Pro</h2>
                <p class="h5 text-body fw-light">at discounted price. Hurry up!</p>
                <div class="countdown py-2 h4" data-countdown="07/01/2023 07:00:00 PM">
                  <div class="countdown-days"><span class="countdown-value"></span><span class="countdown-label text-muted">d</span></div>
                  <div class="countdown-hours"><span class="countdown-value"></span><span class="countdown-label text-muted">h</span></div>
                  <div class="countdown-minutes"><span class="countdown-value"></span><span class="countdown-label text-muted">m</span></div>
                  <div class="countdown-seconds"><span class="countdown-value"></span><span class="countdown-label text-muted">s</span></div>
                </div><a class="btn btn-accent" href="#">View offers<i class="ci-arrow-right fs-ms ms-1"></i></a>
              </div>
            </div>
            <div class="col-md-7"><img src="{{ asset('assets/clients/img/home/banners/offer.jpg') }}" alt="iPad Pro Offer"></div>
          </div>
        </div>
      </section>
      <!-- Brands carousel-->
      <section class="container mb-5">
        <div class="tns-carousel border-end">
          <div class="tns-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/13.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/14.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/17.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/16.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/15.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/18.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/19.png') }}" style="width: 165px;" alt="Brand"></a></div>
            <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('assets/clients/img/shop/brands/20.png') }}" style="width: 165px;" alt="Brand"></a></div>
          </div>
        </div>
      </section>
      <!-- Product widgets-->
      
      <!-- YouTube feed-->
      <!-- <section class="container pb-5 mb-md-3">
        <div class="border rounded-3 p-3">
          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
              <div class="bg-secondary p-5 text-center"><img class="d-block mb-4 mx-auto" src="img/home/yt-logo.png" width="120" alt="YouTube">
                <div class="d-flex justify-content-center align-items-center mb-4"><img class="me-2" src="img/home/yt-subscribers.png" width="126" alt="YouTube Subscribers"><span class="fs-sm">250k+</span></div><a class="btn btn-primary border-0 btn-sm mb-3" href="#" style="background-color: #ff0000;"><i class="ci-add-user me-2"></i>Subscribe*</a>
                <p class="fs-sm mb-0">*View latest gadgets reviews available for purchase in our store.</p>
              </div>
            </div>
            <div class="col-md-8">
              <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-2">
                <h2 class="h4 mb-3">Latest videos from Cartzilla channel</h2><a class="btn btn-outline-accent btn-sm mb-3" href="#">More videos<i class="ci-arrow-right fs-xs ms-1 me-n1"></i></a>
              </div>
              <div class="row g-0">
                <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/vS93u75NnPo" data-bs-toggle="video">
                    <div class="position-relative mb-2"><span class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:16</span><img class="w-100" src="img/home/video/cover01.jpg" alt="Video cover"></div>
                    <h6 class="fs-sm pt-1">5 New Cool Gadgets You Must See on Cartzilla - Cheap Budget</h6></a></div>
                <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/B6LaYgGogf0" data-bs-toggle="video">
                    <div class="position-relative mb-2"><span class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">7:27</span><img class="w-100" src="img/home/video/cover02.jpg" alt="Video cover"></div>
                    <h6 class="fs-sm pt-1">5 Super Useful Gadgets on Cartzilla You Must Have in 2020</h6></a></div>
                <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/kB-ROfRS9V4" data-bs-toggle="video">
                    <div class="position-relative mb-2"><span class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:20</span><img class="w-100" src="img/home/video/cover03.jpg" alt="Video cover"></div>
                    <h6 class="fs-sm pt-1">Top 5 New Amazing Gadgets on Cartzilla You Must See</h6></a></div>
                <div class="col-lg-4 col-6 mb-3 d-lg-none"><a class="d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/sJK67XXE_Rg" data-bs-toggle="video">
                    <div class="position-relative mb-2"><span class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:11</span><img class="w-100" src="img/home/video/cover04.jpg" alt="Video cover"></div>
                    <h6 class="fs-sm fw-bold pt-1">5 Amazing Construction Inventions and Working Tools Available...</h6></a></div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- Blog + Instagram info cards-->
      <!-- <section class="container-fluid px-0">
        <div class="row g-0">
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
              <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h5 mb-1">Read the blog</h3>
                <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
              </div></a></div>
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
              <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                <h3 class="h5 mb-1">Follow on Instagram</h3>
                <p class="text-muted fs-sm">#ShopWithCartzilla</p>
              </div></a></div>
        </div>
      </section> -->
    </main>
    
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="account-wishlist.html"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span class="handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1">4</span></span><span class="handheld-toolbar-label">$265.00</span></a></div>
    </div>
@endsection