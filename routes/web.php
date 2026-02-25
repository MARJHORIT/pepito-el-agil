<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\DashboardController;

Route::apiResource('clasificaciones', ClasificacionController::class);
Route::apiResource('personas', PersonaController::class);
Route::apiResource('ingresos', IngresoController::class);

Route::get('dashboard', [DashboardController::class, 'index']);