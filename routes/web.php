<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('presentacion');
});

Route::get('/generarPedido',
  [PedidoController::class,'getOrdenado']);

Route::get('/agregarProducto/{id}', [PedidoController::class, 'agregarProducto']);

Route::get('/ordenarProductos', [ProductoController::class, 'getProductos']);

Route::get('/ordenadoMas/{id}', [PedidoController::class, 'masCantidad']);

Route::get('/ordenadoMenos/{id}', [PedidoController::class, 'menosCantidad']);

Route::post('/grabarPedido', [PedidoController::class, 'grabarPedido']);

// Agregar rutas para administrar/eliminar pedidos
Route::get('/administrarPedidos', [PedidoController::class, 'administrarPedidos'])->name('administrar.pedidos');
Route::delete('/administrarPedidos/{id}', [PedidoController::class, 'eliminarPedido'])->name('administrar.pedidos.eliminar');