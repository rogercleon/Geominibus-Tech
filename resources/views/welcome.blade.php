<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Gestión y Monitoreo "Geominibus Tech"</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="shortcut icon" href="/public/Imagenes/LOGO2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/Principal.css')}}">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <div>
        @if (Route::has('login'))
        <div style="background-color: #F5F8F9;" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

            @auth
            <a href="{{ url('/dash') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-success">Dashboard</a>
            <div style="background-color: #718096;">
                @else
                <a href="{{ route('login') }}" style="background-color:#5B6C71; color:#fff; margin-right: 15px;"><b>INICIAR SESIÓN</b></a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" style="background-color:#5B6C71; color:#fff;"><b>REGISTRO DE USUARIO</b></a>
                @endif
            </div>

            @endauth

        </div>
        @endif


        <header>
            <nav style="padding-left: 100px">
                <a href="/">Inicio</a>
                <a href="/Servicios">Servicios</a>
                <a href="/Acercade">Acerca de</a>
                <a href="/Contacto">Contacto</a>
                <a href="#">
                    <input id="Buscador" type="search" placeholder="">
                    <button id="Buscar" class="btn btn-primary" type="submit">Buscar</button>
                </a>
                    @if (Route::has('login'))
                    <div style="background-color: #5B6C71;" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

                        @auth
                        <a href="{{ url('/dash') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-success">Dashboard</a>
                        <div style="background-color: #5B6C71;">
                            @else
                            <a href="{{ route('login') }}" style="background-color:#5B6C71; color:#fff; margin-right: 15px;"><b>INICIAR SESIÓN</b></a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="background-color:#5B6C71; color:#fff;"><b>REGISTRO DE USUARIO</b></a>
                            @endif
                        </div>

                        @endauth

                    </div>
                    @endif
            </nav>

            <section class="textos-header">
                <h1>Sistema de Gestión y Monitoreo "Geominibus Tech"</h1>
                <h2>Sindicato Mixto de Transporte "21 de Noviembre"</h2>
            </section>
            <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #c7d8f7;"></path>
            </svg></div>
        </header>
        
        <main>
            <section class="contenedor sobre-nosotros">
                <h2 class="titulo">Sindicato Mixto de Transporte "21 de Noviembre"</h2>
                <div class="contenedor-sobre-nosotros">
                    <img src="Imagenes/TerminalCbba.jpg" alt="" class="imagen-about-us">
                    <div class="contenido-textos"><br><br>
                        <h3><span>1</span>Misión</h3>
                        <p>La misión del Sindicato Mixto de Transporte es servicios de transporte terrestre de calidad a la población de Cochabamba, tanto para pasajeros como para el envío de encomiendas, conectando destinos interdepartamentales e interprovinciales.</p>
                        <h3><span>2</span>Vision</h3>
                        <p>El Sindicato Mixto de Transporte tiene como visión ser reconocidos como la empresa líder en transporte terrestre en Cochabamba, destacándose por su confiabilidad, innovación en el servicio y expansión de rutas.</p>
                    </div>
                </div>
            </section>
            <section class="portafolio">
                <div class="contenedor">
                    <h2 class="titulo">Servicios a la población</h2>
                    <div class="galeria-port">
                        <div class="imagen-port">
                            <img src="Imagenes/MINI5.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="Imagenes/icono1.png" alt="">
                                <p>Transporte de Pasajeros</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="Imagenes/ENCO5.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="Imagenes/icono1.png" alt="">
                                <p>Envio de Encomiendas</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="Imagenes/TURI5.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="imImagenesg/icono1.png" alt="">
                                <p>Paquetes de Turismo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="Imagenes/HOSPE.jpg" alt="">
                            <div class="hover-galeria">
                                <img src="Imagenes/icono1.png" alt="">
                                <p>Información Hotelera</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--<section class="clientes contenedor">
                <h2 class="titulo">Fundadores del Sindicato de Transporte </h2>
                <div class="cards">
                    <div class="card">
                        <img src="Imagenes/MartynFord.jpg" alt="">
                        <div class="contenido-texto-card">
                            <h4>Fundador</h4>
                            <p>Martyn Ford, (Reino Unido, 26 de mayo de 1982), también conocido como The Nightmare or Hulk.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="Imagenes/JasonStatham.jpg" alt="">
                        <div class="contenido-texto-card">
                            <h4>Co-fundador</h4>
                            <p>Jason Statham (Inglaterra, 26 de julio de 1967) es un actor de cine, modelo y exclavadista británico.</p>
                        </div>
                    </div>
                </div>
            </section>-->
            
        </main>
        <footer>
            <div class="contenedor-footer">
                <div class="content-foo">
                    <h4>Teléfonos:</h4>
                    <p>4204142 - 4584512</p>
                </div>
                <div class="content-foo">
                    <h4>E-mail</h4>
                    <p>georgileonpinto@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>Localización</h4>
                    <p>Cbba - Bolivia</p>
                </div>
            </div>
            <h2 class="titulo-final">Copyright &copy; "Geominibus-Tech" | Sindicato Mixto de Transporte (GAMC) todos los derechos reservados 2024</h2>
        </footer>

    </div>

    <!--<center>
        <div>
            <img src="https://w0.peakpx.com/wallpaper/732/469/HD-wallpaper-temsa-maraton-2020-exterior-passenger-bus-european-buses-tourist-bus-mountain-road-bus.jpg" style="width: 100%; height: 625px;">
        </div>
    </center>-->
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>
