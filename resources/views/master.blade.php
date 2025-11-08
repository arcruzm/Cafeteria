<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #6b3b1f;">
        <div class="container justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item px-4 bg-light mx-2 my-1 rounded"><a class="nav-link text-dark font-weight-bold" href="{{ url('/') }}">Presentación</a></li>
                <li class="nav-item px-4 bg-light mx-2 my-1 rounded"><a class="nav-link text-dark font-weight-bold" href="{{ url('/pedidos') }}">Pedidos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!--bootstrap js-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>