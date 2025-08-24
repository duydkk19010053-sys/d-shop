<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!$keyword){
            return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }
        $products = Product::where('name', 'like', "%$keyword%")
        ->orWhere('description', 'like', "%$keyword%")
        ->paginate(12);

        return view('clients.pages.product-search', compact('keyword', 'products'));
    }
}
