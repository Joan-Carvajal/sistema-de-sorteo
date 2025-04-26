<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GanadorController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistroController::class, 'index'])->name('register');
Route::post('/register', [RegistroController::class, 'store'])->name('register.store');
Route::post('/ganador', GanadorController::class )->name('sorteo');
Route::get('/exportar/excel', ExcelController::class )->name('exportar.excel');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
