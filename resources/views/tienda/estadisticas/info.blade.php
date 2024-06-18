@extends('plantilla')
@section('body')
    <div class="card mb-3">
        <div class="card-header">
            Clientes con mas compras
        </div>
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Productos mas vendidos
        </div>
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Resumen
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info as $item)
                        <tr>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->producto }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>{{ $item->cantidad * $item->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('footer')
@endsection
