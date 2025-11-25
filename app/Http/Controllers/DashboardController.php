<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Stats
        $totalProducts = Product::count();
        $totalStockValue = Product::sum(DB::raw('price * stock'));
        $totalUsers = User::count();

        // 2. Charts
        // Low Stock (Lowest 5)
        $lowStockProducts = Product::orderBy('stock', 'asc')->take(5)->get();
        
        // Best Selling (Top 5 by total quantity out)
        $bestSellingProducts = Transaction::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->where('type', 'out')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(5)
            ->get();

        // 3. Recent Updates
        $latestTransactions = Transaction::with(['user', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts', 
            'totalStockValue', 
            'totalUsers', 
            'lowStockProducts', 
            'bestSellingProducts', 
            'latestTransactions'
        ));
    }
}
