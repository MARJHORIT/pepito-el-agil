<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    public function index()
    {
        return Clasificacion::all();
    }

    public function store(Request $request)
    {
        return Clasificacion::create($request->all());
    }

    public function show($id)
    {
        return Clasificacion::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $clasificacion = Clasificacion::findOrFail($id);
        $clasificacion->update($request->all());
        return $clasificacion;
    }

    public function destroy($id)
    {
        Clasificacion::destroy($id);
        return response()->json(['mensaje' => 'Eliminado correctamente']);
    }
}