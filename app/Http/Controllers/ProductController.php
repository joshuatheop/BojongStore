<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $ulasans = $product->ulasans()->with('user')->orderBy('created_at', 'desc')->paginate(3);
        $totalUlasan = $product->ulasans()->count();
        $isFavorited = Auth::check() ? $product->favorits()->where('user_id', Auth::id())->exists() : false;

        return view('products.show', compact('product', 'ulasans', 'totalUlasan', 'isFavorited'));
    }
}
