<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('auth_required', 'Anda perlu Login terlebih dahulu untuk mengakses konten.');
        }

        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product-detail', compact('product'));
    }
      public function search(Request $request)
{
    $query = $request->get('q');
    $categories = \App\Models\Category::all();
    $products = Product::where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('type', 'like', '%' . $query . '%')
                ->paginate(10);

    return view('katalog', compact('products', 'categories', 'query'));
}
    public function katalog(Request $request)
{
    $categories = \App\Models\Category::all();

    $products = Product::query()
        ->when($request->category, fn($q) => $q->where('category_id', $request->category))
        ->when($request->search, fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
        ->paginate(10);

    return view('katalog', compact('products', 'categories'));
}

    public function produkPage(Request $request)
    {
        $products   = Product::all();
        $categories = \App\Models\Category::all();
        return view('produk', compact('products', 'categories'));
    }
}
