<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

// Registra la ruta con Route::resource()[cite: 6]
Route::resource('productos', ProductoController::class);