<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

// User Controllers
use App\Http\Controllers\user\UserController;

// Admin Controllers
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () { return view('produkunggulan'); })->name('beranda');
Route::get('/katalog', [ProductController::class, 'index'])->name('katalog');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.detail');
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Favorit Routes
    Route::get('/favorit', [\App\Http\Controllers\user\FavoriteController::class, 'index'])->name('favorit');
    Route::post('/favorit/{product}', [\App\Http\Controllers\user\FavoriteController::class, 'toggle'])->name('favorit.toggle');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/products', \App\Http\Controllers\admin\ProductController::class)->names('admin.products');
    Route::post('/admin/products/{product}/toggle-featured', [\App\Http\Controllers\admin\ProductController::class, 'toggleFeatured'])->name('admin.products.toggleFeatured');
    Route::resource('admin/umkm', \App\Http\Controllers\admin\UmkmController::class)->names('admin.umkm');
    // Review
    Route::get('/admin/review', [\App\Http\Controllers\admin\ReviewController::class, 'index'])->name('admin.review.index');
    Route::delete('/admin/review/{review}', [\App\Http\Controllers\admin\ReviewController::class, 'destroy'])->name('admin.review.destroy');
    // Konten
    Route::get('/admin/konten', [\App\Http\Controllers\admin\KontenController::class, 'index'])->name('admin.konten.index');
    Route::post('/admin/konten/{section}', [\App\Http\Controllers\admin\KontenController::class, 'update'])->name('admin.konten.update');
});
