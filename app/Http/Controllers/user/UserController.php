<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function produkunggulan()
    {
        return view('user.produkunggulan');
    }

    public function katalog()
    {
        $categories = Category::all();
        
        // --- INI ADALAH BARIS YANG DIPERBAIKI ---
        // Kita gunakan paginate() untuk membagi data menjadi beberapa halaman.
        // Angka di dalamnya adalah jumlah item per halaman.
        $products = Product::latest()->paginate(10); 

        return view('user.katalog', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}