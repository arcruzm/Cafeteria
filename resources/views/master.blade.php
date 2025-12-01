<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    
    <nav class="navbar navbar-expand-md navbar-cafe">
        <div class="container justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item px-4 bg-light mx-2 my-1 rounded"><a class="nav-link text-dark font-weight-bold" href="{{ url('/') }}">Presentación</a></li>
                <li class="nav-item px-4 bg-light mx-2 my-1 rounded"><a class="nav-link text-dark font-weight-bold" href="{{ url('/ordenarProductos') }}">Pedidos</a></li>
                <li class="nav-item px-4 bg-light mx-2 my-1 rounded"><a class="nav-link text-dark font-weight-bold" href="{{ url('/administrarPedidos') }}">Administrar Pedidos</a></li>
            </ul>
        </div>
    </nav>

    @yield('titulo')

    <div class="container mt-4  content-bg">
        @yield('content')
    </div>

    <footer class="text-center py-3 mt-auto">
        <p class="mb-0">&copy; 2024 Cafetería Escolar. Todos los derechos reservados.</p>
    </footer>

    <!--bootstrap js-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>