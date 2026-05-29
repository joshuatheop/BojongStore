<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// ======= HALAMAN UTAMA =======
Route::get('/', function () {
    $mostViewedProduct = \App\Models\Product::orderBy('views', 'desc')->first();
    return view('home', compact('mostViewedProduct'));
})->name('home');

Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/katalog', [ProductController::class, 'katalog'])->name('katalog');
Route::get('/produk', [ProductController::class, 'produkPage'])->name('produk');

// ======= FAVORIT =======
Route::get('/favorit', function () {
    $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')->get();
    return view('favorit', compact('products'));
});

// ======= ULASAN / REVIEWS =======
Route::post('/reviews', [UlasanController::class, 'store'])->name('reviews.store');
Route::get('/api/reviews/{product_id}', [UlasanController::class, 'getReviews']);
Route::delete('/reviews/{id}', [UlasanController::class, 'destroy']);

// ======= BANTUAN / HELP COMPLAINTS =======
Route::post('/help-complaints', [\App\Http\Controllers\HelpComplaintController::class, 'store'])->name('help-complaints.store');

// ======= AUTH ROUTES =======
require __DIR__ . '/auth.php';

// ======= PROFILE (AUTH REQUIRED) =======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
