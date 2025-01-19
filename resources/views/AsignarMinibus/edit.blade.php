@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Videojuegos</h1>-->
@stop

@section('content')
<h2>Editar Asignación de Minibús</h2>
<form action="{{ route('AsignarMinibus.update', $asignarminibus->id) }}" method="POST"><br>
    @csrf
    @method('PUT')

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Conductor:') }}</label>
        <div class="col-sm-3">
            <div class="form-group{{ $errors->has('id_conductor') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('id_conductor') ? ' is-invalid' : '' }}" name="id_conductor" id="input-id_conductor" required>
                    <option value="" disabled>Seleccione un conductor</option>
                    @foreach($conductores as $conductor)
                        <option value="{{ $conductor->id }}" {{ $asignarminibus->id_conductor == $conductor->id ? 'selected' : '' }}>
                            {{ $conductor->Nombre }} {{ $conductor->Ap_Paterno }} {{ $conductor->Ap_Materno }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('id_conductor'))
                <span id="id_conductor-error" class="error text-danger" for="input-id_conductor">{{ $errors->first('id_conductor') }}</span>
                @endif
            </div>
        </div>
        <div>
            <a href="{{ route('Conductor.create')}}" class="btn btn-info" style="margin-left: 15px">Nuevo Conductor</a>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Minibus:') }}</label>
        <div class="col-sm-3">
            <div class="form-group{{ $errors->has('id_minibus') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('id_minibus') ? ' is-invalid' : '' }}" name="id_minibus" id="input-id_minibus" required>
                    <option value="" disabled>Seleccione un minibús</option>
                    @foreach($minibuses as $minibus)
                        <option value="{{ $minibus->id }}" {{ $asignarminibus->id_minibus == $minibus->id ? 'selected' : '' }}>
                            {{ $minibus->Num_Minibus }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('id_minibus'))
                <span id="id_minibus-error" class="error text-danger" for="input-id_minibus">{{ $errors->first('id_minibus') }}</span>
                @endif
            </div>
        </div>
        <div>
            <a href="{{ route('Minibus.create')}}" class="btn btn-info" style="margin-left: 15px">Nuevo Minibús</a>
        </div>
    </div>

    <div class="container">
        <a href="/AsignarMinibus" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">ACTUALIZAR</button>
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
