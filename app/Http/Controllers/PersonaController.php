<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return Persona::all();
    }

    public function store(Request $request)
    {
        return Persona::create($request->all());
    }
}
