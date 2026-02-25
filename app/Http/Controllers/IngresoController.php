<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller;

class IngresoController extends Controller
{
    public function index()
    {
        return Ingreso::with(['persona', 'clasificacion', 'anioFiscal'])->get();
    }

    public function store(Request $request)
    {
        return Ingreso::create($request->all());
    }
}