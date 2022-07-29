<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            return view('dashboard');
        }
        return redirect()->route('articles');
    }
}
