<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\FavoritController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Auto-login a dummy user for demo purposes if not logged in
    if (!Auth::check()) {
        $user = User::first();
        if ($user) {
            Auth::login($user);
        }
    }
    return redirect()->route('products.show', 1);
});

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{product}/ulasan', [UlasanController::class, 'store'])->name('ulasan.store')->middleware('auth');
Route::get('/products/{product}/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/products/{product}/favorit', [FavoritController::class, 'toggle'])->name('favorit.toggle')->middleware('auth');
