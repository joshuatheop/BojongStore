<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

// User Controllers
use App\Http\Controllers\user\UserController;

// Admin Controllers
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/katalog', [ProductController::class, 'index'])->name('katalog');
Route::get('/kontak', function () { return view('kontak'); })->name('kontak');
Route::get('/produk-unggulan', function () { return view('produkunggulan'); })->name('produk.unggulan');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.detail');

// Legacy Compatibility Routes
Route::get('/index.php', function () { return redirect()->route('home'); });
Route::get('/pages/produk.php', [ProductController::class, 'index']);
Route::get('/pages/login.php', function () { return redirect()->route('login'); });
Route::get('/pages/register.php', function () { return redirect()->route('register'); });
Route::get('/pages/kontak.php', function () { return redirect()->route('kontak'); });
Route::get('/pages/detail-produk.php', [ProductController::class, 'showLegacy']);
Route::get('/pages/profile.php', [ProfileController::class, 'edit'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/komunitas', function () { return view('user.komunitas'); })->name('user.komunitas');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/products', \App\Http\Controllers\admin\ProductController::class)->names('admin.products');
});
