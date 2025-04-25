<?php

use App\Http\Controllers\GanadorController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/', [RegistroController::class, 'index'])->name('register');
Route::post('/register', [RegistroController::class, 'store'])->name('register.store');
Route::get('/ciudades/{departamento}', [RegistroController::class, 'getCiudades']);
Route::post('/ganador', GanadorController::class )->name('sorteo.realizar');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
