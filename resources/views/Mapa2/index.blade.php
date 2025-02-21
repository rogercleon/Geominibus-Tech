@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')

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
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet" />

    <script src="https://unpkg.com/three@0.126.0/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


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


        <h3 class="seleccione">Seleccione un Minibús</h3>
        <select id="minibus-select" class="form-control" style="width: 20%; margin: 5px 5px 10px 35px;">
            <option value="" selected disabled>Seleccione un minibús</option>
            @foreach($minibuses as $minibus)
            <option value="{{ $minibus->id }}">Minibús {{ $minibus->Num_Minibus }}</option>
            @endforeach
        </select>

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

        <!--<div style="background: linear-gradient(to right, hsla(221, 65%, 51%, 0.61), hsla(9, 60%, 60%, 0.815)); background-size: cover; max-width: 100%;">
    <header>"Monitoreo de Minibuses"</header>
    <center>
        <h3>Seleccione un Minibús para mostrar su ruta</h3>
        <select id="minibus-select" class="form-control" style="width: 50%;">
            <option value="" selected disabled>Seleccione un minibus</option>
            @foreach($minibuses as $minibus)
            <option value="{{ $minibus->id }}">{{ $minibus->Placa }} ({{ $minibus->Num_Minibus }})</option>
            @endforeach
        </select>
        <div id='map' style="height: 620px; margin-top: 20px;"></div>
    </center>
</div>-->
        <br>
        <footer>
            <h2 class="titulo-final">Copyright &copy; "Geominibus-Tech" | Sindicato Mixto de Transporte (GAMC) todos los derechos reservados 2024</h2>
        </footer>
        <br>
    </div>

</body>

</html>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css" rel="stylesheet" />

<style>
    /* Estilo global del Popup */
    .mapboxgl-popup {
        width: 350px;
        /* Ajustado para que el popup no sea tan grande */
        font-family: 'Arial', sans-serif;
        animation: fadeIn 0.7s ease-in-out;
    }

    /* Estilo para el contenido del Popup */
    .mapboxgl-popup-content {
        border: solid #a0c6e8 4px;
        background-color: #c1d6ed;
        /*background: rgb(160,198,232);
        background: linear-gradient(90deg, rgba(160,198,232,1) 0%, rgba(202,236,246,1) 50%, rgba(160,198,232,1) 100%);*/
        padding: 18px 5px 8px 5px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        color: #333;
        max-width: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Estilo de la cabecera del Popup (h3) */
    .mapboxgl-popup-content h3 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 7px;
    }

    /* Estilo de los párrafos dentro del Popup */
    .mapboxgl-popup-content p {
        font-size: 13px;
        margin: 0px 0px;
        color: #555;
        padding-left: 20px;
        text-align: left;
    }

    /* Resaltar los campos dentro del Popup */
    .mapboxgl-popup-content strong {
        color: #333;
        font-weight: bold;
        font-size: 14px;
    }

    /* Efecto hover (cuando el cursor pasa sobre el popup) */
    .mapboxgl-popup-content:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    /* Estilo de la flecha del Popup */
    .mapboxgl-popup-tip {
        border-color: #bcd3ee;
        border-top-color: #bcd3ee;
        border-color: transparent transparent #bcd3ee transparent;
    }

    /* Estilo para el botón de cerrar del Popup */
    .mapboxgl-popup-close-button {
        font-size: 14px;
        width: 20px;
        height: 20px;
        text-align: center;
        color: #333;
        background: #e25757;
        border-radius: 15%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .mapboxgl-popup-close-button:hover {
        background: #e74c3c;
        color: white;
    }

    /* Animación de desvanecimiento del Popup */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoicGExMjMiLCJhIjoiY2wwOHdxOXNlMDNmdzNrbXh4cHNvZDVldCJ9.4KFEbiatdIBLxigRTbDFCg';
    let map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-66.1524738, -17.395993], // Coordenadas iniciales (puedes ajustarlas)
        zoom: 12
    });

    let marker;
    let routeSourceId = null;

    // Generador de colores único por ID de minibús
    const getColorForId = (id) => {
        const colors = [
            '#FF6347', // Rojo tomate
            '#1E90FF', // Azul
            '#32CD32', // Verde
            '#FFD700', // Amarillo
            '#FF69B4', // Rosa
            '#8A2BE2', // Violeta
            '#FF4500', // Naranja oscuro
            '#2E8B57', // Verde mar
            '#4B0082', // Índigo
            '#00CED1' // Turquesa
        ];
        return colors[id % colors.length]; // Ciclo en la lista de colores
    };

    $('#minibus-select').on('change', function() {
        const minibusId = $(this).val();

        if (!minibusId) return;

        // Llamada AJAX para obtener coordenadas
        $.getJSON(`/mapbox/coordinates/${minibusId}`, function(coordinates) {
            if (marker) marker.remove();
            if (routeSourceId) {
                map.removeLayer(routeSourceId);
                map.removeSource(routeSourceId);
            }

            // Si hay coordenadas, crea la ruta y marcador
            if (coordinates.length > 0) {
                const route = coordinates.map(coord => [coord.Longitud, coord.Latitud]);

                // Colocar marcador en la última posición
                const lastCoord = route[route.length - 1];
                const color = getColorForId(minibusId);

                // Crear un marcador personalizado con Font Awesome
                const el = document.createElement('div');
                el.className = 'custom-marker';
                el.innerHTML = `<i class="fa-solid fa-van-shuttle" style="color: 000000; font-size: 25px;"></i>`;

                // **Nueva llamada AJAX para obtener información del minibús**
                $.getJSON(`/datos-minibus/${minibusId}`, function(minibusData) {
                    const {
                        Num_Minibus,
                        Placa,
                        Nombre,
                        Ap_Paterno,
                        Ap_Materno
                    } = minibusData;

                    // Crear un Popup con la información del minibús
                    const popup = new mapboxgl.Popup({
                        offset: 25
                    }).setHTML(`
                    <h3>Información del Minibús</h3>
                    <p><strong>Conductor:</strong> ${Nombre} ${Ap_Paterno} ${Ap_Materno}</p>
                    <p><strong>N° Minibús:</strong> ${Num_Minibus}</p>
                    <p><strong>Placa:</strong> ${Placa}</p>

                    
                `);

                    // Agregar el marcador personalizado al mapa y asociarlo con el Popup
                    marker = new mapboxgl.Marker(el)
                        .setLngLat(lastCoord)
                        .setPopup(popup) // Asociar el Popup al marcador
                        .addTo(map);

                    // Crear un ID único para la ruta
                    routeSourceId = `route-${minibusId}`;

                    // Agregar la ruta al mapa
                    map.addSource(routeSourceId, {
                        type: 'geojson',
                        data: {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'LineString',
                                coordinates: route
                            }
                        }
                    });

                    map.addLayer({
                        id: routeSourceId,
                        type: 'line',
                        source: routeSourceId,
                        layout: {
                            'line-join': 'round',
                            'line-cap': 'round'
                        },
                        paint: {
                            'line-color': color,
                            'line-width': 8
                        }
                    });

                    // Hacer zoom al último punto
                    map.flyTo({
                        center: lastCoord,
                        zoom: 15
                    });
                }).fail(function() {
                    alert('No se pudo obtener la información del minibús.');
                });
            } else {
                alert('No hay datos de geolocalización disponibles para este minibús.');
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

    /*map.addControl(
        new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }),
        'top-right',
    );*/
</script>
@stop