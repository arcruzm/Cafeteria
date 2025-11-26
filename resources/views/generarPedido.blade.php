@extends('master')

@section('title')
   Generar pedido
@stop


@section('titulo')
 <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
  <h1 class="col-8">Pedido</h1>
  <a href="{{ url('/ordenarProductos') }}"
   class="btn btn-success col-3 align-self-start">Seleccionar productos</a>
 </div>
@stop


@section('content')
<form action="{{ url('/grabarPedido') }}" method="POST">
   @csrf


<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Importe</th>
            <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
         @php
           $suma=0;
        @endphp
        @foreach($ordenado as $ordenados)
        <tr>
            <td>{{ $ordenados -> nombre }}</td>
            <td>
              <img style="width: 100px; height: 60px;"
               src="{{ asset('img/'.$ordenados->imagen) }}" alt="" />
            </td>
            <td>{{ $ordenados -> precio }}</td>
            <td>{{ $ordenados -> cantidad }}</td>
            <td>{{ $ordenados -> precio * $ordenados -> cantidad }}</td>
            <td>
                <a href="{{ url('/ordenadoMas') }}/{{$ordenados->id}}" class="btn btn-primary btn-sm">+</a>
                <a href="{{ url('/ordenadoMenos') }}/{{$ordenados->id}}" class="btn btn-secondary btn-sm">-</a>
            </td>
        </tr>
        @php
           $suma+=$ordenados -> precio * $ordenados -> cantidad;
        @endphp
        @endforeach
      </tbody>
    </table>
</div>
 <div class="row">
       <label for="" class="col-8 text-end" >Total pedido:</label>
       <input type="text" class="col-3 align-self-start" name="total" readonly
              value="{{$suma}}" required>  
   </div>
 <div class="row mb-2">
       <label for="" class="col-2">Nombre</label>
       <input type="text" class="col-4" name="nombre" required>  
   </div>
   <div class="row mb-2">
       <label for="" class="col-2">Origen</label>
       <input type="text" class="col-4" name="origen" required>  
   </div>
   <div class="row mb-2">
       <label for="" class="col-2">Fecha</label>
       <input type="datetime" class="col-4" name="fecha"
       value="<?php $currentDateTime = new DateTime('now');
               echo $currentDateTime->format('Y-m-d H:i:s');?>" >
        <input type="submit"
        class="btn btn-primary col-3 ms-5"
        value="Grabar pedido">
  </div>
   
</form>
@endsection
