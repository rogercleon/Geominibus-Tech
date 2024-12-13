@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Videojuegos</h1>-->
@stop

@section('content')
<h2>Registro de Usuarios</h2>
<form action="/Usuarios" method="POST"><br>
    @csrf
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name')}}" required="true" aria-required="true" />
                @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name')}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Correo:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Correo') }}" value="{{ old('email')}}" required="true" aria-required="true" />
                @if ($errors->has('email'))
                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email')}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Contraseña:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="text" placeholder="{{ __('Contraseña') }}" value="{{ old('password')}}" required="true" aria-required="true" />
                @if ($errors->has('password'))
                <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password')}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Confirmar contraseña:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('confirm_password') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" id="input-confirm_password" type="text" placeholder="{{ __('Confirmar contraseña') }}" value="{{ old('confirm_password')}}" required="true" aria-required="true" />
                @if ($errors->has('confirm_password'))
                <span id="confirm_password-error" class="error text-danger" for="input-confirm_password">{{ $errors->first('confirm_password')}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Rol:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('id_rol') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('id_rol') ? ' is-invalid' : '' }}" name="id_rol" id="input-id_rol" required>
                    <option value="" disabled selected>Seleccione un Rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('id_rol') == $rol->id ? 'selected' : '' }}>
                            {{ $rol->name }} 
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('id_rol'))
                <span id="id_rol-error" class="error text-danger" for="input-id_rol">{{ $errors->first('id_rol') }}</span>
                @endif
            </div>
        </div>
        <div>
            <a href="{{ route('Roles.create')}}" class="btn btn-info" style="margin-left: 15px">Nuevo Rol</a>
        </div>
    </div>

    <div class="container">
        <a href="/Usuarios" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
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