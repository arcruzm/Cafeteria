<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Ordenado;
use App\Models\Producto;

class PedidoController extends Controller
{
    //

      public function getOrdenado(){
        $ordenado = Ordenado::orderBy('cantidad','desc')->get();
        return view('generarPedido', compact('ordenado'));
  }

     public function agregarProducto($id){
        $ordenado = new Ordenado();
        $producto = Producto::find($id);
        $ordenado->producto_id = $producto->id;
        $ordenado->nombre = $producto->nombre;
        $ordenado->precio = $producto->precio;
        $ordenado->imagen = $producto->imagen;
        $ordenado->cantidad = 1;
        $ordenado->save();
        return redirect('/ordenarProductos');
  }

  public function masCantidad($id){
        $ordenado = Ordenado::find($id);
        $ordenado->cantidad += 1;
        $ordenado->save();
        return redirect('/generarPedido');
    }

    public function menosCantidad($id){
        $ordenado = Ordenado::find($id);
        if($ordenado->cantidad > 1){
            $ordenado->cantidad -= 1;
            $ordenado->save();
        } else {
            $ordenado->delete();
        }
        return redirect('/generarPedido');
    }
}
