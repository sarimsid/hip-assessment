<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    //
    public function getDashboard()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.dashboard', compact('products'));
    }

    public function getCustomerListing()
    {
        // Logic to get customer listing
        $customers = \App\Models\Customer::all();
        return view('admin.customer_listing', compact('customers'));
    }


}
