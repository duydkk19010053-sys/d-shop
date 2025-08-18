@extends('layout.client')
@section('title', 'Quên mật khẩu')

@section('content')
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <h2 class="h3 mb-4">Bạn đã quên mật khẩu?</h2>
            <p class="fs-md">Thay đổi mật khẩu của bạn chỉ với ba bước đơn giản. Điều này giúp giữ cho mật khẩu mới của bạn an toàn.</p>
            <ol class="list-unstyled fs-md">
              <li><span class="text-primary me-2">1.</span>Điền địa chỉ email của bạn bên dưới.</li>
              <li><span class="text-primary me-2">2.</span>Chúng tôi sẽ gửi cho bạn đường link để thay đổi mật khẩu.</li>
              <li><span class="text-primary me-2">3.</span>Cập nhật mật khẩu mới của bạn.</li>
            </ol>
            <div class="card py-2 mt-4">
              <form class="card-body needs-validation" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="recover-email">Nhập email của bạn</label>
                  
                  <input class="form-control" type="email" name="email" id="recover-email" required>
                  @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <div class="invalid-feedback">Vui lòng cung cấp địa chỉ email hợp lệ.</div>
                </div>
                <button class="btn btn-primary" type="submit">Thay đổi mật khẩu</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection