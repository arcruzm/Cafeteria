<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Ordenado;
use App\Models\Producto;
use App\Models\Detalle;

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
    public function grabarPedido(Request $request){
        //grabar los datos del pedido
        $pedido = new Pedido();
        $datos = $request->input();
        //falta verificar que el total no este en cero
        $pedido->nombre= $datos["nombre"];
        $pedido->origen= $datos["origen"];
        $pedido->fecha= now();
        $pedido->total= $datos["total"];
        $pedido->save();
        //grabar los productos ordenados en detalle
       
          $ordenado = Ordenado::orderBy('nombre','asc')->get();
           //recorrer los ordenados
           foreach($ordenado as $ordenados){
              $detalle = new Detalle();
              $detalle->producto_id= $ordenados->id;
              $detalle->nombre= $ordenados->nombre;
              $detalle->precio= $ordenados->precio;
              $detalle->imagen= $ordenados->imagen;
              $detalle->cantidad= $ordenados->cantidad;
              $detalle->pedido_id= $pedido->id;
              $detalle->save();
           }
           //eliminar los ordenados
           foreach($ordenado as $ordenados){
               $ordenados->delete();
           }
        return redirect('/generarPedido');
    }

    // Nuevo: mostrar lista de pedidos
    public function administrarPedidos()
    {
        // cargar pedidos con conteo de detalles
        $pedidos = Pedido::orderBy('fecha', 'desc')->get();
        return view('administrarPedidos', compact('pedidos'));
    }

    // Nuevo: eliminar un pedido (y sus detalles)
    public function eliminarPedido($id)
    {
        $pedido = Pedido::findOrFail($id);

        // Eliminar detalles asociados
        Detalle::where('pedido_id', $pedido->id)->delete();

        $pedido->delete();

        return redirect()->route('administrar.pedidos')->with('success', 'Pedido eliminado correctamente.');
    }

}
