<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Opération Permis de Conduire') }}</title>
        @include('layouts.front.front-style')
    </head>
    <body class="diaboubalde">
        @include('layouts.front.menu')

        <main>
            <div data-spy="scroll" data-target="#navbar-eservice">
                @yield('content')       
            </div>
        </main>

        @include('layouts.front.footer')
        @include('layouts.front.front-scripte')
    </body>
</html>
