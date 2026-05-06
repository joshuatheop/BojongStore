<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    public function toggle(Product $product)
    {
        $user = Auth::user();
        $favorit = Favorit::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($favorit) {
            $favorit->delete();
            $isFavorited = false;
        } else {
            Favorit::create([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
            $isFavorited = true;
        }

        return response()->json([
            'isFavorited' => $isFavorited
        ]);
    }
}
