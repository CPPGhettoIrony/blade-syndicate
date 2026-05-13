<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Accesibles sin login)
|--------------------------------------------------------------------------
*/

Route::get('/', [IndexController::class, 'index']);

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
Route::post('/registro', [AuthController::class, 'guardarRegistro'])->name('registro.guardar');
/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (Solo usuarios autenticados)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Barberías
    Route::get('/barberias', [ListaController::class, 'index']);

    // CRUD Citas
    Route::get('/citas', [CitaController::class, 'index']);
    Route::get('/reserva/{id}', [CitaController::class, 'create']);
    Route::get('/citas/{id}/edit', [CitaController::class, 'edit']);
    Route::post('/citas', [CitaController::class, 'store']);
    Route::put('/citas/{id}', [CitaController::class, 'update']);
    Route::delete('/citas/{id}', [CitaController::class, 'destroy']);

    // Logout (Solo tiene sentido si ya estás dentro)
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

