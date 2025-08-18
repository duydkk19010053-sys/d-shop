<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($product->stock < $request->quantity) {
            return response()->json(['error' => 'Số lượng sản phẩm không đủ trong kho'], 400);
        }
        // if login  save datebase
        if(Auth::check())
        {
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();
            if ($cartItem) 
            {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                $cartItem = CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }
            $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
        } else {
            // if not login, save to session
            $cart = session()->get('cart', []);
            if(isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                $cart[$request->product_id] = [
                    'product_id' => $request->product_id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'stock' => $product->stock,
                    'image' => $product->firstImage?->image ?? 'uploads/products/default-product.png',
                ];
            }
            session()->put('cart', $cart);
            $cartItems = $cart;
        }

        return view('clients.pages.cart', compact('cartItems'));
    }
    
    public function viewCart()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->with('product')->get();
        return view('clients.pages.cart', compact('cartItems'));
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}
