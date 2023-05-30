<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lettre de réponse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @page {
            margin: 10px 10px 10px 10px !important;
            padding: 10px 10px 10px 10px !important;
        }
        *{
            font-family: "Times New Roman";
        }
        body p{
            line-height: 20px;
        }
        
        .ministryName{
            font-weight: 900;
            font-size: 14px;
        }
        .ministryName hr{
            border-top: 1px dashed black;
            margin-top: 10px;
        }

        .mt-120{
            margin-top: 120px;
        }

        .ml_20{
            margin-left: -60px !important; 
        }

        .mt--2{
            margin-top: -5px;
        }
        .pdf-container{
            padding: 5px;
        }
        .pdf-header{
            width: 100% !important;
            margin-right: 0px;
        }
        .pdf-header .col1{
            position: absolute;
            left: 25px;
            width: 34% !important;
        }
        .pdf-header .col2{
            position: absolute;
            left: 42%;
            width: 10%;
            padding-left: 10px;
            padding-right: 50px;
			
        }
        .pdf-header .col3{
            width: 25%;
            position: absolute;
            right: 20px;
        }
        .container, .container > div, .container table tr{
            margin-right: 0 !important;
            padding-right: 0 !important;
        }
        .pdf-content{
            padding-top: 8em;
        }
        .pdf-intro{
            font-weight: 900;
            font-size: 3em;
            color: black;
        }
        .bottom-infos{
            font-size: 17px;
        }
        .signature{
            margin-left: 55%;
        }
        .director-name{
            font-size: 15px;
            text-decoration: underline;
        }
        .fs-17{
            font-size: 17px;
        }
        .ml_50p{
            margin-left: 50% !important;
        }
        .mt-125{
            position: absolute;
            bottom: 8%;
        }
        .mt-90{
            margin-top: 60px;
        }
        .mb--2{
            margin-bottom: -10px;
        }
        p.para{
            text-align: justify;
			margin-left: 6rem !important;
        }
        /* p.para::first-line {
            text-indent: 20px;
        } */
		.mx-6{line-height: 24px;}
    </style>
</head>

<body>
    <div class="pdf-container my-4">
        <div class="pdf-header  justify-content-between">
            <div class=" text-center">
               <strong>{{$parametre->ministere}}</strong>
			   <strong>{{$parametre->direction}}</strong>
            </div>
			<div class="col2">
                <img width="100" src="data:image/png;base64,{{ $logos }}"/>
            </div>
        </div>
        <div class="pdf-content">
            <div class="text-center  ministryName">
                <strong>
					OPERATION PERMIS DE CONDUIRE (OPC), EDITION {{Carbon\Carbon::parse($demande->session->date_ouverture)->format('Y')}}
            	</strong>
            </div>
            <div class="ml-4 fs-17 ">
                <div class="text-center">
                   <strong> <u>Récépissé d’inscription </u> </strong>
                </div>
                <div class="text-center mt-5">
					<strong>N° : </strong> {{$demande->numero}}
                </div> <br>
                
                <p class="para ">                   
					<strong class="mx-6">Nom :</strong>  {{ucfirst($demande->nom)}} <br>
					<strong class="mx-6">Prénom :</strong>  {{ucfirst($demande->prenom)}}<br>
					<strong class="mx-6">Date de naissance :</strong>  {{Carbon\Carbon::parse($demande->datenaissance)->format('d-m-Y')}}      <strong class="mx-6">à  </strong> {{$demande->lieunaissance}}<br>
					<strong class="mx-6">Sexe :</strong> @if ($demande->genre == 'M') Masculin @else Feminin				
					@endif <br>
					<strong class="mx-6">Reference {{$demande->typepiece}} :</strong>  {{$demande->reference}}  du  {{\Carbon\Carbon::parse($demande->datedelivrance)->format('d-m-Y')}}<br>
					<strong class="mx-6">Tél :</strong> {{$demande->telephone}}<br>
					<strong class="mx-6">Occupation actuelle :</strong> {{ucfirst($demande->occupation)}}<br>
					<strong class="mx-6">Catégorie de permis :</strong> {{$demande->permis}}<br>
					<strong class="mx-6">Montant versé :</strong> Non payé<br>
					{{-- <strong class="mx-6">Montant versé :</strong> {{$demande->montant_payement	}} f CFA<br> --}}
					<strong class="mx-6">Date d’inscription :</strong> {{Carbon\Carbon::parse($demande->created_at)->format('d-m-Y')}}<br>
                </p>
               
            </div>
        </div>
        
    </div>

</body>

</html>