@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Videojuegos</h1>-->
@stop

@section('content')
<h2>Editar Encomienda</h2>
<form action="{{ route('Encomienda.update', $encomienda->id) }}" method="POST"><br>
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Emisor -->
        <div class="col-sm-6">
            <div class="row">
                <label class="col-sm-3 col-form-label">{{ __('Emisor:') }}</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <select class="form-control" name="id_emisor" id="input-id_emisor" required>
                            <option value="" disabled>Seleccione un CI</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $encomienda->id_emisor == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->CI }} : {{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }}
                            </option>
                            @endforeach
                        </select>
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
                    <div class="form-group">
                        <select class="form-control" name="id_receptor" id="input-id_receptor" required>
                            <option value="" disabled>Seleccione un CI</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $encomienda->id_receptor == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->CI }} : {{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }}
                            </option>
                            @endforeach
                        </select>
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
                    <div class="form-group">
                        <input class="form-control" name="Fecha_Env" id="input-Fecha_Env" type="date" value="{{ old('Fecha_Env', $encomienda->Fecha_Env) }}" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Fecha de Recepción:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <input class="form-control" name="Fecha_Rec" id="input-Fecha_Rec" type="date" value="{{ old('Fecha_Rec', $encomienda->Fecha_Rec) }}" required />
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
                    <div class="form-group">
                        <select class="form-control" name="id_horario" id="input-id_horario" required>
                            <option value="" disabled>Seleccione un Horario</option>
                            @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}" {{ $encomienda->id_horario == $horario->id ? 'selected' : '' }}>
                                {{ $horario->ruta->Origen }} - {{ $horario->ruta->Destino }} "{{ $horario->Fecha }} : {{ $horario->Hora }}"
                            </option>
                            @endforeach
                        </select>
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
                    <div class="form-group">
                        <input class="form-control" name="PrecioTotal" id="input-PrecioTotal" type="number" step="0.01" value="{{ $encomienda->PrecioTotal }}" readonly />
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
                <th>Peso (Kg/Bs)</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encomienda->detalles as $index => $detalle)
            <tr>
                <td><input type="text" name="detalles[{{ $index }}][Descripcion]" class="form-control descripcion" value="{{ $detalle->Descripcion }}" required></td>
                <td><input type="number" name="detalles[{{ $index }}][Cantidad]" class="form-control cantidad" value="{{ $detalle->Cantidad }}" required></td>
                <td><input type="number" name="detalles[{{ $index }}][Peso]" class="form-control peso" value="{{ $detalle->Peso }}" required></td>
                <td><input type="number" name="detalles[{{ $index }}][Precio]" class="form-control precio" value="{{ $detalle->Precio }}" readonly></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <button type="button" id="add-row" class="btn btn-success" style="margin-left: 82%;"><i class="fas fa-edit"></i> Agregar Detalle</button>
    </div><br>

    <div class="row">
        <a href="/Encomienda" class="btn btn-warning" style="margin-left: 76%" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">ACTUALIZAR</button>
    </div>
</form>
@stop

@section('js')
<script>
    let detallesCount = {{ isset($encomienda->detalles) ? count($encomienda->detalles) : 0 }}; // Para continuar con el índice correcto si ya existen detalles

    // Agregar una nueva fila de detalle
    $('#add-row').on('click', function () {
        detallesCount++;
        $('#detalles-table tbody').append(`
            <tr>
                <td><input type="text" name="detalles[${detallesCount}][Descripcion]" class="form-control" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Cantidad]" class="form-control cantidad" min="1" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Peso]" class="form-control peso" min="0" step="0.01" required></td>
                <td><input type="number" name="detalles[${detallesCount}][Precio]" class="form-control precio" readonly></td>
                <td><button type="button" class="btn btn-danger remove-row"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `);
    });

    // Eliminar una fila de detalle
    $(document).on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        calcularPrecioTotal(); // Recalcula el precio total después de eliminar la fila
    });

    // Calcular precio por detalle (peso y cantidad)
    $(document).on('input', '.peso, .cantidad', function () {
        const fila = $(this).closest('tr');
        const peso = parseFloat(fila.find('input[name*="Peso"]').val()) || 0;
        const cantidad = parseInt(fila.find('input[name*="Cantidad"]').val()) || 0;

        // Lógica de precios basada en el peso
        let precioBase = 15; // Precio inicial
        if (peso > 60) {
            precioBase = 50; // Peso mayor a 60 kg
        } else if (peso > 50) {
            precioBase = 30; // Peso entre 51 kg y 60 kg
        } else if (peso > 40) {
            precioBase = 25; // Peso entre 41 kg y 50 kg
        } else if (peso > 30) {
            precioBase = 20; // Peso entre 31 kg y 40 kg
        }

        // Calcular el precio total para la fila
        const precio = precioBase * cantidad;

        // Actualizar el campo Precio de la fila
        fila.find('.precio').val(precio.toFixed(2));

        // Recalcular el precio total general
        calcularPrecioTotal();
    });

    // Calcular el precio total general
    function calcularPrecioTotal() {
        let total = 0;

        // Iterar sobre cada precio en las filas
        $('.precio').each(function () {
            const precio = parseFloat($(this).val()) || 0;
            total += precio;
        });

        // Actualizar el valor del campo PrecioTotal
        $('#input-PrecioTotal').val(total.toFixed(2)); // Actualiza el input oculto o visible
        $('#precio-total').text(total.toFixed(2)); // Si tienes un campo en texto para mostrar el precio total
    }
</script>
@stop