@extends('plantilla')
@section('body')
    <div class="card">
        <div class="card-header">
            Productos
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->producto }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('footer')
@endsection
