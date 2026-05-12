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
});
