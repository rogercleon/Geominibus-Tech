@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')
<?php
// CORRECION
$dbname = 'esp32_mysql';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost:3333';
//$dbhost = 'localhost';

$db = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$db) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM esp32_gps WHERE ID = (SELECT MAX(ID) FROM esp32_gps)";
$sql1 = "SELECT * FROM esp32_gps WHERE  DATE(Fecha) = CURRENT_DATE() ORDER BY Fecha";

$result = $db->query($sql);
if (!$result) { {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
$row = $result->fetch_assoc();

$result1 = $db->query($sql1);
if (!$result1) { {
        echo "Error: " . $sql1 . "<br>" . $db->error;
    }
}
$coordenadas = '';
while ($row1 = $result1->fetch_assoc()) {
    $id = $row1['ID'];
    $Latitude = $row1['Latitud'];
    $Longitude = $row1['Longitud'];
    //echo $n;
    //echo $k;
    $coordenadas = $coordenadas . "[" . $Longitude . "," . $Latitude . "],";
}


/*$rows = $result -> fetch_all(MYSQLI_ASSOC);
print_r($row);
header('Content-Type: application/json');
echo json_encode($rows);*/
?>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />

<link rel="stylesheet" href="{{asset('css/Monitoreo.css')}}">

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://unpkg.com/three@0.126.0/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./Imagenes/IOT.jpg">

    <script src="jquery.js"></script>
    <script src="mediaelement-and-player.min.js"></script>
    <link rel="stylesheet" href="mediaelementplayer.css" />
    <!--<script type="text/javascript" src="Actualizar.js"></script>-->
    <!--<script>
        setInterval(function(){
            location.href = location.href;
        }, 1000 * 5);
    </script>-->
</head>

<body>

    <div style="background: -webkit-linear-gradient(to right, hsla(219, 39%, 54%, 0.973), hsl(0, 31%, 57%)); background: linear-gradient(to right, hsla(221, 65%, 51%, 0.61), hsla(9, 60%, 60%, 0.815)); background-size: cover; background-attachment: fixed; max-width: 100%;">
        <br>
        <header>"Monitoreo de Minibuses"</header>
        <!--<h3>Prueba MapBox - Recepción de Datos de MySQL</h3>-->
        <div id="Contenedor">
            <div class="Geolocalizacion">
                <h2 id="h2">Datos de Geolocalización</h2>
                <div id="Localizacion">
                    <!--<div class="id">
                    <label class="Datos">ID: </label>
                    <input class="Recepcion" readonly="readonly" name="id" id="id" type="number" value="<?php echo $row['ID']; ?>" required="true" aria-required="true" />
                </div>-->
                    <div>
                        <label class="Datos">Latitud: </label>
                        <input class="Recepcion" readonly="readonly" name="Latitud" id="input-Latitud" type="number" value="<?php echo $row['Latitud']; ?>" required="true" aria-required="true" />
                    </div>
                    <div>
                        <label class="Datos">Longitud: </label>
                        <input class="Recepcion" readonly="readonly" name="Longitud" id="Longitud" type="number" value="<?php echo $row['Longitud']; ?>" required="true" aria-required="true" />
                    </div>
                </div>
                <div id="Estado">
                    <div class="id">
                        <label class="Datos">Fecha: </label>
                        <input class="Recepcion" readonly="readonly" name="Fecha" id="Fecha" type="text" value="<?php echo $row['Fecha']; ?>" required="true" aria-required="true" />
                    </div>
                    <div>
                        <label class="Datos">Velocidad: </label>
                        <input class="Recepcion" readonly="readonly" name="Velocidad" id="input-Velocidad" type="number" value="<?php echo $row['Velocidad']; ?>" required="true" aria-required="true" />
                    </div>
                </div>
            </div>
            <!--<div class="Space"></div>
        <div class="Bus">
            <h2 id="h2">Cámara de Vigilancia</h2>
            <div>-->
            <!--<video class='CamaraReal' width="100%" height="280" controls src="http://www.youtube.com/watch?v=OmxT8a9RWbE">
                    <source src="http://192.168.100.141:81/stream">
                    Your browser does not support the video tag.
                </video>

                <iframe width="100%" height="280"
                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>-->

            <!--<iframe width="100%" height="280"
                    src="http://0.tcp.sa.ngrok.io:14808/stream">
                </iframe>-->

            <!--<section id="buttons">
                    <button id="get-still">Get Still</button>
                    <button id="toggle-stream">Start Stream</button>
                    <button id="face_enroll" class="disabled" disabled="disabled">Enroll Face</button>
                </section>-->
            <!--<a id="Video" href="http://0.tcp.sa.ngrok.io:17128/stream">Presione para ir a la Cámara en tiempo Real</a>-->
            <!--<img src="http://192.168.100.141:81/stream" width="100%" height="280">-->

            <!--    </div>
        </div>-->
        </div>

        <center>
            <div id="menu">
                <input id="satellite-v9" type="radio" name="rtoggle" value="satellite">
                <label for="satellite-v9">Satélite</label>
                <input id="light-v10" type="radio" name="rtoggle" value="light">
                <label for="light-v10">Claro</label>
                <input id="dark-v10" type="radio" name="rtoggle" value="dark">
                <label for="dark-v10">Oscuro</label>
                <input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked">
                <label for="streets-v11">Calles</label>
                <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
                <label for="outdoors-v11">Aire Libre</label>
            </div>
            <div id='map' style="height: 620px;"></div>
        </center>
        <br>
        <footer>
            <h2 class="titulo-final">Copyright &copy; "Geominibus-Tech" | Sindicato Mixto de Transporte (GAMC) todos los derechos reservados 2024</h2>
        </footer>
        <br>

        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoicGExMjMiLCJhIjoiY2wwOHdxOXNlMDNmdzNrbXh4cHNvZDVldCJ9.4KFEbiatdIBLxigRTbDFCg';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [<?php echo $row['Longitud']; ?>, <?php echo $row['Latitud']; ?>],
                zoom: 15
            });

            const marker = new mapboxgl.Marker({
                    color: "#F92006",
                    draggable: true
                }).setLngLat([<?php echo $row['Longitud']; ?>, <?php echo $row['Latitud']; ?>])
                .addTo(map);

            map.on('load', () => {
                map.addSource('route', {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': [
                                <?php echo $coordenadas; ?>
                            ]
                        }
                    }
                });
                map.addLayer({
                    'id': 'route',
                    'type': 'line',
                    'source': 'route',
                    'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    'paint': {
                        'line-color': '#FF6347',
                        'line-width': 8
                    }
                });
            });

            const layerList = document.getElementById('menu');
            const inputs = layerList.getElementsByTagName('input');

            for (const input of inputs) {
                input.onclick = (layer) => {
                    const layerId = layer.target.id;
                    map.setStyle('mapbox://styles/mapbox/' + layerId);
                };
            }

            map.addControl(
                new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    placeholder: 'Ingrese un lugara buscar',
                    mapboxgl: mapboxgl
                }),
                'top-left'
            );

            map.addControl(new mapboxgl.NavigationControl(), 'top-left');
            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true,
            }), 'top-left');

            map.addControl(new mapboxgl.FullscreenControl(), 'top-left');

            map.addControl(
                new MapboxDirections({
                    accessToken: mapboxgl.accessToken
                }),
                'top-right',
            );
        </script>

    </div>
</body>

</html>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop