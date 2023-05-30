<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet"/>

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">
		<style>
	
		</style>
		

	</head>

	<body class="app sidebar-mini">

		
		<div class="page">
			<div class="container">
					
						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-md-10 offset-md-1">
								<div class="card">
									<div class="card-body">
										
										<div class="row">
											<div class="col-lg-6 text-center">
												<p class="h3">{{$parametre->ministere}}</p>
										<address>
											{{$parametre->direction}}<br>
													
													INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)
												</address>
											</div>
											<div class="col-lg-6 text-center my-2" id="logo">
												<img class="text-center" src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" >
												<address  class="text-center">
													Burkina Faso<br>
													Unité - Progès - Justice
												</address>
											</div>
										</div>
										<hr>
										<p style=" margin-left: 220px !important;">
                        <h1 class="text-center"> Bonjour {{ $nom }}  ! </h1>
                        Un compte  a été créé sur la plateforme d' INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC) pour vous. <br>
                        Votre nom d'utilisateur est : <strong> {{$user->email}}</strong> <br>
                        Votre mot de passe est : <strong> {{$pasword}}</strong>
                    </p> 
									<div class="card-footer text-center mt-5">
									Copyright © 2022 Direction Générale de la Jeunesse et de l'Education Permanente (DGJEP)  Touts droits réservés.
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW-1 CLOSED -->
					</div>
				
			


			<!-- FOOTER -->
			
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- RATING STAR JS-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- EVA-ICONS JS -->
		<script src="{{asset('assets/iconfonts/eva.min.js')}}"></script>

		<script src="{{asset('assets/js/custom.js')}}"></script>

	</body>
</html>