<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('presentacion');
});

Route::get('/pedidos', function () {
    return view('pedidos');
});