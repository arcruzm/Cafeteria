@extends('master')
@section('title', 'ordenarProductos')

@section('titulo')
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
  <h1 class="col-8 align-self-start">Ordenar Productos</h1>
  <a href="{{url('/generarPedido')}}"
    class="btn btn-success btn-sm col-3 align-self-start">Ver Pedido</a>
</div>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto -> id }}</td>
            <td>{{ $producto -> nombre }}</td>
            <td>{{ $producto -> precio }}</td>
            <td>
                @if($producto->imagen)
                <img src="{{ asset('img/' . $producto->imagen) }}"
                    alt="{{ $producto->nombre }}"
                    class="img-thumbnail"
                    style="width:80px; height:auto;">
                @endif
            </td>
            <td>
                <a href="{{ url('/agregarProducto') }}/{{$producto->id}}"
                    class="btn btn-primary btn-sm">Agregar</a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection