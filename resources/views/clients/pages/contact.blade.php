@extends('layout.client')
@section('title', 'Liên hệ')

@section('content')
    <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Trang chủ</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Liên hệ</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Liên hệ</h1>
          </div>
        </div>
      </div>
      <section class="container-fluid pt-grid-gutter">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll>
              <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-2">Địa chỉ cửa hàng tại:</h3>
                <p class="fs-sm text-muted">123 Hà Đông, Hà Nội</p>
                <div class="fs-sm text-primary">Tìm kiếm cửa hàng trên bản đồ<i class="ci-arrow-right align-middle ms-1"></i></div>
              </div></a></div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Giờ làm việc</h3>
                <ul class="list-unstyled fs-sm text-muted mb-0">
                  <li>Thứ 2 - Thứ 6: 10AM - 7PM</li>
                  <li class="mb-0">Thứ 7: 11AM - 5PM</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Số điện thoại</h3>
                <ul class="list-unstyled fs-sm mb-0">
                  <li><span class="text-muted me-1">Dịch vụ hỗ trợ khách hàng:</span><a class="nav-link-style" href="tel:+108044357260">0123456789</a></li>
                  <li class="mb-0"><span class="text-muted me-1">Hỗ trợ kỹ thuật:</span><a class="nav-link-style" href="tel:+100331697720">0987654321</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Địa chỉ email</h3>
                <ul class="list-unstyled fs-sm mb-0">
                  <li><span class="text-muted me-1">Dịch vụ hỗ trợ khách hàng:</span><a class="nav-link-style" href="mailto:+108044357260">khachhang@gmail.com</a></li>
                  <li class="mb-0"><span class="text-muted me-1">Hỗ trợ kỹ thuật:</span><a class="nav-link-style" href="mailto:support@example.com">kithuat@gmail.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="container-fluid px-0" id="map">
        <div class="row g-0">
          <div class="col-lg-6 iframe-full-height-wrap">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.7484136613452!2d105.74611147583998!3d20.96261619004587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452efff394ce3%3A0x391a39d4325be464!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBQaGVuaWthYQ!5e0!3m2!1svi!2s!4v1756043237431!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          </div>
          <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
            <h2 class="h4 mb-4">Nhận báo giá </h2>
            <form class="contact-form" action="{{ route('contact.index') }}" method="post">
              @csrf
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="cf-name">Nhập tên của bạn:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  required>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="cf-phone">Số điện thoại của bạn:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  required>
                </div>
                <div class="col-sm-12">
                  <label class="form-label" for="cf-email">Địa chỉ email:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  required>
                </div>
                
                
                <div class="col-12">
                  <label class="form-label" for="cf-message">Nhập tin nhắn:&nbsp;<span class="text-danger">*</span></label>
                  <textarea class="form-control" name="message" rows="6"  required></textarea>
                  <button class="btn btn-primary mt-4" type="submit">Gửi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection