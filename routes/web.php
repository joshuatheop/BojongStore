<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UlasanController;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('welcome', compact('products'));
});

Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::post('/reviews', [UlasanController::class, 'store'])->name('reviews.store');
Route::get('/api/reviews/{product_id}', [UlasanController::class, 'getReviews']);
Route::get('/favorit', function () {
    $products = \App\Models\Product::all();
    return view('favorit', compact('products'));
});

Route::delete('/reviews/{id}', [UlasanController::class, 'destroy']);
