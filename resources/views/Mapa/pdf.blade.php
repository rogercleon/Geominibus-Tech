<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Localizaciones</title>
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}"type="text/css">
</head>
<body>
    <h1 align="center" style="font-size: 35px;"><b>REPORTE DE LOCALIZACIONES<b></h1>
    <p style="font-size: 35px;"><b>___________________________________<b></p>
    <table align="center" cellspacing="5" cellpadding="5" border="3" id="localizaciones" class="table table-striped" style="width:90%" >
        <thead class="bg-primary text-white" bgcolor="#358391" style="text-emphasis-color: #FFFFFF;">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">LATITUD</th>
                <th scope="col">LONGITUD</th>
                <th scope="col">FECHA</th>
            </tr>
        </thead>
        <tbody class="bg-primary text-white" style="text-align:center">
            @foreach($localizaciones as $localizacion)
                <tr>
                    <td>{{$localizacion->id}}</td>
                    <td>{{$localizacion->Latitud}}</td>
                    <td>{{$localizacion->Longitud}}</td>
                    <td>{{$localizacion->Fecha}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
