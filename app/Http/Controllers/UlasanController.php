<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index(Product $product)
    {
        $ulasans = $product->ulasans()->with('user')->orderBy('created_at', 'desc')->paginate(3);
        
        return response()->json([
            'ulasans' => $ulasans->items(),
            'hasMore' => $ulasans->hasMorePages()
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        $ulasan = new Ulasan([
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'user_id' => Auth::id(),
            'status' => 'approved'
        ]);

        $product->ulasans()->save($ulasan);
        $ulasan->load('user');

        return response()->json([
            'message' => 'Review added successfully',
            'ulasan' => $ulasan
        ], 201);
    }
}
