
<header>
    <div class="page-wraper">
        <nav class="navbar-expand-lg fixed-top bg-fonce shadow ">
            <div class="container">
                <div class="navbar-brand">
                    <a href="#">
                        <img src="{{ asset('assets/logos/armoirie-burkina-faso.png') }}" alt="Burkina Faso">
                        <h5 class="text-white text-left" style="float: left;">
                            <h5 class="text-white text-right">
                               
                                <small class="text-muted text-ombre"> INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)
                                </small>
                            </h5>
                    </a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class=" collapse navbar-collapse justify-content-center bg-nav" id="navbarNavAltMarkup">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('front-index')}}#apropos"><i class="fas fa-laptop"></i> A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('adddemande')}}"><i class="far fa-edit"></i> Faire une demande</a>
                    </li>
                   
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front-index')}}#contact"><i class="far fa-envelope"></i> Contact</a>
                    </li>

                    @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                   <i class="far fa-user"></i>  {{ __('Déconnexion') }}
                     </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else

                <li class="nav-item"><a class="nav-link" href="{{route('login-page')}}"><i class="far fa-user"> Connexion</i>
                @endauth

                   <!-- <li class="nav-item">
                    
            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
                          
                        
                            <a class="nav-link" href="{{ route('login-page') }}"><i class="far fa-user"></i> Connexion</a>
                       
                    </li>-->
                    <li class="nav-item">

                        <a class="nav-link"><img src="{{asset('assets/drapeau/burkina-faso-drapeau.png')}}" alt="Burkina Faso"></a>
                    </li>
                </ul>
            </div>
              </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
