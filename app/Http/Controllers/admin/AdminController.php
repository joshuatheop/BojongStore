<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $total_products = Product::count();
        $total_categories = Category::count();
        $total_reviews = Review::count();
        $avg_rating = Review::avg('rating') ?? 0;
        $top_products = Product::with('category')->orderBy('views', 'desc')->take(5)->get();

        // Calculate Product Growth
        $thisMonthProducts = Product::whereMonth('created_at', Carbon::now()->month)
                                    ->whereYear('created_at', Carbon::now()->year)->count();
        $lastMonthProducts = Product::whereMonth('created_at', Carbon::now()->subMonth()->month)
                                    ->whereYear('created_at', Carbon::now()->subMonth()->year)->count();
        $productGrowth = $lastMonthProducts == 0 ? ($thisMonthProducts > 0 ? 100 : 0) : round((($thisMonthProducts - $lastMonthProducts) / $lastMonthProducts) * 100);

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

        return view('admin.dashboard', compact('total_products', 'total_categories', 'total_reviews', 'avg_rating', 'top_products', 'labels', 'data', 'productGrowth'));
    }
}
