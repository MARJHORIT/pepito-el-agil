<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingresos = Ingreso::latest()->paginate(10);
        return view('ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingresos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        Ingreso::create($validated);
        return redirect()->route('ingresos.index')->with('success', 'Ingreso creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        return view('ingresos.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        return view('ingresos.edit', compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update($validated);
        return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();
        return redirect()->route('ingresos.index')->with('success', 'Ingreso eliminado exitosamente');
    }

    /**
     * Método para el dashboard
     */
    public function dashboard()
    {
        $totalIngresos = Ingreso::sum('monto');
        $ingresosRecientes = Ingreso::latest()->take(5)->get();
        
        return view('dashboard', compact('totalIngresos', 'ingresosRecientes'));
    }

    /**
     * Método para panel admin
     */
    public function admin()
    {
        $totalIngresos = Ingreso::sum('monto');
        $ingresos = Ingreso::latest()->paginate(15);
        
        return view('admin.dashboard', compact('totalIngresos', 'ingresos'));
    }
}