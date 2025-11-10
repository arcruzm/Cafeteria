@extends('master')

@section('title', 'Presentación')

@section('content')
    <main class="text-center bg-light px-4 py-5 rounded">
        <h1>Bienvenido a la Cafetería escolar</h1>
        <p class="lead">Disfruta de nuestros deliciosos productos y realiza tus pedidos en línea.</p>
        <img src="{{ asset('img/logo-cetis.png') }}" alt="Cafetería" class="img-fluid mt-4">
    </main>
@endsection