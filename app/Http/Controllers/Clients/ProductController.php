<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryes = Category::with('products')->get();
        $query = Product::with('firstImage')->where('status', 'in_stock');

        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(12);

        foreach ($products as $product) {
            $product->image_url = $product->firstImage?->image
                ? asset('storage/uploads/products/' . $product->firstImage->image)
                : asset('storage/uploads/products/default-product.png');
        }

        return view('clients.pages.products', compact('categoryes', 'products'));
    }

    public function detail($slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();

        // Get product in the same category
        $relatedProducts = Product::where('category_id', $product->id)
        ->where('id', '!=', $product->id)
        ->limit(6)
        ->get();
        return view('clients.pages.product-detail', compact('product', 'relatedProducts'));
    }
}

