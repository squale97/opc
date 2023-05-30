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

		<style>
			div#logo img {
				width: 15%;
    			margin-top: 20%;
			}
			.h3 {
    font-size: 1.1rem;
    font-weight: 600;
}
hr {
    margin-top: 0rem;
    margin-bottom: 0rem;
}
		</style>
		

	</head>

	<body class="app sidebar-mini">

		
		<div class="page">
			<div class="container">
				<div class="row ">
					<div class="col-md-10 offset-md-1">
						<div class="card">
							<div class="card-body">
								
								<div class="row mt-8">
									<div class="col-lg-12 text-center ">
										<p class="h3">MINISTERE DES SPORTS, DE L’AUTONOMISATION DES JEUNES ET DE L’EMPLOI</p>
										<address>
											DIRECTION GENERALE DE LA JEUNESSE ET DE L’EDUCATION PERMANENTE
										</address>
									</div>
									<div class="col-lg-12 text-center mt-5 " id="logo">
										<img class="text-center" src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" >
										<address  class="text-center mt-6">
											OPERATION PERMIS DE CONDUIRE (OPC), EDITION {{Carbon\Carbon::parse($demande->session->date_ouverture)->format('Y')}}
										</address>
										{{-- <h1 class="text-center"> <u>Récépissé d’inscription </u> </h1> --}}
									</div>
								</div>
								<div class="container">
									<div class="row">
										
										<div class="col-lg-12 ml-9">
											<strong>N° : </strong>{{Carbon\Carbon::parse($demande->session->date_ouverture)->format('Y')}} _ {{random_int(0,1000)}}<br>
												<strong class="mx-6">Nom :</strong>  {{$demande->nom}}
											<strong class="mx-6">Prénom :</strong>  {{$demande->prenom}}<br>
											<strong class="mx-6">Date de naissance :</strong>  {{Carbon\Carbon::parse($demande->datenaissance)->format('d-m-Y')}}    <strong class="mx-6">lieu :</strong> {{$demande->lieunaissance}}<br>
											<strong class="mx-6">Sexe :</strong> {{$demande->genre}} <br>
											<strong class="mx-6">Reference {{$demande->typepiece}} :</strong>  {{$demande->reference}}  <br>
											<strong class="mx-6">Tél :</strong> {{$demande->telephone}}<br>
											<strong class="mx-6">Occupation actuelle :</strong> {{$demande->occupation}}<br>
											<strong class="mx-6">Catégorie de permis :</strong> {{$demande->permis}}<br>
											<strong class="mx-6">Montant versé :</strong> {{$demande->montant_payement	}} f CFA<br>
											<strong class="mx-6">Date d’inscription :</strong> {{Carbon\Carbon::parse($demande->created_at)->format('d-m-Y')}}<br>

										</div>
									</div>
								</div>
								<div class="card-footer text-center mt-5">
								Copyright © 2021 <a href="#">e-Burkina</a>. && <a href="#">OPC </a> Touts droits réservés.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	

		<script src="{{asset('assets/js/custom.js')}}"></script>

	</body>
</html>