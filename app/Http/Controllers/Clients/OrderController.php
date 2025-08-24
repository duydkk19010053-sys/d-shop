<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrder($id)
    {
        $order = Order::with('orderItems.product', 'user', 'shippingAddress', 'payment')->findOrFail($id);
        $userId = auth()->id();
        return view('clients.pages.order-detail', compact('order', 'userId'));
    }

    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->where('user_id', auth()->id())->where('status', 'pending')->firstOrFail();

        foreach ($order->orderItems as $item) {
            $item->product->increment('stock', $item->quantity);
        }
        // update order status canceled
        $order->update(['status' => 'canceled']);
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}
