<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Your controller methods will go here
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}