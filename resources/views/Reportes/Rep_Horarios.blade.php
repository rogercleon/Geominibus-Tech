<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Horarios</title>
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin: 0;
            font-size: 18px;
        }

        h2 {
            text-align: center;
            margin: 0;
            font-size: 22px;
        }

        .title {
            margin-top: 35px;
            font-size: 24px;
        }

        .header {
            margin-top: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .header .info {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .header p {
            margin: 0;
            font-size: 12px;
        }

        .table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #358391;
            color: white;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
        }

        .page-number {
            position: fixed;
            bottom: 0;
            right: 0;
            font-size: 10px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="title">
        <h2><b>Sindicato Mixto de Transporte "21 de Noviembre"</b></h2>
    </div>

    <div class="header">
        <div style="display: inline-block;">
            <img src="{{ public_path('Imagenes/LOGO1.png') }}" style="width: 110px; height: 110px; margin-right: 20px;" alt="Logo">
        </div>
        <div style="display: inline-block;" class="info">
            <p><b>Dirección:</b> Av. República</p>
            <p><b>Teléfono:</b> +591 60393904</p>
            <p><b>Correo:</b> torotour@gmail.com</p>
            <p><b>Cochabamba - Bolivia</b></p>
        </div>
    </div>

    <p style="text-align: right; margin-right: 25px;"><b>Fecha:</b> {{ now()->format('d/m/Y') }}</p>

    <h1><b>REPORTE DE HORARIOS</b></h1>
    <p style="text-align: center; font-size: 14px; font-weight: bold;"><b>_______________________________________________________________________________________</b></p>

    @if($horarios->isNotEmpty())
    <table align="center" cellspacing="5" cellpadding="5" border="3" class="table table-striped" style="width:90%">
        <thead class="bg-primary text-white">
            <tr>
                <th>Ruta</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>N° Minibús</th>
                <th>Conductor</th>
                <th>Placa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->ruta->Origen }} - {{ $horario->ruta->Destino }}</td>
                <td>{{ \Carbon\Carbon::parse($horario->Fecha)->format('d/m/Y') }}</td>
                <td>{{ $horario->Hora }}</td>
                <td>{{ number_format($horario->ruta->Precio, 2) }} Bs.</td>
                <td>Minibús {{ $horario->asignarMinibus->minibus->Num_Minibus ?? 'N/A' }}</td>
                <td>
                    @if($horario->asignarMinibus && $horario->asignarMinibus->conductor)
                        {{ $horario->asignarMinibus->conductor->Nombre }} {{ $horario->asignarMinibus->conductor->Ap_Paterno }}
                    @else
                        Sin asignar
                    @endif
                </td>
                <td>{{ $horario->asignarMinibus->minibus->Placa ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <br><p style="text-align: center; font-size: 14px;"><strong>No se encontraron horarios para los filtros seleccionados.</strong></p>
    @endif

    <div class="footer">
        <p>Reporte generado por Sistema de Gestión y Monitoreo "Geominibus Tech"</p>
    </div>

    <div class="page-number">
        Página: {PAGE_NUM} de {PAGE_COUNT}
    </div>
</body>
</html>
