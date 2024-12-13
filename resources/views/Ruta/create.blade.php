@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Rutas</h1>-->
@stop

@section('content')
<h2>Registro de Rutas</h2>
<form action="/Ruta" method="POST"><br>
    @csrf
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Origen:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Origen') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('Origen') ? ' is-invalid' : '' }}" name="Origen" id="input-Origen" required="true">
                    <option value="" disabled selected>Seleccione un Origen</option>
                    <option value="Torotoro">Torotoro</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Sucre">Sucre</option>
                </select>
                @if ($errors->has('Origen'))
                    <span id="Origen-error" class="error text-danger" for="input-Origen">{{ $errors->first('Origen') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Destino:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Destino') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('Destino') ? ' is-invalid' : '' }}" name="Destino" id="input-Destino" required="true">
                    <option value="" disabled selected>Seleccione un Destino</option>
                    <option value="Torotoro">Torotoro</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Sucre">Sucre</option>
                </select>
                @if ($errors->has('Destino'))
                    <span id="Destino-error" class="error text-danger" for="input-Destino">{{ $errors->first('Destino') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Precio:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Precio') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('Precio') ? ' is-invalid' : '' }}" name="Precio" id="input-Precio" type="number" step="0.01" placeholder="{{ __('Precio') }}" value="{{ old('Precio', '0.00') }}" required="true" />
                @if ($errors->has('Precio'))
                    <span id="Precio-error" class="error text-danger" for="input-Precio">{{ $errors->first('Precio') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <a href="/Ruta" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">GUARDAR</button>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function formatPrecio(input) {
        let value = parseFloat(input.value);
        if (!isNaN(value)) {
            input.value = value.toFixed(2).replace('.', ',');
        } else {
            input.value = '0,00';
        }
    }
</script>
@stop
