<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberiaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;

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

//CRUD BARBERIAS

Route::get('admin/barberias', [BarberiaController::class, 'index']);
Route::get('admin/barberias/create', [BarberiaController::class, 'create']);
Route::post('admin/barberias', [BarberiaController::class, 'store']);
Route::get('admin/barberias/{id}/edit', [BarberiaController::class, 'edit']);
Route::put('admin/barberias/{id}', [BarberiaController::class, 'update']);
Route::delete('admin/barberias/{id}', [BarberiaController::class, 'destroy']);


// CRUD SERVICIOS
Route::get('admin/servicios', [ServicioController::class, 'index']);
Route::get('admin/servicios/create', [ServicioController::class, 'create']);
Route::post('admin/servicios', [ServicioController::class, 'store']);
Route::get('admin/servicios/{id}/edit', [ServicioController::class, 'edit']);
Route::put('admin/servicios/{id}', [ServicioController::class, 'update']);
Route::delete('admin/servicios/{id}', [ServicioController::class, 'destroy']);

// CRUD USUARIOS
Route::get('admin/usuarios', [UserController::class, 'index']);
Route::get('admin/usuarios/create', [UserController::class, 'create']);
Route::post('admin/usuarios', [UserController::class, 'store']);
Route::get('admin/usuarios/{id}/edit', [UserController::class, 'edit']);
Route::put('admin/usuarios/{id}', [UserController::class, 'update']);
Route::delete('admin/usuarios/{id}', [UserController::class, 'destroy']);

// CRUD CITAS
Route::get('/admin/citas', [CitaController::class, 'index']);
Route::get('/admin/reserva/{id}', [CitaController::class, 'create']);
Route::get('/admin/citas/{id}/edit', [CitaController::class, 'edit']);
Route::post('/admin/citas', [CitaController::class, 'store']);
Route::put('/admin/citas/{id}', [CitaController::class, 'update']);
Route::delete('/admin/citas/{id}', [CitaController::class, 'destroy']);

//PANEL

Route::get('/panel', function () {
    return view('final.panel');
});