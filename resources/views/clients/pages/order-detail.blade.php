@extends('layout.client')
@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="liton_shoping-cart-area mb-120">
        <div class="container mt-4">
            <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
            <p>Ngày đặt: {{ $order->created_at->format('d/m/Y') }}</p>
            <p>Trạng thái:
                @if ($order->status == 'pending')
                    <span class="badge bg-warning">Chờ xác nhận</span>
                @elseif ($order->status == 'processing')
                    <span class="badge bg-info">Đang xử lý</span>
                @elseif ($order->status == 'completed')
                    <span class="badge bg-success">Hoàn thành</span>
                @elseif ($order->status == 'canceled')
                    <span class="badge bg-danger">Đã hủy</span>
                @endif
            </p>
            <p>Phương thức thanh toán:
                @if ($order->payment && $order->payment->payment_method == 'cash')
                    <span class="badge bg-primary">Thanh toán khi nhận hàng</span>
                @elseif ($order->payment && $order->payment->payment_method == 'paypal')
                    <span class="badge bg-info">Đã thanh toán bằng Paypal</span>
                @else
                    <span class="badge bg-danger">Chưa xác định</span>
                @endif
            </p>
            <p>Tổng tiền: {{ number_format($order->total_price, 0, ',', '.') }}₫</p>

            <h4 class="mt-4">Sản phẩm</h4>
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lương</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td class="py-3"><img src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->name }}" width="50"></td>
                            <td class="py-3">{{ $item->product->name }}</td>
                            <td class="py-3">{{ number_format($item->price, 0, ',', '.') }}₫</td>
                            <td class="py-3">{{ $item->quantity }}</td>
                            <td class="py-3">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <h4 class="mt-4">Thông tin giao hàng</h4>
            <p>Người nhận: {{ $order->shippingAddress->full_name }}</p>
            <p>Địa chỉ: {{ $order->shippingAddress->address }}</p>
            <p>Thành phố: {{ $order->shippingAddress->city }}</p>
            <p>Số điện thoại: {{ $order->shippingAddress->phone }}</p>

            @if ($order->status == 'pending')
                <form action="{{ route('order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm m-2">Hủy đơn hàng</button>
                </form>

            @endif

            @if ($order->status == 'completed')
                <h4 class="mt-4">Đánh giá sản phẩm</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đánh giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                    <a href="{{ route('products.detail', $item->product->slug) }}" class="btn btn-primary btn-sm">Xem lại sản phẩm</a>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            @endif

        </div>
    </div>
@endsection