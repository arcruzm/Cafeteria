@extends ('master')
@section ('title', 'Administrar Pedidos')
@section ('content')
    <main class="container py-4">
        <h1 class="mb-3 text-center">Administrar Pedidos</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($pedidos->isEmpty())
            <div class="alert alert-info">No hay pedidos registrados.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Origen</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->nombre }}</td>
                                <td>{{ $pedido->origen }}</td>
                                <td>{{ \Carbon\Carbon::parse($pedido->fecha)->format('Y-m-d H:i') }}</td>
                                <td>${{ number_format($pedido->total, 2) }}</td>
                                <td>
                                    <form action="{{ route('administrar.pedidos.eliminar', $pedido->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este pedido y sus detalles?');" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>
@endsection