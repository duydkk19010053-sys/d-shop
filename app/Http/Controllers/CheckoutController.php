<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ShippingAddress;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        $defaultAddress = $addresses->where('default', 1)->first();
        if (is_null($addresses) || is_null($defaultAddress)) {
            return redirect()->route('account')->with('error', 'Bạn cần thêm địa chỉ giao hàng trước khi thanh toán.');
        }

        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('clients.pages.checkout', compact('addresses', 'defaultAddress', 'cartItems', 'totalPrice'));
    }

    //get address
    public function getAddress(Request $request)
    {
        $address = ShippingAddress::where('id', $request->address_id)
            ->where('user_id', Auth::id())->first();
        if (!$address) {
            return response()->json(['success' => false, 'message' => 'Địa chỉ không tồn tại.']);
        }
        return response()->json([
            'success' => true,
            'address' => $address
        ]);
    }

    //checkout
    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán.');
        }
        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        DB::beginTransaction();
        try {
            // Create the order
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_address_id = $request->address_id;
            $order->total_price = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
            $order->status = 'pending'; //default is pending
            $order->save();

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);

                $product = $item->product;
                if ($product->stock < $item->quantity) {
                    throw new \Exception('Sản phẩm ' . $product->name . ' không đủ số lượng trong kho.');
                } else {
                    $product->stock -= $item->quantity;
                    $product->save();
                }
            }

            //Create payment
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $order->total_price,
                'status' => 'pending',
                'paid_at' => null,
            ]);

            //Delete product when pay
            CartItem::where('user_id', $user->id)->delete();
            DB::commit();
            return redirect()->route('account')->with('success', 'Đặt hàng thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.');
        } catch (\Exception $e) {
            Log::error('Lỗi đặt hàng: ' . $e->getMessage() . ' - Trace: ' . $e->getTraceAsString());
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'Đã xảy ra lỗi trong quá trình thanh toán: ' . $e->getMessage());
        }


    }

    public function placeOrderPayPal(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_address_id = $request->address_id;
            $order->total_price = $request->amount;
            $order->status = 'pending';
            $order->save();

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
                $product = $item->product;
                if ($product->stock < $item->quantity) {
                    throw new \Exception('Sản phẩm ' . $product->name . ' không đủ số lượng trong kho.');
                } else {
                    $product->stock -= $item->quantity;
                    $product->save();
                }
            }
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'paypal',
                'transaction_id' => $request->transactionID,
                'amount' => $order->total_price,
                'status' => 'completed',
                'paid_at' => now(),
            ]);
            CartItem::where('user_id', Auth::id())->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Lỗi đặt hàng PayPal: ' . $e->getMessage());
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi trong quá trình thanh toán: ' . $e->getMessage()]);
        }
    }
}
