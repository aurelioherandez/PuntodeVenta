@extends('adminlte::page')

@section('title', 'Compras')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card">
                <div class="row container">
                    <div class="">
                        <a href="{{ route('compras.index') }}">
                            <button type="button"
                                class="bg-red-500 hover:bg-red-700 px-3 py-2 rounded-md text-white font-bold text-center">
                                <span class="fas fa-angle-left"></span>
                            </button>
                        </a>
                    </div>
                    <div class=" mx-auto text-teal-500 font-bold text-3xl">
                        COMPRAS
                    </div>
                </div>
                <div class="card-body">
                    <!---Tipo comprobante--->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                <input disabled type="text" class="form-control" value="Tipo de comprobante: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Tipo de comprobante" id="icon-form" class="input-group-text"><i
                                        class="fas fa-file"></i></span>
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->comprobante->tipo_comprobante }}">
                            </div>
                        </div>
                    </div>

                    <!---Numero comprobante--->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                <input disabled type="text" class="form-control" value="Número de comprobante: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Número de comprobante" id="icon-form" class="input-group-text"><i
                                        class="fas fa-hashtag"></i></span>
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->numero_comprobante }}">
                            </div>
                        </div>
                    </div>

                    <!---Proveedor--->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                <input disabled type="text" class="form-control" value="Proveedor: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Proveedor" id="icon-form" class="input-group-text"><i
                                        class="fas fa-user-tie"></i></span>
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->proveedore->persona->razon_social }}">
                            </div>
                        </div>
                    </div>

                    <!---Fecha--->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input disabled type="text" class="form-control" value="Fecha: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Fecha" id="icon-form" class="input-group-text"><i
                                        class="fas fa-calendar"></i></span>
                                <input disabled type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('d-m-Y') }}">
                            </div>
                        </div>
                    </div>

                    <!---Hora-->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                <input disabled type="text" class="form-control" value="Hora: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Hora" id="icon-form" class="input-group-text"><i
                                        class="fas fa-clock"></i></span>
                                <input disabled type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('H:i') }}">
                            </div>
                        </div>
                    </div>

                    <!---Impuesto--->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group" id="hide-group">
                                <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                <input disabled type="text" class="form-control" value="Impuesto: ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span title="Impuesto" id="icon-form" class="input-group-text"><i
                                        class="fas fa-percent"></i></span>
                                <input disabled type="text" id="input-impuesto" class="form-control"
                                    value="{{ $compra->impuesto }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="table-responsive border border-dark rounded-md">
                        <table class="table table-striped">
                            <thead class="bg-primary">
                                <tr class="align-top">
                                    <th class="text-white">Producto</th>
                                    <th class="text-white">Cantidad</th>
                                    <th class="text-white">Precio de compra</th>
                                    <th class="text-white">Precio de venta</th>
                                    <th class="text-white">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra->productos as $item)
                                    <tr>
                                        <td>
                                            {{ $item->nombre }}
                                        </td>
                                        <td>
                                            {{ $item->pivot->cantidad }}
                                        </td>
                                        <td>
                                            {{ $item->pivot->precio_compra }}
                                        </td>
                                        <td>
                                            {{ $item->pivot->precio_venta }}
                                        </td>
                                        <td class="td-subtotal">
                                            {{ $item->pivot->cantidad * $item->pivot->precio_compra }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5"></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Sumas:</th>
                                    <th id="th-suma"></th>
                                </tr>
                                <tr>
                                    <th colspan="4">IGV:</th>
                                    <th id="th-igv"></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Total:</th>
                                    <th id="th-total"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            display: flex;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }
    </style>
@endpush

@section('js')
    <script>
        //Variables
        let filasSubtotal = document.getElementsByClassName('td-subtotal');
        let cont = 0;
        let impuesto = $('#input-impuesto').val();

        $(document).ready(function() {
            calcularValores();
        });

        function calcularValores() {
            for (let i = 0; i < filasSubtotal.length; i++) {
                cont += parseFloat(filasSubtotal[i].innerHTML);
            }

            $('#th-suma').html(cont);
            $('#th-igv').html(impuesto);
            $('#th-total').html(round(cont + parseFloat(impuesto)));
        }

        function round(num, decimales = 2) {
            var signo = (num >= 0 ? 1 : -1);
            num = num * signo;
            if (decimales === 0) //con 0 decimales
                return signo * Math.round(num);
            // round(x * 10 ^ decimales)
            num = num.toString().split('e');
            num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
            // x * 10 ^ (-decimales)
            num = num.toString().split('e');
            return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
        }
        //Fuente: https://es.stackoverflow.com/questions/48958/redondear-a-dos-decimales-cuando-sea-necesario
    </script>
@stop
