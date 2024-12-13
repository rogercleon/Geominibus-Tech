@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')

@section('content_header')
<center></<b><h2>"MONITOREO DE BUSES"</h2></b></center>


@stop

@section('content')

    <div class="row">
        <label class="col-sm-2 col-form-label" style="width: 200px;">{{ __('Latitud:') }}</label>
        <div>
            <div class="form-group{{ $errors->has('Latitud') ? ' has-danger' : '' }}">
                <input readonly=»readonly class="form-control{{ $errors->has('Latitud') ? ' is-invalid' : '' }}" name="Latitud" id="input-Latitud" type="number" placeholder="{{ __('Latitud') }}" value="{{('-17.44506')}}" required="true" aria-required="true" />
                @if ($errors->has('Latitud'))
                <span id="Latitud-error" class="error text-danger" for="input-Latitud">{{ $errors->first('Latitud')}}</span>
                @endif
            </div>
        </div>

        <label class="col-sm-2 col-form-label" style="width: 200px; margin-left: 300px">{{ __('Fecha:') }}</label>
        <div>
            <div class="form-group{{ $errors->has('Fecha') ? ' has-danger' : '' }}">
                <input readonly=»readonly class="form-control{{ $errors->has('Fecha') ? ' is-invalid' : '' }}" name="Fecha" id="input-Fecha" type="date" placeholder="{{ __('Fecha') }}" value="<?php echo date("Y-m-d");?>" required="true" aria-required="true" />
                @if ($errors->has('Fecha'))
                <span id="Fecha-error" class="error text-danger" for="input-Fecha">{{ $errors->first('Fecha')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" style="width: 200px;">{{ __('Longitud:') }}</label>
        <div>
            <div class="form-group{{ $errors->has('Longitud') ? ' has-danger' : '' }}">
                <input readonly=»readonly class="form-control{{ $errors->has('Longitud') ? ' is-invalid' : '' }}" name="Longitud" id="input-Longitud" type="number" placeholder="{{ __('Longitud') }}" value="{{('-66.12922')}}" required="true" aria-required="true" />
                @if ($errors->has('Longitud'))
                <span id="Longitud-error" class="error text-danger" for="input-Longitud">{{ $errors->first('Longitud')}}</span>
                @endif
            </div>
        </div>
    </div>
<form action="/Mapa" method="POST">
     <!--<div id="map-layer"></div>-->
     <div id="map"></div>
    <script src="{{ asset('js/goglemap.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU03o5gGeEcLAWOdDouoAaGV6b6dHduN4&callback=initMap" async defer></script>

</form>

    <!--<div style="height: 500px;">
        {!! Mapper::render() !!}
    </div>-->
    <div style="height: 500px;">
        {!! Mapper::render() !!}
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
