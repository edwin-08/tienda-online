@extends('plantilla')
@section('body')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5>Sistema de Facturación</h5>
                </div>
                <div class="card-body">
                    <form id="formInfoGeneral" method="post">
                        <h6>Información del cliente</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cédula</label>
                                    <input type="number" onchange="buscarCliente(this.value)" class="form-control"
                                        name="cedula" id="cedula">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>Información del producto</h6>
                        <hr>
                        <div id="contenedor"></div>
                        <center>
                            <button type="button" class="btn btn-danger" onclick="agregarElemento()">Agregar
                                Producto</button>
                        </center>
                        <hr>
                        <center>
                            <button type="button" class="btn btn-success" onclick="generarVentaTienda()">Generar
                                Venta</button>
                        </center>
                    </form>
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
                    // document.getElementById('formOrganizarNumeros').reset()
                }
            })
            data.fail(() => {
                alert("Hubo u problema al procesar la solicitud")
            })
        }

        buscarCliente = (id) => {
            var data = $.ajax({
                url: "{{ route('search.cliente') }}",
                type: "POST",
                dataType: "json",
                data: {
                    id
                }
            });
            data.done((res) => {
                if (res.status == true) {
                    $("#nombre").val(res.info.nombre)
                    $("#email").val(res.info.email)
                }
            })
            data.fail(() => {
                alert("Hubo u problema al procesar la solicitud")
            })
        }

        buscarItem = (id, consecutivo) => {
            var data = $.ajax({
                url: "{{ route('search.item') }}",
                type: "POST",
                dataType: "json",
                data: {
                    id
                }
            });
            data.done((res) => {
                if (res.status == true) {
                    $("#nombre" + consecutivo).val(res.info[0].producto)
                    $("#precio" + consecutivo).val(res.info[0].price)
                }
            })
            data.fail(() => {
                alert("No hay existencias para este producto")
            })
        }


        let contador = 1;

        function agregarElemento() {
            let divBase = document.createElement('div');
            divBase.classList.add('row');
            divBase.innerHTML = `
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo${contador}">Código</label>
                        <input type="number" onchange="buscarItem(this.value, '${contador}')" class="form-control" name="codigo${contador}" id="codigo${contador}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre${contador}">Nombre</label>
                        <input type="text" class="form-control" name="nombre${contador}" id="nombre${contador}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="precio${contador}">Precio</label>
                        <input type="text" class="form-control" name="precio${contador}" id="precio${contador}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cantidad${contador}">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad${contador}" id="cantidad${contador}">
                    </div>
                </div>
            `;
            document.getElementById('contenedor').appendChild(divBase);
            contador++;
        }

        generarVentaTienda = () => {
            var form = new FormData(document.getElementById('formInfoGeneral'))
            form.append("valor", contador)
            var data = $.ajax({
                type: 'POST',
                url: "{{ route('save.info.venta') }}",
                data: form,
                contentType: false,
                cache: false,
                processData: false,
            })
            data.done((res) => {
                alert("Venta realizada con éxito")
                document.getElementById('formInfoGeneral').reset()
                document.getElementById('contenedor').innerHTML=""
            })
        }
    </script>
@endsection
