@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Editar Boleto</h1>-->
@stop

@section('content')
<h2>Editar Boleto</h2>
<form action="{{ route('Boleto.update', $boleto->id) }}" method="POST"><br>
    @csrf
    @method('PUT') <!-- Indica que es una actualización -->
    <input type="hidden" name="id_horario" value="{{ $horario->id }}">

    <div class="row">
        <!-- Columna izquierda con los datos del cliente, input de Asiento y demás detalles -->
        <div class="col-md-5">
            <!-- Selección de Cliente -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Cliente:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('id_cliente') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('id_cliente') ? ' is-invalid' : '' }}" name="id_cliente" id="input-id_cliente" required>
                            <option value="" disabled>Seleccione un Cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $boleto->id_cliente == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }} {{ $cliente->Ap_Materno }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_cliente'))
                        <span id="id_cliente-error" class="error text-danger">{{ $errors->first('id_cliente') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- N° Asiento -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('N° Asiento:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Asiento') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('Asiento') ? ' is-invalid' : '' }}"
                            name="Asiento"
                            id="input-Asiento"
                            type="number"
                            value="{{ old('Asiento', $boleto->Asiento) }}"
                            required
                            readonly />
                        @if ($errors->has('Asiento'))
                        <span id="Asiento-error" class="error text-danger">{{ $errors->first('Asiento') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- N° Minibús -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('N° Minibús:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Num_Minibus') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Num_Minibus') ? ' is-invalid' : '' }}" type="number" name="Num_Minibus" id="input-Num_Minibus" placeholder="Num_Minibus" min="1" value="{{$horario->asignarminibus->minibus->Num_Minibus }}" required readonly />
                        @if ($errors->has('Num_Minibus'))
                        <span class="error text-danger">{{ $errors->first('Num_Minibus') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Ruta -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Ruta:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Ruta') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Ruta') ? ' is-invalid' : '' }}" type="text" name="Ruta" id="input-Ruta" placeholder="Ruta" min="1" value="{{$horario->ruta->Origen}} - {{$horario->ruta->Destino}}" required readonly />
                        @if ($errors->has('Ruta'))
                        <span class="error text-danger">{{ $errors->first('Ruta') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Precio -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Precio:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Precio') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Precio') ? ' is-invalid' : '' }}" name="Precio" id="input-Precio" type="number" step="0.01" placeholder="{{ __('0,00') }}" value="{{ old('Precio', number_format($horario->ruta->Precio, 2, '.', '')) }}" required="true" onblur="formatPrecio(this)" readonly />
                        @if ($errors->has('Precio'))
                        <span id="Precio-error" class="error text-danger" for="input-Precio">{{ $errors->first('Precio') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Fecha -->
            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Fecha:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Fecha') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Fecha') ? ' is-invalid' : '' }}" type="date" name="Fecha" id="input-Fecha" value="{{ old('Fecha', $boleto->horario->Fecha) }}" required readonly />
                        @if ($errors->has('Fecha'))
                        <span class="error text-danger">{{ $errors->first('Fecha') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-4 col-form-label">{{ __('Hora:') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Hora') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('Hora') ? ' is-invalid' : '' }}" type="time" name="Hora" id="input-Hora" value="{{ old('Hora', $boleto->horario->Hora) }}" required readonly />
                        @if ($errors->has('Hora'))
                        <span class="error text-danger">{{ $errors->first('Hora') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="col-sm-1">
                <a href="{{ route('Cliente.create')}}" class="btn btn-info" style="width: 50px; margin-left: -50px; font-weight: bold; font-size: 18px">+</a>
            </div>
        </div>

        <!-- Columna derecha con el área para seleccionar asiento -->
        <div class="col-md-3" style="margin-left: -70px">
            <div class="row">
                <label class="col-sm-12 col-form-label">{{ __('Seleccionar Asiento:') }}</label>
                <div class="col-sm-12">
                    <div class="container">
                        @for ($i = 1; $i <= $horario->asignarMinibus->minibus->Num_Asientos; $i++)
                            @if ($i % 3 == 1)
                            <!-- Nueva fila cada 3 asientos -->
                            <div class="row mb-2">
                                @endif

                                <!-- Botón para cada asiento, con un color diferente para el asiento ocupado -->
                                <div class="col-4 d-flex justify-content-center align-items-center">
                                    <label class="btn mx-1 
                            {{ 
                                $i == 1 ? 'btn-danger' :  // Asiento 1 siempre rojo
                                (in_array($i, $asientosOcupados) ? 'btn-warning' : 'btn-secondary') 
                            }} 
                            seat-button" id="seat-{{ $i }}">
                                        <!-- Input tipo radio oculto -->
                                        <input
                                            type="radio"
                                            name="asiento_radio"
                                            value="{{ $i }}"
                                            @if (in_array($i, $asientosOcupados) || $i==1) disabled @endif
                                            onclick="setAsiento({{ $i }})"
                                            class="invisible-radio"
                                            @if ($boleto->Asiento == $i) checked @endif>
                                        <div class="seat-number">{{ $i }}</div>
                                    </label>
                                </div>

                                @if ($i % 3 == 0 || $i == $horario->asignarMinibus->minibus->Num_Asientos)
                                <!-- Cerrar la fila después de cada 3 asientos o al final -->
                            </div>
                            @endif
                            @endfor
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <a href="/Boleto" class="btn btn-warning" style="margin-left: 230px" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">ACTUALIZAR</button>
    </div>
</form>

<br>

<div class="row">
    <button id="generateQR" class="btn btn-primary" style="margin-left: 29%; width: 105px;">PAGAR QR</button>
    <!-- Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #95d8f5">
                    <h3 class="modal-title" id="qrModalLabel" style="margin-left: 93px;"><strong>Código QR para el Pago</strong></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" 
                    style=" width: 40px; height:40px; background-color: #e65a51; font-size: 20px;"><strong>x</strong></button>
                </div>
                <div class="modal-body text-center" style="background-color: #6a6a6a; color:white">
                    <h6><strong>Escanea este código QR para realizar el pago</strong></h6>
                    <!-- Contenedor para el código QR -->
                    <canvas id="qrcodeCanvas" style="margin-top: 2px; border-radius: 13px;"></canvas>
                </div>
                <div class="modal-footer" style="background-color: #f4acac">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background: #3186c9">CERRAR</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
<!-- Bootstrap CSS and JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    #input-Asiento {
        font-weight: bold;
        width: 70px;
        height: 70px;
        font-size: 30px;
        text-align: center;
        border: 3px solid #ccc;
        border-radius: 10px;
        padding: 0;
    }

    .invisible-radio {
        display: none;
    }

    .btn {
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 18px;
    }

    .seat-button {
        border-radius: 10px;
        font-weight: bold;
        width: 80px;
        height: 80px;
        margin: 5px;
        min-width: 60px;
        max-width: 60px;
        min-height: 60px;
        max-height: 60px;
        background-image: url('{{ asset("Imagenes/A3.png") }}');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .seat-number {
        margin-bottom: 18px;
        position: absolute;
        color: white;
        font-size: 24px;
        font-weight: bold;
        z-index: 1;
    }

    .btn-secondary {
        background-color: rgba(214, 234, 248);
    }

    .btn-danger {
        background-color: rgba(220, 53, 69, 0.7);
    }

    .btn-success {
        background-color: rgba(40, 167, 69, 0.7);
    }
</style>

<script>
    function setAsiento(asiento) {
        // Evitar la selección del asiento 1, ya que está deshabilitado
        if (asiento === 1) {
            document.getElementById('input-Asiento').value = '';
            alert('El asiento 1 no está disponible.');
            return;
        }

        // Actualizar el input con el asiento seleccionado
        document.getElementById('input-Asiento').value = asiento;

        // Total de asientos
        const totalAsientos = {{ $horario->asignarMinibus->minibus->Num_Asientos }};

        // Primero, restablecemos todos los asientos a su color predeterminado
        for (let i = 1; i <= totalAsientos; i++) {
            const button = document.getElementById(`seat-${i}`);
            if (button) {
                // Restablecer todos los botones a su color original
                button.classList.remove('btn-success', 'btn-warning', 'btn-danger', 'btn-secondary');
                
                // Aseguramos que el asiento 1 sea siempre rojo
                if (i === 1) {
                    button.classList.add('btn-danger');
                }
                // Verificamos si el asiento está ocupado
                else if ({{ json_encode($asientosOcupados) }}.includes(i)) {
                    button.classList.add('btn-warning');
                } 
                else {
                    button.classList.add('btn-secondary');
                }
            }
        }

        // Cambiar el color del asiento seleccionado a verde (btn-success)
        const selectedButton = document.getElementById(`seat-${asiento}`);
        if (selectedButton) {
            selectedButton.classList.remove('btn-secondary', 'btn-warning', 'btn-danger');
            selectedButton.classList.add('btn-success');  // Aquí cambiamos a verde
        }
    }


    document.getElementById('generateQR').addEventListener('click', function () {
        // Obtener los valores de los campos del formulario
        const clienteSelect = document.getElementById('input-id_cliente');
        const cliente = clienteSelect.options[clienteSelect.selectedIndex].text; 
        const fecha = document.getElementById('input-Fecha').value.trim();
        const hora = document.getElementById('input-Hora').value.trim();
        const precio = document.getElementById('input-Precio').value.trim();
        const ruta = document.getElementById('input-Ruta').value;
        const minibus = document.getElementById('input-Num_Minibus').value;
        const asiento = document.getElementById('input-Asiento').value;

        // Verificar si todos los campos están completos
        if (!cliente ||!fecha ||!hora || !precio || !ruta || !minibus || !asiento) {
            alert("Por favor, completa todos los campos antes de generar el código QR.");
            return;
        }


        // Crear el texto que queremos en el código QR
        const qrData = `Cliente: ${cliente}\nFecha: ${fecha}\nHora: ${hora}\nPrecio: Bs ${precio}\nRuta: ${ruta}\nMinibús: ${minibus}\nAsiento: ${asiento}`;

        // Limpiar cualquier QR generado anteriormente
        const qrCanvas = document.getElementById('qrcodeCanvas');
        const context = qrCanvas.getContext('2d');
        context.clearRect(0, 0, qrCanvas.width, qrCanvas.height);

        // Generar el código QR
        QRCode.toCanvas(qrCanvas, qrData, { errorCorrectionLevel: 'H' }, function (error) {
            if (error) {
                console.error("Error al generar el código QR:", error);
                alert("Hubo un problema al generar el código QR. Inténtalo de nuevo.");
            } else {
                console.log('Código QR generado correctamente.');
            }
        });

        // Mostrar el modal
        const qrModal = new bootstrap.Modal(document.getElementById('qrModal'), {
            backdrop: 'static', // Evitar que se cierre haciendo clic fuera del modal
            keyboard: false     // Evitar que se cierre con la tecla Escape
        });
        qrModal.show();
    });
</script>
@stop
