<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $query = Ingreso::where('user_id', Auth::id());
        
        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha', '>=', $request->fecha_desde);
        }
        
        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha', '<=', $request->fecha_hasta);
        }
        
        if ($request->filled('codigo_presupuestal')) {
            $query->where('codigo_presupuestal', $request->codigo_presupuestal);
        }
        
        $ingresos = $query->orderBy('fecha', 'desc')
                         ->orderBy('created_at', 'desc')
                         ->paginate(15);
        
        $total = $query->sum('total');
        
        $codigosPresupuestales = Ingreso::where('user_id', Auth::id())
            ->select('codigo_presupuestal')
            ->distinct()
            ->pluck('codigo_presupuestal');
        
        return view('reportes.index', compact('ingresos', 'total', 'codigosPresupuestales'));
    }
    
    public function dashboard()
    {
        $userId = Auth::id();
        
        $totalRecaudado = Ingreso::where('user_id', $userId)->sum('total');
        $totalBoletas = Ingreso::where('user_id', $userId)->count();
        $mayorIngreso = Ingreso::where('user_id', $userId)->max('total') ?? 0;
        $totalCategorias = Ingreso::where('user_id', $userId)
            ->distinct('codigo_presupuestal')
            ->count('codigo_presupuestal');
        
        $ultimosIngresos = Ingreso::where('user_id', $userId)
            ->orderBy('fecha', 'desc')
            ->limit(10)
            ->get();
        
        return view('dashboard', compact(
            'totalRecaudado',
            'totalBoletas',
            'mayorIngreso',
            'totalCategorias',
            'ultimosIngresos'
        ));
    }
    
    public function exportExcel()
    {
        return redirect()->back()->with('info', '📊 Funcionalidad de exportación a Excel en desarrollo');
    }
    
    public function exportPdf()
    {
        return redirect()->back()->with('info', '📄 Funcionalidad de exportación a PDF en desarrollo');
    }
}