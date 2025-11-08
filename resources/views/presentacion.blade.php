@extends('master')

@section('title', 'Presentación')

@section('content')
    <div class="text-center mt-5 bg-light p-4 rounded">
        <h1>Bienvenido a la Cafetería escolar</h1>
        <p class="lead">Disfruta de nuestros deliciosos productos y realiza tus pedidos en línea.</p>
        <img src="{{ asset('images/cafeteria.jpg') }}" alt="Cafetería" class="img-fluid mt-4">
    </div>
@endsection