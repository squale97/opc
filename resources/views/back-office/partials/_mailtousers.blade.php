<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">
		<link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
		
		<!-- STYLE CSS -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet"/>

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">
	
		

	</head>

	<body class="app sidebar-mini">

		
		<div class="page">
			<div class="container">
					
						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-md-10 offset-md-1">
								<div class="card">
									<div class="card-body" id="mail">
										
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
						
											<h1 class="text-center mt-5"> Bonjour {{ $nom }}  ! </h1>
                        <p>
						Votre dossier de demande d' INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC) a été rejetée.
                      
					    
                        
                    </p>
                  
                           
									<div class="card-footer text-center mt-5">
									Copyright © 2022 - Direction Générale de la Jeunesse et de l'Education Permanente (DGJEP) - Touts droits réservés.
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