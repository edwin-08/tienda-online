@extends('plantilla')
@section('body')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lógica - Orden de números</h1>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <form method="post" id="formOrganizarNumeros" class="was-validated">
                        <div class="form-group">
                            <label for="">Numero 1</label>
                            <input type="number" class="form-control" name="numero1" id="numero1">
                        </div>
                        <div class="form-group">
                            <label for="">Numero 2</label>
                            <input type="number" class="form-control" name="numero2" id="numero2">
                        </div>
                        <div class="form-group">
                            <label for="">Numero 3</label>
                            <input type="number" class="form-control" name="numero3" id="numero3">
                        </div>
                        <button type="button" class="btn btn-danger" onclick="organizarNumeros()">Organizar numeros</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    Números organizados
                </div>
                <div class="card-body" id="numeroOrganizados">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        organizarNumeros = () => {
            var num1 = $("#numero1").val()
            var num2 = $("#numero2").val()
            var num3 = $("#numero3").val()

            var data = $.ajax({
                url: "{{ route('ordenar.numero') }}",
                type: "POST",
                dataType: "json",
                data: {
                    num1,
                    num2,
                    num3
                }
            });
            data.done((res) => {
                if (res.status == true) {
                    document.getElementById('numeroOrganizados').innerHTML = res.numeros
                    document.getElementById('formOrganizarNumeros').reset()
                }
            })
            data.fail(() => {
                alert("Hubo u problema al procesar la solicitud")
            })
        }
    </script>
@endsection
