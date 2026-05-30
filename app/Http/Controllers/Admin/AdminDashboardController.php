<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order; // Added this to fetch order details properly
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    // 1. Controls your Main Dashboard Screen
    public function index()
    {
        $adminEmails    = DB::table('users')->pluck('email')->toArray();

        $totalProducts  = Product::count();
        $totalBrands    = Brand::count();
        $totalOrders    = DB::table('orders')->count();
        $totalCustomers = Customer::whereNotIn('email', $adminEmails)->count();
        $recentProducts = Product::with(['brand', 'images'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalBrands',
            'totalOrders',
            'totalCustomers',
            'recentProducts'
        ));
    }

    // 2. Controls your Admin Orders Screen (Fixes the $0.00 prices)
    public function orders()
    {
        // explicitly select all properties from the orders data table
        $orders = Order::with('customer')
            ->select('orders.*')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders', compact('orders'));
    }
}