@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security-Bus"')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Conductores</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="conductores-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Conductor.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-bus"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Minibuses</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="minibuses-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Minibus.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-map"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Rutas</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="rutas-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Ruta.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Clientes</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="clientes-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Cliente.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-red-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-calendar"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Horarios</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="horarios-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Horario.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-purple-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Boletos</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="boletos-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Boleto.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-yellow-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-truck"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Encomiendas</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0" id="encomiendas-count">
                                Cargando...
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('Encomienda.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />


@stop

@section('js')
<style>
    .btn btn-primary{
        font-size: 10px;
        font-weight: bold;
    }
    .card-title{
        font-size: 20px;
        font-weight: bold;
    }
    .card {
        font-weight: bold;
        background-color: #fff;
        border-radius: 15px;
        border: none;
        position: relative;
        margin-bottom: 20px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .l-bg-purple-dark {
        background: linear-gradient(to right, #41295a, #c39bd3) !important;
        color: #fff;
    }

    .l-bg-red-dark {
        background: linear-gradient(to right, #6a1b1b, #ec7063) !important;
        color: #fff;
    }

    .l-bg-yellow-dark {
        background: linear-gradient(to right, #1b2631, #aab7b8) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: -5px;
        top: 10px;
        right: 30px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/api/minibuses/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('minibuses-count').textContent = data.minibuses;
            })
            .catch(error => console.error('Error al cargar rutas:', error));
        fetch('/api/conductores/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('conductores-count').textContent = data.conductores;
            })
            .catch(error => console.error('Error al cargar conductores:', error));
        fetch('/api/boletos/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('boletos-count').textContent = data.boletos;
            })
            .catch(error => console.error('Error al cargar boletos:', error));
        fetch('/api/rutas/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('rutas-count').textContent = data.rutas;
            })
            .catch(error => console.error('Error al cargar rutas:', error));
        fetch('/api/clientes/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('clientes-count').textContent = data.clientes;
            })
            .catch(error => console.error('Error al cargar rutas:', error));
        fetch('/api/horarios/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('horarios-count').textContent = data.horarios;
            })
            .catch(error => console.error('Error al cargar rutas:', error));
        fetch('/api/encomiendas/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('encomiendas-count').textContent = data.encomiendas;
            })
            .catch(error => console.error('Error al cargar rutas:', error));
    });
</script>

@stop