<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Ingreso::sum('monto');
        $cantidad = Ingreso::count();

        return response()->json([
            'total_ingresos' => $total,
            'cantidad_registros' => $cantidad
        ]);
    }
}