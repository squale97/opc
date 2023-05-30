<div class="sticky-top">
    <div class="card a1 p-3 py-4">
       KABORE
        <hr />
        <div class="usager-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('demandesfront')}}">
                        <i class="fa fa-home fa-sm mr-3" aria-hidden="true"></i>
                        <small>Accueil</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adddemande')}}">
                        <i class="fa fa-file fa-sm mr-3" aria-hidden="true"></i>
                        <small>Nouvelle demande </small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listedemande')}}">
                        <i class="fa fa-file-pdf fa-sm mr-3" aria-hidden="true"></i>
                        <small>Demandes</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('liste-selectionnee')}}">
                        <i class="fa fa-users fa-sm mr-3" aria-hidden="true"></i>
                        <small>Liste des candidats selectionnés</small>
                    </a>
                </li>
               
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fa fa-user-circle fa-sm mr-3" aria-hidden="true"></i>
                        <small>Profil</small>
                    </a>
                </li> --}}
            </ul>
        </div>
        {{-- <hr />
        <div>
            <span><strong class="title-sidebar">Ce service pourait vous intérêsser</strong></span>
            
            <div class="card text-white  mb-3 my-backAnnim2 a1" style="background: #2a214c;">
                <div class="card-body">
                    <div class="card-text">
                        <h5 class="h5-text">
                            Première connexion ?
                        </h5>
                        <p>
                            <small>
                                Si vous ne disposez pas de compte ? Cliquez <a
                                    href="https://www.servicepublicconnect.gov.bf/oauth" target="_blank"
                                    rel="noopener noreferrer">ici</a> pour créer votre compte. Vous pouvez
                                accécez à tous les e-services du Burkina avec ce compte.
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>