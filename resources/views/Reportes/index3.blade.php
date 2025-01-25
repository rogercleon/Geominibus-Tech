@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<h1>Reportes Dinámicos</h1>
@stop

@php
use Carbon\Carbon;
@endphp

@section('content')

<div class="container">
    <h4>Reportes según la Edad</h4>
    <form action="{{ route('reportes.generar') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Seleccione:') }}</label>
                    <div class="col-sm-6">
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="clientes">Clientes</option>
                            <option value="conductores">Conductores</option>
                        </select>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Según edad:') }}</label>
                    <div class="col-sm-6">
                        <select name="edad_minima" id="edad_minima" class="form-control" required>
                            <option value="18">Mayor de 18 años</option>
                            <option value="30">Mayor de 30 años</option>
                            <option value="50">Mayor de 50 años</option>
                        </select>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" style="margin-left: 53%">GENERAR PDF</button>
            </div>
        </div>
    </form>
</div><br>

<div class="container">
    <h4>Reportes según el Minibús</h4>
    <form action="{{ route('reportes.generarMinibus') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Seleccione:') }}</label>
                    <div class="col-sm-6">
                        <select name="minibus" id="minibus" class="form-control" required>
                            @foreach(\App\Models\Minibuse::all() as $minibus)
                            <option value="{{ $minibus->id }}">Minibús {{ $minibus->Num_Minibus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" style="margin-left: 53%">GENERAR PDF</button>
            </div>
        </div>
    </form>
</div>
<br>

<div class="container">
    <h4>Reportes según Horarios</h4>
    <form action="{{ route('reportes.generarHorarios') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Seleccione:') }}</label>
                    <div class="col-sm-6">
                        <select name="ruta" id="ruta" class="form-control" required>
                            @foreach(\App\Models\Ruta::all() as $ruta)
                            <option value="{{ $ruta->id }}">{{ $ruta->Origen }} - {{ $ruta->Destino }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Según fecha:') }}</label>
                    <div class="col-sm-6">
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', date('Y-m-d')) }}" class="form-control">
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" style="margin-left: 53%">GENERAR PDF</button>
            </div>
        </div>
    </form>
</div><br>

<div class="container">
    <h4>Reporte según Boletos</h4>
    <form action="{{ route('reportes.generarBoletos') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Seleccione:') }}</label>
                    <div class="col-sm-6">
                        <select name="cliente" id="cliente" class="form-control" required>
                            @foreach(\App\Models\Cliente::all() as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }} {{ $cliente->Ap_Materno }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><br>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" style="margin-left: 53%">GENERAR PDF</button>
            </div>
        </div>
    </form>
</div><br>

<div class="container">
    <h4>Reporte según Encomiendas</h4>
    <form action="{{ route('reportes.generarEncomiendas') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Seleccione:') }}</label>
                    <div class="col-sm-6">
                        <select name="ruta" id="ruta" class="form-control" required>
                            @foreach(\App\Models\Ruta::all() as $ruta)
                            <option value="{{ $ruta->id }}">
                                {{ $ruta->Origen }} - {{ $ruta->Destino }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Según fecha:') }}</label>
                    <div class="col-sm-6">
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', date('Y-m-d')) }}" class="form-control" required>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" style="margin-left: 53%">GENERAR PDF</button>
            </div>
        </div>
    </form>
</div><br>




@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

@stop