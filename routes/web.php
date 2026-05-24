<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// ======= HALAMAN UTAMA =======
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/katalog', [ProductController::class, 'katalog'])->name('katalog');
Route::get('/produk', [ProductController::class, 'produkPage'])->name('produk');

// ======= FAVORIT =======
Route::get('/favorit', function () {
    $products = \App\Models\Product::all();
    return view('favorit', compact('products'));
});

// ======= ULASAN / REVIEWS =======
Route::post('/reviews', [UlasanController::class, 'store'])->name('reviews.store');
Route::get('/api/reviews/{product_id}', [UlasanController::class, 'getReviews']);
Route::delete('/reviews/{id}', [UlasanController::class, 'destroy']);

// ======= AUTH ROUTES =======
require __DIR__ . '/auth.php';

// ======= PROFILE (AUTH REQUIRED) =======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
