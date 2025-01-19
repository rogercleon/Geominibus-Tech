@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<!--<h1>Videojuegos</h1>-->
@stop

@section('content')
<h2>Editar Minibús</h2>
<form action="/Minibus/{{ $minibus->id }}" method="POST"><br>
    @csrf
    @method('PUT')
    
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Número de Minibus:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Num_Minibus') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('Num_Minibus') ? ' is-invalid' : '' }}" 
                       name="Num_Minibus" 
                       id="input-Num_Minibus" 
                       type="number" 
                       placeholder="{{ __('Número de Minibus') }}" 
                       value="{{ old('Num_Minibus', $minibus->Num_Minibus) }}" 
                       required="true" 
                       aria-required="true" />
                @if ($errors->has('Num_Minibus'))
                    <span id="Num_Minibus-error" class="error text-danger" for="input-Num_Minibus">{{ $errors->first('Num_Minibus') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Número de Asientos:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Num_Asientos') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('Num_Asientos') ? ' is-invalid' : '' }}" 
                        name="Num_Asientos" 
                        id="Num_Asientos" 
                        style="text-align: center;">
                    @foreach([6, 7, 8, 9, 10, 11, 12, 13, 14, 15] as $asiento)
                        <option value="{{ $asiento }}" 
                                {{ old('Num_Asientos', $minibus->Num_Asientos) == $asiento ? 'selected' : '' }}>
                            {{ $asiento }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('Num_Asientos'))
                    <span id="Num_Asientos-error" class="error text-danger" for="input-Num_Asientos">{{ $errors->first('Num_Asientos') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Número de Chasis:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Num_Chasis') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('Num_Chasis') ? ' is-invalid' : '' }}" 
                       name="Num_Chasis" 
                       id="input-Num_Chasis" 
                       type="text" 
                       placeholder="{{ __('Número de Chasis') }}" 
                       value="{{ old('Num_Chasis', $minibus->Num_Chasis) }}" 
                       required="true" 
                       aria-required="true" />
                @if ($errors->has('Num_Chasis'))
                    <span id="Num_Chasis-error" class="error text-danger" for="input-Num_Chasis">{{ $errors->first('Num_Chasis') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Placa:') }}</label>
        <div class="col-sm-2">
            <div class="form-group{{ $errors->has('Placa') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('Placa') ? ' is-invalid' : '' }}" 
                       name="Placa" 
                       id="input-Placa" 
                       type="text" 
                       placeholder="{{ __('Placa') }}" 
                       value="{{ old('Placa', $minibus->Placa) }}" 
                       required="true" 
                       aria-required="true" />
                @if ($errors->has('Placa'))
                    <span id="Placa-error" class="error text-danger" for="input-Placa">{{ $errors->first('Placa') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <a href="/Minibus" class="btn btn-warning" style="margin-left: 150px" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="6">ACTUALIZAR</button>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Editando Minibus');
</script>
@stop