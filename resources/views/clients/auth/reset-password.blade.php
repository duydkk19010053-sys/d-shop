@extends('layout.client')
@section('title', 'Đặt lại mật khẩu')

@section('content')
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <h2 class="h3 mb-4">Đặt lại mật khẩu của bạn</h2>
            
            <div class="card py-2 mt-4">
              <form id="reset-password-form" class="card-body needs-validation" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">

                  <label class="form-label" for="recover-email">Nhập email của bạn</label>
                  
                  <input class="form-control" type="email" name="email" id="recover-email" required>
                  @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="recover-email">Mật khẩu mới</label>
                  
                  <input class="form-control" type="password" name="password" id="recover-email" required>
                  @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="recover-email">Xác nhận mật khẩu mới</label>
                  
                  <input class="form-control" type="password" name="password_confirmation" id="recover-email" required>
                  


                
                </div>
                <button class="btn btn-primary" type="submit">Đặt lại mật khẩu</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection