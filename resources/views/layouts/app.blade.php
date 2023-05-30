<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Service en ligne ,Ministère de la Jeunesse et de la Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, burkina faso">
    <meta name="author" content="Gouvernement du burkina faso">
    <meta name="keywords" content="burkina faso, service en ligne, Ministère de la Jeunesse, Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, permis, auto école">

    <!-- FAVICON -->
        <link rel="icon" type="image/png"    href="{{ asset('assets/drapeau/burkina-faso-drapeau.png') }}" />

    <!-- TITLE -->
    <title>Opération Permis de Conduire</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />

    <!-- INTERNAL SINGLE-PAGE CSS -->
    <link href="{{ asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini">



    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        {{-- <div id="global-loader">
            <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
        </div> --}}

        @yield('log-content')

        
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>

    <!-- SPARKLINE JS -->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS -->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!-- RATING STAR JS -->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- EVA-ICONS JS -->
    <script src="{{ asset('assets/iconfonts/eva.min.js') }}"></script>

    <!-- INPUT MASK JS -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- CUSTOM SCROLL BAR JS-->
    <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>



    <!-- CUSTOM JS-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>