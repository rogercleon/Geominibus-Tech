@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Videojuegos</h1>-->
@stop

@section('content')
<h2>Registro de Roles</h2>
<form action="/Roles" method="POST"><br>
    @csrf
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre del Rol') }}" value="{{ old('name')}}" required="true" aria-required="true" />
                @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name')}}</span>
                @endif
            </div>
        </div>
    </div>

    <!--<div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Permisos:') }}</label>
        <div class="col-sm-10">
            <div class="form-group{{ $errors->has('permission') ? ' has-danger' : '' }}">
                <div class="row">
                    @foreach($permission->chunk(ceil($permission->count() / 3)) as $chunk)
                    <div class="col-md-4">
                        @foreach($chunk as $permiso)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" id="permission-{{ $permiso->id }}" value="{{ $permiso->id }}" {{ in_array($permiso->id, old('permission', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permission-{{ $permiso->id }}">
                                {{ $permiso->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @if ($errors->has('permission'))
                <span id="permission-error" class="error text-danger" for="input-permission">{{ $errors->first('permission') }}</span>
                @endif
            </div>
        </div>
    </div>-->

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Permisos:') }}</label>
        <div class="col-sm-10">
            <div class="form-group{{ $errors->has('permission') ? ' has-danger' : '' }}">
                <div class="row">
                    @foreach($permission->chunk(ceil($permission->count() / 3)) as $chunk)
                    <div class="col-md-4">
                        @foreach($chunk as $permiso)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" 
                                   name="permission[]" 
                                   id="permission-{{ $permiso->id }}" 
                                   value="{{ $permiso->id }}" 
                                   {{ in_array($permiso->id, old('permission', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permission-{{ $permiso->id }}">
                                {{ $permiso->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @if ($errors->has('permission'))
                <span id="permission-error" class="error text-danger" for="input-permission">{{ $errors->first('permission') }}</span>
                @endif
            </div>
        </div>
    </div>


    <div class="container">
        <a href="/Roles" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
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