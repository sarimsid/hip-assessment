<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function getDashboard()
    {
        return view('admin.dashboard');
    }
}
