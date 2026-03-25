<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Vista para el dashboard principal
        return view('dashboard');
    }

    public function admin()
    {
        // Vista para panel de administrador
        return view('admin.dashboard');
    }
}