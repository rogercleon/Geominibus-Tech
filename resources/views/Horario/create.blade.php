@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Registrar Cliente</h1>-->
@stop

@section('content')
    <h2>Registro de Horarios</h2>
    <form action="/Horario" method="POST"><br>
        @csrf
        <!-- Campo para seleccionar la Ruta -->
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Ruta:') }}</label>
            <div class="col-sm-4">
                <div class="form-group{{ $errors->has('id_ruta') ? ' has-danger' : '' }}">
                    <select class="form-control{{ $errors->has('id_ruta') ? ' is-invalid' : '' }}" name="id_ruta" id="input-id_ruta" required>
                        <option value="" disabled selected>Seleccione una Ruta</option>
                        @foreach($rutas as $ruta)
                        <option value="{{ $ruta->id }}" {{ old('id_ruta') == $ruta->id ? 'selected' : '' }}>
                            {{ $ruta->Origen }} - {{ $ruta->Destino }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_ruta'))
                    <span id="id_ruta-error" class="error text-danger" for="input-id_ruta">{{ $errors->first('id_ruta') }}</span>
                    @endif
                </div>
            </div>
            @role('Administrador')
            <div>
                <a href="{{ route('Ruta.create')}}" class="btn btn-info" style="margin-left: 15px">Nueva Ruta</a>
            </div>
            @endrole
        </div>

        <!-- Campo para seleccionar la Asignación de Minibús -->
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('N° Minibús:') }}</label>
            <div class="col-sm-4">
                <div class="form-group{{ $errors->has('id_minibus') ? ' has-danger' : '' }}">
                    <select class="form-control{{ $errors->has('id_minibus') ? ' is-invalid' : '' }}" name="id_minibus" id="input-id_minibus" required>
                        <option value="" disabled selected>Seleccione un Minibús</option>
                        @foreach($asignaciones as $asignacion)
                        <option value="{{ $asignacion->id }}" {{ old('id_minibus') == $asignacion->id ? 'selected' : '' }}>
                            Minibús {{ $asignacion->minibus->Num_Minibus }} - Conductor: {{ $asignacion->conductor->Nombre }} {{ $asignacion->conductor->Ap_Paterno }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_minibus'))
                    <span id="id_minibus-error" class="error text-danger" for="input-id_minibus">{{ $errors->first('id_minibus') }}</span>
                    @endif
                </div>
            </div>
            @role('Administrador')
            <div>
                <a href="{{ route('AsignarMinibus.create')}}" class="btn btn-info" style="margin-left: 15px">Nuevo Minibús</a>
            </div>
            @endrole
        </div>

        <!-- Campo para la Fecha -->
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Fecha:') }}</label>
            <div class="col-sm-4">
                <div class="form-group{{ $errors->has('Fecha') ? ' has-danger' : '' }}"> 
                    <input class="form-control{{ $errors->has('Fecha') ? ' is-invalid' : '' }}" type="date" name="Fecha" id="input-Fecha" value="{{ old('Fecha', date('Y-m-d')) }}" required />
                    @if ($errors->has('Fecha'))
                    <span id="Fecha-error" class="error text-danger" for="input-Fecha">{{ $errors->first('Fecha') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Campo para la Hora -->
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Hora:') }}</label>
            <div class="col-sm-4">
                <div class="form-group{{ $errors->has('Hora') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Hora') ? ' is-invalid' : '' }}" name="Hora" id="input-Hora" type="time" value="{{ old('Hora', now()->format('H:i')) }}" required />
                    @if ($errors->has('Hora'))
                    <span id="Hora-error" class="error text-danger" for="input-Hora">{{ $errors->first('Hora') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Botones de Cancelar y Guardar -->
        <div class="container">
            <a href="{{ url()->previous() }}" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
            <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
            <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">GUARDAR</button>
        </div>
    </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop