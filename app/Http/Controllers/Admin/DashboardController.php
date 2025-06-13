<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


/**
 * DashboardController handles the admin dashboard functionalities.
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard', [
            'userCount' => \App\Models\User::count(),
            'productCount' => \App\Models\Product::count(),
            'orderCount' => \App\Models\Order::count(),
            'totalRevenue' => \App\Models\Order::where('status', 'completed')->sum('total_price'),
            'latestOrders' => \App\Models\Order::with('user')->latest()->take(5)->get(),
        ]);
    }
}
