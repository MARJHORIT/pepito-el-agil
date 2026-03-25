<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Autenticación (solo invitados)
Route::middleware('guest')->group(function () {
    // Registro
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Logout (solo autenticados)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rutas protegidas (solo usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    /**
     * ADMIN → Dashboard + Reportes
     */
    Route::middleware('checkRol:admin')->group(function () {
        Route::get('/dashboard', [IngresoController::class, 'dashboard'])->name('dashboard');

        Route::prefix('reportes')->name('reportes.')->group(function () {
            Route::get('/', [ReportController::class, 'index'])->name('index');
            Route::get('/exportar/excel', [ReportController::class, 'exportExcel'])->name('exportar.excel');
            Route::get('/exportar/pdf', [ReportController::class, 'exportPdf'])->name('exportar.pdf');
        });
    });

    /**
     * OPERADOR → Gestión de ingresos
     */
    Route::middleware('checkRol:operador')->group(function () {
        Route::resource('ingresos', IngresoController::class);
    });

    /**
     * TODOS LOS USUARIOS AUTENTICADOS → Perfil
     */
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');


    // Proteger todas las rutas del dashboard
Route::middleware(['auth', 'checkRol'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Otras rutas protegidas
    Route::resource('contribuyentes', ContribuyenteController::class);
    Route::resource('ingresos', IngresoController::class);
    Route::resource('egresos', EgresoController::class);
});

// Para verificar roles específicos
Route::get('/admin', [DashboardController::class, 'admin'])->middleware('checkRol:admin');
});
