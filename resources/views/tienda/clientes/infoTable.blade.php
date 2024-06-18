@extends('plantilla')
@section('body')
    <div class="card">
        <div class="card-header">
            Clientes
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->cedula }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('footer')
@endsection
