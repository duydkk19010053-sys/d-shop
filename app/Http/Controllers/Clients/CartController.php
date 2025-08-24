<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->merge(['quantity' => (int) $request->quantity]);
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($product->quantity > $product->stock) {
            return response()->json(['error' => 'Số lượng sản phẩm không đủ trong kho'], 400);
        }
        // if login  save datebase
        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();
            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }
            $cartCount = CartItem::where('user_id', Auth::id())->count();
        } else {
            // if not login, save to session
            $cart = session()->get('cart', []);
            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                $cart[$request->product_id] = [
                    'product_id' => $request->product_id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'stock' => $product->stock,
                    'image' => $product->images->first()->image ?? 'uploads/products/default-product.png',
                ];
            }
            session()->put('cart', $cart);
            $cartCount = count($cart);
        }

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
        ]);
    }

    // mini_cart
    // public function viewMiniCart()
    // {
    //     $cartItems = [];
    //     if(auth()->check()) {
    //         $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();
    //     } else {
    //         $cartItems = session('cart', []);
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'html' => view('clients.components.includes.mini_cart', compact('cartItems'))->render()
    //     ]);
    // }
    public function viewMiniCart()
    {
        // Sử dụng Laravel Collection để xử lý cho tiện
        $cartDataForView = collect();

        if (auth()->check()) {
            // --- DÀNH CHO USER ĐĂNG NHẬP ---
            // Lấy dữ liệu từ DB, cấu trúc đã chuẩn
            $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

            // Map lại để đảm bảo cấu trúc nhất quán (dù không bắt buộc nhưng là good practice)
            $cartDataForView = $cartItems->map(function ($item) {
                return (object) [ // Ép kiểu về object cho giống trường hợp guest
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
            });

        } else {
            // --- DÀNH CHO KHÁCH (GUEST) ---
            $sessionCart = session('cart', []);

            if (!empty($sessionCart)) {
                // 1. Lấy tất cả product ID từ session
                $productIds = array_keys($sessionCart);

                // 2. Chỉ truy vấn DB một lần duy nhất để lấy tất cả sản phẩm
                $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

                // 3. Xây dựng lại collection với cấu trúc chuẩn
                foreach ($sessionCart as $productId => $details) {
                    // Chỉ thêm vào giỏ hàng nếu sản phẩm thực sự tồn tại
                    if (isset($products[$productId])) {
                        $cartDataForView->push((object) [
                            'product' => $products[$productId],
                            'quantity' => $details['quantity'], // Giả sử session lưu quantity ở đây
                        ]);
                    }
                }
            }
        }

        // Tính tổng subtotal ngay tại đây
        $subtotal = $cartDataForView->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Bây giờ, $cartDataForView và $subtotal luôn có dữ liệu chuẩn để gửi sang view
        return response()->json([
            'status' => true,
            'html' => view('clients.components.includes.mini_cart', [
                'cartItems' => $cartDataForView,
                'subtotal' => $subtotal
            ])->render()
        ]);
    }

    //page cart
    public function viewCart()
    {
        if (Auth::check()) {
            //Get cart from database
            $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get()->map(function ($item) {
                return [
                    'product_id' => $item->product->id,
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'stock' => $item->product->stock,
                    'image' => $item->product->images->first()->image ?? 'uploads/products/default-product.png',
                ];
            })->toArray();
        } else {
            //Get cart from session
            $cartItems = session()->get('cart', []);
        }
        return view('clients.pages.cart', compact('cartItems'));
    }

    // remove cart
    public function removeCartItem(Request $request)
    {
        $productId = $request->product_id;

        if (Auth::check()) {
            // Remove from database
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            // Remove from session
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        // calculate cartTotal again
        $total = $this->calculateCartTotal();
        $grandTotal = $total;
        return response()->json([
            'total' => number_format($grandTotal, 0, ',', '.'),
            'grandTotal' => number_format($grandTotal, 0, ',', '.')
        ]);
    }

    // Helper method to calculate cart total
    protected function calculateCartTotal()
    {
        $total = 0;
        if (Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
            foreach ($cartItems as $item) {
                $total += $item->product->price * $item->quantity;
            }
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}
