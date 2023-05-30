<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
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
											<h1 class="text-center mt-5"> Bonjour {{ $nom }}  ! </h1>
                        Votre dossier de demande d' INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC) a été retenu.
                        Veuillez  vous connecter sur <a href="https://opc.jeunesse.gov.bf/" target="_blank">la plateforme en ligne</a> pour compléter votre dossier avec les documents suivants :
                        <ul class="text-justify ml-3">
                            <li>une photocopie légalisée de la Carte Nationale d'Identité Burkinabè</li>
                            <li>une photocopie légalisée de l'extrait d'acte de naissance;</li>
                            <li>une fiche d'inscription dûment renseignée;</li>
                            <li>une fiche d'inscription dûment renseignée;</li>
                            <li>une fiche d'engagement légalisée;</li>
                            <li>Cinq (05) photos d'identité</li>
                            <li>une copie légalisée du diplôme exigé ;</li>
                            <li>une copie légalisée du permis C pour les postulants au permis D</li>
                        </ul>
                        
                    </p>
                    <p>
                       Merci de passer à la Direction Régionale ou Provinciale de la Jeunesse pour vous acquiter de votre contribution qui s'élève à :  {{ $parametre->montant_payement}} FCFA.        
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