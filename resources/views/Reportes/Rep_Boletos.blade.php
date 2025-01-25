<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Boletos</title>
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

    <h1><b>REPORTE DE BOLETOS</b></h1>
    <p style="text-align: center;">_______________________________________________________________________________________</p><br>

    <p style="text-align: left; margin-left: 245px;">CLIENTE: <b>{{ $cliente->Nombre }} {{ $cliente->Ap_Paterno }} {{ $cliente->Ap_Materno }}</b></p>
    <p style="text-align: left; margin-left: 245px;">CI: <b>{{ $cliente->CI }}</b></p>
    <p style="text-align: center;">_______________________________________________________________________________________</p>

    @if($boletos->isNotEmpty())
    <table align="center" class="table table-striped" style="width:90%">
        <thead class="bg-primary text-white">
            <tr>
                <th>Ruta</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>N° Minibús</th>
                <th>N° Asiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boletos as $boleto)
            <tr>
                <td>{{ $boleto->horario->ruta->Origen }} - {{ $boleto->horario->ruta->Destino }}</td>
                <td>{{ \Carbon\Carbon::parse($boleto->horario->Fecha)->format('d/m/Y') }}</td>
                <td>{{ $boleto->horario->Hora }}</td>
                <td>{{ number_format($boleto->Precio, 2) }} Bs.</td>
                <td>Minibús {{ $boleto->horario->asignarMinibus->minibus->Num_Minibus ?? 'N/A' }}</td>
                <td>Asiento {{ $boleto->Asiento }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <br><p style="text-align: center; font-size: 14px;"><strong>No se encontraron boletos para este cliente.</strong></p>
    @endif

    <div class="footer">
        <p>Reporte generado por Sistema de Gestión y Monitoreo "Geominibus Tech"</p>
    </div>
</body>
</html>
