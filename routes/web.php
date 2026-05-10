<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberiaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//PANEL

Route::get('/panel', function () {
    return view('panel');
});

//CRUD BARBERIAS

Route::get('/barberias', [BarberiaController::class, 'index']);
Route::get('/barberias/create', [BarberiaController::class, 'create']);
Route::post('/barberias', [BarberiaController::class, 'store']);
Route::get('/barberias/{id}/edit', [BarberiaController::class, 'edit']);
Route::put('/barberias/{id}', [BarberiaController::class, 'update']);
Route::delete('/barberias/{id}', [BarberiaController::class, 'destroy']);

// CRUD CITAS
Route::get('/citas', [CitaController::class, 'index']);
Route::get('/citas/create', [CitaController::class, 'create']);
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas/{id}/edit', [CitaController::class, 'edit']);
Route::put('/citas/{id}', [CitaController::class, 'update']);
Route::delete('/citas/{id}', [CitaController::class, 'destroy']);

// CRUD SERVICIOS
Route::get('/servicios', [ServicioController::class, 'index']);
Route::get('/servicios/create', [ServicioController::class, 'create']);
Route::post('/servicios', [ServicioController::class, 'store']);
Route::get('/servicios/{id}/edit', [ServicioController::class, 'edit']);
Route::put('/servicios/{id}', [ServicioController::class, 'update']);
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy']);

// CRUD USUARIOS
Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/create', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);