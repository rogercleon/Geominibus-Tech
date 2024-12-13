@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
    <!--<h1>Editar Cliente</h1>-->
@stop

@section('content')
    <h2>Editar Cliente</h2>
    <form action="{{ route('Cliente.update', $cliente->id) }}" method="POST"><br>
        @csrf
        @method('PUT')  <!-- Usamos PUT porque estamos actualizando un recurso -->

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('CI:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('CI') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('CI') ? ' is-invalid' : '' }}" name="CI" id="input-CI" type="number" placeholder="{{ __('CI') }}" value="{{ old('CI', $cliente->CI) }}" required="true" aria-required="true" />
                    @if ($errors->has('CI'))
                        <span id="CI-error" class="error text-danger" for="input-CI">{{ $errors->first('CI') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Nombre') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" id="input-Nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('Nombre', $cliente->Nombre) }}" required="true" aria-required="true" />
                    @if ($errors->has('Nombre'))
                        <span id="Nombre-error" class="error text-danger" for="input-Nombre">{{ $errors->first('Nombre') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Apellido Paterno:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Ap_Paterno') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Ap_Paterno') ? ' is-invalid' : '' }}" name="Ap_Paterno" id="input-Ap_Paterno" type="text" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('Ap_Paterno', $cliente->Ap_Paterno) }}" required="true" aria-required="true" />
                    @if ($errors->has('Ap_Paterno'))
                        <span id="Ap_Paterno-error" class="error text-danger" for="input-Ap_Paterno">{{ $errors->first('Ap_Paterno') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Apellido Materno:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Ap_Materno') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Ap_Materno') ? ' is-invalid' : '' }}" name="Ap_Materno" id="input-Ap_Materno" type="text" placeholder="{{ __('Apellido Materno') }}" value="{{ old('Ap_Materno', $cliente->Ap_Materno) }}" required="true" aria-required="true" />
                    @if ($errors->has('Ap_Materno'))
                        <span id="Ap_Materno-error" class="error text-danger" for="input-Ap_Materno">{{ $errors->first('Ap_Materno') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Fec Nacimiento:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Fecha_Nac') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Fecha_Nac') ? ' is-invalid' : '' }}" name="Fecha_Nac" id="input-Fecha_Nac" type="date" value="{{ old('Fecha_Nac', $cliente->Fecha_Nac) }}" required="true" aria-required="true" />
                    @if ($errors->has('Fecha_Nac'))
                        <span id="Fecha_Nac-error" class="error text-danger" for="input-Fecha_Nac">{{ $errors->first('Fecha_Nac') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Dirección:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Direccion') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Direccion') ? ' is-invalid' : '' }}" name="Direccion" id="input-Direccion" type="text" placeholder="{{ __('Dirección') }}" value="{{ old('Direccion', $cliente->Direccion) }}" required="true" aria-required="true" />
                    @if ($errors->has('Direccion'))
                        <span id="Direccion-error" class="error text-danger" for="input-Direccion">{{ $errors->first('Direccion') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Teléfono:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Telefono') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}" name="Telefono" id="input-Telefono" type="number" placeholder="{{ __('Teléfono') }}" value="{{ old('Telefono', $cliente->Telefono) }}" required="true" aria-required="true" />
                    @if ($errors->has('Telefono'))
                        <span id="Telefono-error" class="error text-danger" for="input-Telefono">{{ $errors->first('Telefono') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Correo:') }}</label>
            <div class="col-sm-3">
                <div class="form-group{{ $errors->has('Correo') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo" id="input-Correo" type="email" placeholder="{{ __('Correo') }}" value="{{ old('Correo', $cliente->Correo) }}" />
                    @if ($errors->has('Correo'))
                        <span id="Correo-error" class="error text-danger" for="input-Correo">{{ $errors->first('Correo') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="container">
            <a href="/Cliente" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
            <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">ACTUALIZAR</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Edición de Cliente');
    </script>
@stop
