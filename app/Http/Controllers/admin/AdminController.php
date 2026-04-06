<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $total_products = Product::count();
        $total_categories = Category::count();
        $top_products = Product::orderBy('views', 'desc')->take(5)->get();

        // Data chart statistik pengguna (7 hari terakhir)
        $labels = [];
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            // Menghasilkan data simulasi/real
            $count = User::whereDate('created_at', $date)->count();
            $labels[] = Carbon::now()->subDays($i)->format('d M');
            $data[] = $count;
        }

        return view('admin.dashboard', compact('total_products', 'total_categories', 'top_products', 'labels', 'data'));
    }
}
