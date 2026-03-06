<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\IngresoController;


Route::get('/ingresos', [IngresoController::class, 'index'])->name('ingresos.index');
Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');