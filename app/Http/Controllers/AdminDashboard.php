<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }
}
