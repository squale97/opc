<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Service en ligne ,Ministère de la Jeunesse et de la Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, burkina faso">
    <meta name="author" content="Gouvernement du burkina faso">
    <meta name="keywords" content="burkina faso, service en ligne, Ministère de la Jeunesse, Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, permis, auto école">

    <title>{{ config('app.name', 'Opération Permis de Conduire') }}</title>
    @include('layouts.usager.front-style')
</head>

<body class="diaboubalde">
    @include('layouts.front.menu')

    <main class="usager-main">
        <div data-spy="scroll" data-target="#navbar-eservice">
            <section class="entete" id="apropos">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 ">
                            @include('layouts.usager.sidebar')
                        </div>
                        <div class="col-md-9 usager-col-nav rounded bg-white p-3 py-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('layouts.usager.footer')
    @include('layouts.usager.front-scripte')
</body>

</html>