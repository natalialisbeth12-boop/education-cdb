<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


// Redirige la raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// --- Rutas de autenticación (solo para invitados) ---
Route::middleware('guest')->group(function () {
    Route::get('/login',     [LoginController::class,    'mostrarLogin'])->name('login');
    Route::post('/login',    [LoginController::class,    'procesarLogin'])->name('login.post');

    Route::get('/registro',  [RegisterController::class, 'mostrarRegistro'])->name('registro');
    Route::post('/registro', [RegisterController::class, 'procesarRegistro'])->name('registro.post');
});

// Cerrar sesión
Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');

// --- Rutas protegidas (requieren autenticación) ---
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
});
