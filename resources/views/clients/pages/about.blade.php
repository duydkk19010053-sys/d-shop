@extends('layout.client')
@section('title', 'Về chúng tôi')

@section('content')
    <main class="container-fluid px-0">
        <!-- Row: Shop online-->
        <section class="row g-0">
          <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{ asset('assets/clients/img/about/01.jpg') }});"></div>
          <div class="col-md-6 px-3 px-md-5 py-5">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Thanh toán với Cartzilla</h2>
              <p class="fs-sm pb-3 text-muted">Tại Cartzilla, chúng tôi tin rằng một trải nghiệm mua sắm tuyệt vời không chỉ dừng lại ở việc tìm thấy sản phẩm ưng ý. Nó phải trọn vẹn cho đến bước cuối cùng. Thấu hiểu điều đó, chúng tôi đã nỗ lực không ngừng để loại bỏ mọi rào cản trong khâu thanh toán. Chúng tôi mang đến sự linh hoạt tối đa, từ việc trả tiền mặt khi nhận hàng (COD) quen thuộc, cho đến việc quét mã QR, sử dụng các ví điện tử hàng đầu như MoMo, ZaloPay, VNPAY hay trả góp 0%... Tất cả đều nhằm một mục đích duy nhất: để mỗi giây phút bạn dành cho chúng tôi đều là sự thoải mái và an tâm tuyệt đối.</p><a class="btn btn-primary btn-shadow" href="{{ route('products.index') }}">Mua ngay</a>
            </div>
          </div>
        </section>
        <!-- Row: Delivery-->
        <section class="row g-0">
          <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{ asset('assets/clients/img/about/02.jpg') }});"></div>
          <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Giao hàng nhanh trên toàn thế giới</h2>
              <p class="fs-sm pb-3 text-muted">Tại Cartzilla, chúng tôi tin rằng thế giới đang ngày càng phẳng hơn. Sứ mệnh của chúng tôi là xóa bỏ mọi khoảng cách địa lý, kết nối bạn với mọi nơi trên toàn cầu một cách nhanh chóng, an toàn và hiệu quả nhất.
Với mạng lưới đối tác rộng khắp hơn 220 quốc gia và vùng lãnh thổ, cùng nền tảng công nghệ tiên tiến, chúng tôi mang đến giải pháp chuyển phát nhanh quốc tế toàn diện, giúp bạn gửi đi những kiện hàng, tài liệu quan trọng hay những món quà ý nghĩa đến tay người nhận một cách thuận tiện nhất.
</p>
            </div>
          </div>
        </section>
        <!-- Row: Mobile app-->
        <section class="row g-0">
          <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{ asset('assets/clients/img/about/03.jpg') }});"></div>
          <div class="col-md-6 px-3 px-md-5 py-5">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Ứng dụng thân thiện. Mua sắm mọi lúc</h2>
              <p class="fs-sm pb-3 text-muted">Trong nhịp sống hối hả, chúng tôi tin rằng mua sắm nên là một niềm vui, không phải là một gánh nặng. Đó là lý do Cartzilla ra đời.

Sứ mệnh của chúng tôi rất đơn giản: tạo ra một ứng dụng thân thiện nhất có thể. Từ giao diện trực quan, dễ tìm kiếm đến các bước thanh toán nhanh gọn, mọi thứ đều được thiết kế để mang đến cho bạn trải nghiệm mượt mà và không chút phiền phức.
Với [Tên Ứng Dụng], bạn hoàn toàn tự do mua sắm mọi lúc, mọi nơi. Dù đang trên xe buýt, trong giờ nghỉ trưa hay thư giãn tại nhà, hàng ngàn sản phẩm chất lượng luôn ở ngay trong tầm tay bạn.
Chào mừng bạn đến với kỷ nguyên mua sắm mới – tiện lợi, nhanh chóng và dành riêng cho bạn.</p><a class="btn-market btn-apple me-3 mb-3" href="#" role="button"><span class="btn-market-subtitle">Tải về ngay</span><span class="btn-market-title">App Store</span></a><a class="btn-market btn-google mb-3" href="#" role="button"><span class="btn-market-subtitle">Tải về ngay</span><span class="btn-market-title">Google Play</span></a>
            </div>
          </div>
        </section>
        <!-- Section: Shopping outlets-->
        <section class="row g-0">
          <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{ asset('assets/clients/img/about/gearvn.png') }});"></div>
          <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Hệ thống cửa hàng Cartzilla</h2>
              <p class="fs-sm pb-3 text-muted">
Từ những bước đi đầu tiên, Cartzilla đã mang trong mình sứ mệnh mang đến những sản phẩm chất lượng và dịch vụ tận tâm cho khách hàng Việt. Sau một hành trình phát triển, chúng tôi tự hào đã xây dựng nên một hệ thống vững mạnh và đáng tin cậy.
Với 10 chi nhánh trải dài trên toàn quốc, chúng tôi không chỉ đơn thuần là một cái tên. Chúng tôi là sự hiện diện, là lời cam kết về chất lượng và sự tiện lợi dù bạn ở bất kỳ đâu. Mỗi cửa hàng trong hệ thống đều là một trung tâm trải nghiệm, nơi bạn có thể trực tiếp cảm nhận sản phẩm, nhận được sự tư vấn chuyên nghiệp và hưởng chính sách hậu mãi đồng nhất.
Sự có mặt của chúng tôi từ Bắc vào Nam chính là minh chứng cho sự tin tưởng của hàng triệu khách hàng và là nền tảng để chúng tôi tiếp tục phát triển, phục vụ bạn ngày một tốt hơn.</p><a class="btn btn-warning btn-shadow" href="{{ route('contact.index') }}">Liên hệ ngay</a>
            </div>
          </div>
        </section>
        <hr>
       
      
      </main>
@endsection