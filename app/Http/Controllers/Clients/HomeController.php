<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        foreach ($categories as $index => $category) 
        {
            foreach ($category->products as $product) 
            {
                $product->image_url = $product->firstImage?->image
                ? asset('storage/uploads/products/' . $product->firstImage?->image) : asset('storage/uploads/products/default-product.png');
            }
        }
        return view('clients.pages.home', compact('categories'));
    }
}
