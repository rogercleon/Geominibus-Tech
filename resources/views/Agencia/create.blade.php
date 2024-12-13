@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')

@section('content_header')
    <!--<h1>Videojuegos</h1>-->
@stop

@section('content')
    <h2>Registro de Agencias</h2>
    <form action="/Agencia" method="POST"><br>
        @csrf
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('Agencia') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Agencia') ? ' is-invalid' : '' }}" name="Agencia" id="input-Agencia" type="text" placeholder="{{ __('Agencia') }}" value="{{ old('Agencia')}}" required="true" aria-required="true" />
                    @if ($errors->has('Agencia'))
                    <span id="Agencia-error" class="error text-danger" for="input-Agencia">{{ $errors->first('Agencia')}}</span>
                    @endif
                </div>
            </div>
        </div><br>
        <div class="container">
            <a href="/Agencia" class="btn btn-warning" style="margin-left: 590px" tabindex="4">CANCELAR</a>
            <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="5">GUARDAR</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
