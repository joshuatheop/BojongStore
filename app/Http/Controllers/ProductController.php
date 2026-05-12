<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Auto-login for testing purposes
        if (!auth()->check()) {
            $user = User::first();
            if ($user) auth()->login($user);
        }

        return view('product-detail', compact('product'));
    }
}
