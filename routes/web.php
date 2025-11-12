<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('presentacion');
});

Route::get('/ordenarProductos', [ProductoController::class, 'getProductos']);