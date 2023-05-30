<!Doctype html>
<html lang="en" >
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Service en ligne ,Ministère de la Jeunesse et de la Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, burkina faso">
        <meta name="author" content="Gouvernement du burkina faso">
        <meta name="keywords" content="burkina faso, service en ligne, Ministère de la Jeunesse, Promotion de l’Entrepreneuriat des Jeunes, Inscription a l'opération permis de conduire, permis, auto école">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/drapeau/burkina-faso-drapeau.png') }}" />
        <title>{{ config('app.name', 'Opération Permis de Conduire') }}</title>
        @include('layouts.back.back-style')
	</head>

	<body class="app sidebar-mini">

		{{-- <div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div> --}}

		<div class="page">
			<div class="page-main">
                @include('layouts.back.aside-menu')
                @include('layouts.back.header')
                {{-- @include('layouts.back.navbar') --}}
                
                
                <!--Content-area open-->
                <div class="app-content">
                    <div class="side-app">
                        @yield('b-content')
                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>
            @include('layouts.back.side-bar')
            @include('layouts.back.footer')
            
            
        </div>
        
        @include('layouts.back.back-scripte')
        
	</body>
</html>