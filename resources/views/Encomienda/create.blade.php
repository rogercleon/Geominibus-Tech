@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Registrar Encomienda</h1>-->
@stop

@section('content')
<h2>Registro de Encomiendas</h2>
<form action="{{ route('Encomienda.store') }}" method="POST"><br>
    @csrf
    <div class="row">
        <!-- Emisor -->
        <div class="col-sm-6">
            <div class="row">
                <label class="col-sm-3 col-form-label">{{ __('Emisor:') }}</label>
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('id_emisor') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('id_emisor') ? ' is-invalid' : '' }}" name="id_emisor" id="input-id_emisor" required>
                            <option value="" disabled selected>Seleccione un CI</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('id_emisor') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->CI }} : {{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_emisor'))
                        <span id="id_emisor-error" class="error text-danger">{{ $errors->first('id_emisor') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-1">
                    <a href="{{ route('Cliente.create')}}" class="btn btn-info" style="width: 50px; font-weight: bold; font-size: 18px">+</a>
                </div>
            </div>
        </div>

        <!-- Receptor -->
        <div class="col-sm-5">
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Receptor:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('id_receptor') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('id_receptor') ? ' is-invalid' : '' }}" name="id_receptor" id="input-id_receptor" required>
                            <option value="" disabled selected>Seleccione un CI</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('id_receptor') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->CI }} : {{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_receptor'))
                        <span id="id_receptor-error" class="error text-danger">{{ $errors->first('id_receptor') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-1">
                    <a href="{{ route('Cliente.create')}}" class="btn btn-info" style="width: 50px; font-weight: bold; font-size: 18px">+</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <label class="col-sm-3 col-form-label">{{ __('Fecha de Envío:') }}</label>
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('Fecha_Env') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Fecha_Env') ? ' is-invalid' : '' }}" name="Fecha_Env" id="input-Fecha_Env" type="date" value="{{ old('Fecha_Env', date('Y-m-d')) }}" required />
                        @if ($errors->has('Fecha_Env'))
                        <span id="Fecha_Env-error" class="error text-danger" for="input-Fecha_Env">{{ $errors->first('Fecha_Env') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Fecha de Recepción:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Fecha_Rec') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Fecha_Rec') ? ' is-invalid' : '' }}" name="Fecha_Rec" id="input-Fecha_Rec" type="date" value="{{ old('Fecha_Rec', date('Y-m-d')) }}" required />
                        @if ($errors->has('Fecha_Rec'))
                        <span id="Fecha_Rec-error" class="error text-danger" for="input-Fecha_Rec">{{ $errors->first('Fecha_Rec') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <label class="col-sm-3 col-form-label">{{ __('Horario:') }}</label>
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('id_horario') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('id_horario') ? ' is-invalid' : '' }}" name="id_horario" id="input-id_horario" required>
                            <option value="" disabled selected>Seleccione un Horario</option>
                            @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}" {{ old('id_horario') == $horario->id ? 'selected' : '' }}>
                                {{ $horario->ruta->Origen }} - {{ $horario->ruta->Destino }} "{{ $horario->Fecha }} : {{ $horario->Hora }}"
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_horario'))
                        <span id="id_horario-error" class="error text-danger">{{ $errors->first('id_horario') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-1">
                    <a href="{{ route('Horario.create')}}" class="btn btn-info" style="width: 50px; font-weight: bold; font-size: 18px">+</a>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Precio Total:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('PrecioTotal') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('PrecioTotal') ? ' is-invalid' : '' }}" name="PrecioTotal" id="input-PrecioTotal" type="number" step="0.01" placeholder="{{ __('0,00') }}" required="true" readonly />
                        @if ($errors->has('PrecioTotal'))
                        <span id="PrecioTotal-error" class="error text-danger" for="input-PrecioTotal">{{ $errors->first('PrecioTotal') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="row">
        <div class="col">
            <h4 class="">Detalles de Encomienda</h4>
        </div>
        <div class="col">
            <p><a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-info-circle"></i> Información</a></p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Dimesión / Precio <br>
                    0-50 cm/10 Bs <br>
                    50-100 cm/20 Bs <br>
                    100-200 cm/30 Bs
                </div>
            </div>
        </div>
        <div class="col">
        </div>
    </div>

    <table class="table table-striped table-hover table-bordered" id="detalles-table">
        <thead class="table-primary">
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Largo (cm/Bs)</th>
                <th>Ancho (cm/Bs)</th>
                <th>Alto (cm/Bs)</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="detalles[0][Descripcion]" class="form-control form-control-sm" required></td>
                <td><input type="number" name="detalles[0][Cantidad]" class="form-control form-control-sm cantidad" required></td>
                <td><input type="number" name="detalles[0][Largo]" class="form-control form-control-sm dimension" required></td>
                <td><input type="number" name="detalles[0][Ancho]" class="form-control form-control-sm dimension" required></td>
                <td><input type="number" name="detalles[0][Alto]" class="form-control form-control-sm dimension" required></td>
                <td><input type="number" name="detalles[0][Precio]" id="Precio" class="form-control form-control-sm precio" readonly></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        </tbody>
    </table>


    <div class="row">
        <button type="button" id="add-row" class="btn btn-success" style="margin-left: 82%;"><i class="fas fa-edit"></i> Agregar Detalle</button>
    </div><br>

    <div class="row">
        <a href="/Encomienda" class="btn btn-warning" style="margin-left: 76%" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">GUARDAR</button>
    </div>
</form>
@stop


@section('js')
<script>
    let detallesCount = 0;

    // Agregar una nueva fila de detalle
    $('#add-row').on('click', function() {
        detallesCount++;
        $('#detalles-table tbody').append(`
            <tr>
                <td><input type="text" name="detalles[${detallesCount}][Descripcion]" class="form-control" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Cantidad]" class="form-control cantidad" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Largo]" class="form-control dimension" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Ancho]" class="form-control dimension" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Alto]" class="form-control dimension" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Precio]" class="form-control precio" readonly></td>
                <td><button type="button" class="btn btn-danger remove-row"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `);
    });

    // Eliminar una fila de detalle
    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        calcularPrecioTotal();
    });

    // Calcular precio por detalle
    $(document).on('input', '.dimension, .cantidad', function() {
        const fila = $(this).closest('tr');
        const largo = parseFloat(fila.find('input[name*="Largo"]').val()) || 0;
        const ancho = parseFloat(fila.find('input[name*="Ancho"]').val()) || 0;
        const alto = parseFloat(fila.find('input[name*="Alto"]').val()) || 0;
        const cantidad = parseInt(fila.find('input[name*="Cantidad"]').val()) || 0;

        // Calcular precio para cada dimensión según las reglas
        const precioLargo = largo > 100 ? 30 : largo > 50 ? 20 : 10;
        const precioAncho = ancho > 100 ? 30 : ancho > 50 ? 20 : 10;
        const precioAlto = alto > 100 ? 30 : alto > 50 ? 20 : 10;

        // Calcular el precio total para la fila
        const precio = (precioLargo + precioAncho + precioAlto) * cantidad;

        // Actualizar el campo Precio de la fila
        fila.find('.precio').val(precio.toFixed(2));

        // Recalcular el precio total general
        calcularPrecioTotal();
    });

    // Calcular el precio total
    function calcularPrecioTotal() {
        let total = 0;
        // Iteramos sobre cada campo de precio
        $('.precio').each(function() {
            const precio = parseFloat($(this).val()) || 0;
            total += precio;
        });

        // Establecer el valor del campo PrecioTotal como número
        $('#input-PrecioTotal').val(total.toFixed(2)); // Aseguramos que el valor sea un número con 2 decimales
    }
</script>
@stop