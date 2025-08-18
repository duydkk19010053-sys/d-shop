@extends('layout.client')
@section('title', 'Đăng kí')

@section('content')
    <div class="container py-5 my-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
      <div class="col-md-6">
        <div class="card border-0 shadow">
          <div class="card-body">
            <h2 class="h4 mb-4 text-center">Đăng ký</h2>
            <form action="{{ route('post-register') }}" class="needs-validation" method="POST" id="register-form">
              @csrf
              <div class="mb-3">
                <label class="form-label" for="reg-ln">Họ và tên</label>
                <input class="form-control" name="name" type="text" value="{{ old('name') }}" required id="reg-ln">
                @error('name')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="reg-email">E-mail</label>
                <input class="form-control" name="email" type="email" value="{{ old('email') }}" required id="reg-email">
                @error('email')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="reg-phone">Số điện thoại</label>
                <input class="form-control" name="phone" type="text" value="{{ old('phone') }}" required id="reg-phone">
                @error('phone')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="reg-password">Mật khẩu</label>
                <input class="form-control" name="password" type="password" required id="reg-password">
                @error('password')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="reg-password-confirm">Xác nhận mật khẩu</label>
                <input class="form-control" name="confirmPassword" type="password" required id="reg-password-confirm">
                @error('confirmPassword')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="text-center pt-3">
                <button class="btn btn-primary w-100" type="submit"><i class="ci-user me-2 ms-n1"></i>Đăng ký</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection