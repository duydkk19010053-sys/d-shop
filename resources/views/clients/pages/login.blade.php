@extends('layout.client')
@section('title', 'Đăng nhập')

@section('content')
<div class="container py-4 py-lg-5 my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-0 shadow">
        <div class="card-body">
          <h2 class="h4 mb-1">Đăng nhập</h2>
          <div class="py-3">
            <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">Đăng nhập với:</h3>
            <div class="d-inline-block align-middle">
              <a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a>
              <a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a>
              <a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a>
            </div>
          </div>
          <hr>
          <h3 class="fs-base pt-4 pb-2">Bạn đã có tài khoản?</h3>
          <form action="#" class="needs-validation" method="POST" id="login-form">
            @csrf
            <div class="input-group mb-3">
              <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
              <input class="form-control rounded-start" name="email" type="email" placeholder="Email" required>
            </div>
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
              <i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
              <div class="password-toggle w-100">
                <input class="form-control" name="password" type="password" placeholder="Mật khẩu" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div>
            @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-wrap justify-content-between">
              <div class="form-check"></div>
              <a class="nav-link-inline fs-sm" href="{{route('password.request')}}">Quên mật khẩu?</a>
            </div>
            <hr class="mt-4">
            <div class="text-end pt-4">
              <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Đăng nhập</button>
            </div>
          </form>
          <div class="mt-4 text-center">
            <span>Bạn chưa có tài khoản?</span>
            <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">Tạo tài khoản</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
