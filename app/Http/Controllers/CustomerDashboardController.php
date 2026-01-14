<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerDashboardController extends Controller
{
    public function getDashboardData()
    {
        $products = Product::latest()->paginate(10);
        return view('customer.dashboard', compact('products'));
    }
}
