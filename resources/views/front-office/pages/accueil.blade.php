@extends('layouts.front.app')
@section('css')


@endsection


@section('content')
<section class="entete" id="apropos">
    <div class="container">

        <div class="row mb-1">
            <div class="col-md-9 col-sm-12">
                <div class="grande-acceuil d-md-flex justify-content-center my-hover tag1">
                    <div class="image-zone">
                        <img src="{{asset('assets/backgounds/opc.jpg')}}" alt="" class="accueil-image img-fluid">
                    </div>
                    <div class="accueil-text-zone card haut text-white mb-3 no-border p-3 card-bienvenu" >
                        <h1 class="h1-text">
                            Bienvenue sur le e-service d'inscription à l’Opération Permis de Conduire (OPC)
                        </h1>
                        <p class="">
                            L’Opération Permis de Conduire (OPC) répond à une demande sociale et constitue un moyen d’éducation à la sécurité routière des jeunes. 
                            Elle contribue également à l’amélioration de l’employabilité de ces derniers
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card haut text-white bg-warn mb-3 my-backAnnim carousel-img" style="background: #140939;">
                    <div class="card-body">
                        <div class="card-text">
                            <h1 class="h1-text">
                                Connexion
                            </h1>
                            <p class="mt-3">
                                La connexion au portail d'inscription à l'Opération Permis de Conduire
                                s'effectue à partie du SSO. Si vous disposez déjà d'un compte, cliquer sur
                                le bouton connexion puis saisissez votre nom d'utilisateur et votre mot de
                                passe.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 to-hide-on-mobile">
                
                <div class=" ">
                    <div id="cont_d94aaae47386f16fde4e6c8cf5e3372e">
                        <script type="text/javascript" async
                            src="https://www.tameteo.com/wid_loader/d94aaae47386f16fde4e6c8cf5e3372e"></script>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card text-white  mb-3 my-backAnnim2 a1" style="background: #2a214c;">
                    <div class="card-body">
                        <div class="card-text">
                            <h1 class="h1-text">
                                Première connexion ?
                            </h1>
                            <p>
                                Si vous ne disposez pas de compte ? Cliquez <a
                                    href="https://www.servicepublicconnect.gov.bf/oauth" target="_blank"
                                    rel="noopener noreferrer">ici</a> pour créer votre compte. Vous pouvez
                                accécez à tous les e-services du Burkina avec ce compte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white  mb-3 my-backAnnim3 a2" style="background: #2a214c;">
                    <div class="card-body">
                        <div class="card-text">
                            <h1 class="h1-text">
                                Problème de connexion ?
                            </h1>
                            <p>
                                Vous avez oublie votre mot de passe ?
                                Visitez <a href="https://www.servicepublicconnect.gov.bf/oauth" class=""
                                    target="_blank"> <strong> cette page </strong></a> puis cliquer sur le
                                lien <i>Mot de passe oublié</i> pour réinitialis er votre mot de passe
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white  mb-3 my-backAnnim a1" style="background-color: #2a214c;">
                    <div class="card-body">
                        <div class="card-text">
                            <h1 class="h1-text">
                                Tous les e-services
                            </h1>
                            <p>
                                Pour decouvrir la liste complète des e-service consulter le <a
                                    href="https://www.servicepublic.gov.bf/" target="_blank"
                                    rel="noopener noreferrer" class="text- "> <strong> site </strong></a> du
                                service public du Burkina.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="jumbotron" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-5">Contact</h1> <br>
                <p> <i class="fas fa-phone-square"></i> +226  71 86 89 16</p>

                <p> <i class="far fa-envelope"></i> <a class="text-dark"
                        href="mailto:lpilga@yahoo.fr">lpilga@yahoo.fr </a> </p>
                {{-- <p> <i class="far fa-envelope"></i> <a class="text-dark"
                        href="mailto:info@justice.gov.bf">info@jeunesse.gov.bf</a> </p> --}}
                <p> <i class="fas fa-university"></i>  01 BP 6705 Ouaga 01, Avenue de l´Indépendance,
                    Koulouba, Ouagadougou </p>
                <p> <i class="fas fa-globe"></i> Ouagadougou Burkina Faso</p>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.3890237534074!2d-1.5205469852509625!3d12.35685339126126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebfc495569c9f%3A0x8ae0bdd12d162a6b!2sDGJEP!5e0!3m2!1sfr!2sbf!4v1650374909596!5m2!1sfr!2sbf" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d401.7450176182544!2d-1.5169740556739784!3d12.372496453688509!3m2!1i1024!2i768!4f13.1!3m1!1m0!5e0!3m2!1sfr!2sbf!4v1640858251526!5m2!1sfr!2sbf" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    --}}
            </div>
        </div>


    </div>
</div>
@endsection


@section('js')

@endsection