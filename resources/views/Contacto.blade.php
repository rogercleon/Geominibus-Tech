<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Gestión y Monitoreo "Geominibus Tech"</title>

    <!-- Favicons -->
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File 
    <link href="assets/css/main.css" rel="stylesheet">  -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="shortcut icon" href="/public/Imagenes/LOGO2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/Principal.css')}}">
    <link rel="stylesheet" href="{{asset('css/Contacto.css')}}">

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
                    <input id="Buscador" type="search" placeholder=" Busqueda de Buses">
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
            <div class="page-header d-flex align-items-center">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class='text-center'>

                            <h2>Contactos</h2>
                        </div>
                        <div class="col-lg-5 text-left">
                            <p>¿Consultas? ¿Sugerencias? ¿Más información? Estamos atentos a todas tus dudas y preguntas las 24 horas del día, ofreciendo la mejor atención para todos los usuarios.</p>
                            <p>Escribenos ya...</p>
                        </div>
                        <div class="col-lg-8 text-center">
                            <p>Si deseas escribirnos directamente, nuestro Email es <strong>cbbe.roger.coyo.le@unifranz.edu.bo</strong></p>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Header -->
            <br><br>

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container">

                    <div class="row gy-4 justify-content-center">

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Ubicación:</h4>
                                    <p>Av. República esq. Pasaje Mairana</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>georgileonpinto@gmail.com</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Llamar a:</h4>
                                    <p>+591 68518859</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                    </div>


                    <div class="row justify-content-center mt-4">

                        <div class="col-lg-9">
                            <!--<form action="#" method="post" role="form" class="php-email-form">-->
                            <form action="https://formsubmit.co/5ed688f1c4770c145439f47a515a541d" method="POST" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="Nombre" class="form-control" id="name" placeholder="Su nombre completo" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="Correo Electrónico" id="email" placeholder="Su correo electrónico" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="Motivo" id="subject" placeholder="Motivo" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="Mensaje" rows="5" placeholder="Mensaje" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Cargando...</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Tú mensaje ha sido enviado. ¡Gracias!</div>
                                </div>
                                <div class="text-center"><button type="submit">ENVIAR MENSAJE</button></div>


                                <input type="hidden" name="_next" value="http://127.0.0.1:8000/Contacto">
                                <input type="hidden" name="_captcha" value="false">
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>
            </section><!-- End Contact Section -->
        </main>
        <br>
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
        <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!--<center>
        <div>
            <img src="https://w0.peakpx.com/wallpaper/732/469/HD-wallpaper-temsa-maraton-2020-exterior-passenger-bus-european-buses-tourist-bus-mountain-road-bus.jpg" style="width: 100%; height: 625px;">
        </div>
    </center>-->
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>