            <!--APP-SIDEBAR-->
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            <aside class="app-sidebar">
                <div class="side-header">
                    <a class="header-brand1" href="index.html">
                        <img src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" class="header-brand-img toggle-logo" alt="logo">
                        <img src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" class="header-brand-img light-logo" alt="logo">
                        <img src="{{asset('assets/logos/armoirie-burkina-faso.png')}}" class="header-brand-img light-logo1" alt="logo">
                    </a>
                    <!-- LOGO -->
                </div>
                <ul class="side-menu">
                    <li>
                        @if (Auth::user()->profile =="admin")
                        <h3>Operation Permis de conduite</h3>
                        @elseif(Auth::user()->profile =="auto-ecole")
                        <h3>Admin Auto ecole</h3>
                        @elseif(Auth::user()->profile =="dr")
                        <h3>Admin Direction Régionale</h3>
                        @else
                        <h3> Admin Direction Provinciale</h3>
                        @endif
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{route('dashboard')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="side-menu__icon" aria-hidden="true" role="img" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M512 188c-99.3 0-192.7 38.7-263 109c-70.3 70.2-109 163.6-109 263c0 105.6 44.5 205.5 122.6 276h498.8A371.12 371.12 0 0 0 884 560c0-99.3-38.7-192.7-109-263c-70.2-70.3-163.6-109-263-109zm-30 44c0-4.4 3.6-8 8-8h44c4.4 0 8 3.6 8 8v80c0 4.4-3.6 8-8 8h-44c-4.4 0-8-3.6-8-8v-80zM270 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44zm90.7-204.4l-31.1 31.1a8.03 8.03 0 0 1-11.3 0l-56.6-56.6a8.03 8.03 0 0 1 0-11.3l31.1-31.1c3.1-3.1 8.2-3.1 11.3 0l56.6 56.6c3.1 3.1 3.1 8.2 0 11.3zm291.1 83.5l-84.5 84.5c5 18.7.2 39.4-14.5 54.1a55.95 55.95 0 0 1-79.2 0a55.95 55.95 0 0 1 0-79.2a55.87 55.87 0 0 1 54.1-14.5l84.5-84.5c3.1-3.1 8.2-3.1 11.3 0l28.3 28.3c3.1 3.1 3.1 8.2 0 11.3zm43-52.4l-31.1-31.1a8.03 8.03 0 0 1 0-11.3l56.6-56.6c3.1-3.1 8.2-3.1 11.3 0l31.1 31.1c3.1 3.1 3.1 8.2 0 11.3l-56.6 56.6a8.03 8.03 0 0 1-11.3 0zM846 538v44c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8z" fill-opacity=".15" fill="currentColor"/><path d="M623.5 421.5a8.03 8.03 0 0 0-11.3 0L527.7 506c-18.7-5-39.4-.2-54.1 14.5a55.95 55.95 0 0 0 0 79.2a55.95 55.95 0 0 0 79.2 0a55.87 55.87 0 0 0 14.5-54.1l84.5-84.5c3.1-3.1 3.1-8.2 0-11.3l-28.3-28.3zM490 320h44c4.4 0 8-3.6 8-8v-80c0-4.4-3.6-8-8-8h-44c-4.4 0-8 3.6-8 8v80c0 4.4 3.6 8 8 8z" fill="currentColor"/><path d="M924.8 385.6a446.7 446.7 0 0 0-96-142.4a446.7 446.7 0 0 0-142.4-96C631.1 123.8 572.5 112 512 112s-119.1 11.8-174.4 35.2a446.7 446.7 0 0 0-142.4 96a446.7 446.7 0 0 0-96 142.4C75.8 440.9 64 499.5 64 560c0 132.7 58.3 257.7 159.9 343.1l1.7 1.4c5.8 4.8 13.1 7.5 20.6 7.5h531.7c7.5 0 14.8-2.7 20.6-7.5l1.7-1.4C901.7 817.7 960 692.7 960 560c0-60.5-11.9-119.1-35.2-174.4zM761.4 836H262.6A371.12 371.12 0 0 1 140 560c0-99.4 38.7-192.8 109-263c70.3-70.3 163.7-109 263-109c99.4 0 192.8 38.7 263 109c70.3 70.3 109 163.7 109 263c0 105.6-44.5 205.5-122.6 276z" fill="currentColor"/><path d="M762.7 340.8l-31.1-31.1a8.03 8.03 0 0 0-11.3 0l-56.6 56.6a8.03 8.03 0 0 0 0 11.3l31.1 31.1c3.1 3.1 8.2 3.1 11.3 0l56.6-56.6c3.1-3.1 3.1-8.2 0-11.3zM750 538v44c0 4.4 3.6 8 8 8h80c4.4 0 8-3.6 8-8v-44c0-4.4-3.6-8-8-8h-80c-4.4 0-8 3.6-8 8zM304.1 309.7a8.03 8.03 0 0 0-11.3 0l-31.1 31.1a8.03 8.03 0 0 0 0 11.3l56.6 56.6c3.1 3.1 8.2 3.1 11.3 0l31.1-31.1c3.1-3.1 3.1-8.2 0-11.3l-56.6-56.6zM262 530h-80c-4.4 0-8 3.6-8 8v44c0 4.4 3.6 8 8 8h80c4.4 0 8-3.6 8-8v-44c0-4.4-3.6-8-8-8z" fill="currentColor"/></svg>
                            <span class="side-menu__label">Tableau de bord</span><i class="angle fa fa-angle-right"></i>
                        </a>
                    </li>
                @if (Auth::user()->profile !="auto-ecole")
                @if (Auth::guard('admin')->user()->profile != 'admin') 
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24" class="side-menu__icon" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M69.416 128h48.162a8.003 8.003 0 0 0 4.438-1.344l19.968-13.312a8.003 8.003 0 0 1 4.438-1.344H208V88a8 8 0 0 0-8-8h-69.333a8 8 0 0 1-4.8-1.6L98.133 57.6a8 8 0 0 0-4.8-1.6H40a8 8 0 0 0-8 8v144l29.988-74.971A8 8 0 0 1 69.416 128z" opacity=".2" fill="currentColor"/><path d="M241.88 110.645A16.04 16.04 0 0 0 228.9 104H216V88a16.018 16.018 0 0 0-16-16h-69.333l-27.733-20.8a16.103 16.103 0 0 0-9.601-3.2H40a16.018 16.018 0 0 0-16 16v144a8.062 8.062 0 0 0 .045.846c.003.027.01.054.013.081a7.868 7.868 0 0 0 .138.816c.016.072.037.143.055.215a7.783 7.783 0 0 0 .283.897q.126.33.28.645c.032.064.06.129.093.192a7.981 7.981 0 0 0 1.013 1.5c.061.07.125.137.188.206a7.86 7.86 0 0 0 1.194 1.067c.054.04.107.084.163.122a7.917 7.917 0 0 0 .772.472c.026.013.053.024.078.037a7.862 7.862 0 0 0 .738.336c.071.028.144.053.217.08q.317.115.646.204c.085.023.169.046.254.066c.22.051.441.091.666.124c.082.012.163.028.245.037A8.046 8.046 0 0 0 32 216h176a8.001 8.001 0 0 0 7.59-5.47l28.49-85.47a16.039 16.039 0 0 0-2.2-14.415zM93.333 64l27.733 20.8a16.103 16.103 0 0 0 9.601 3.2H200v16h-53.578a15.948 15.948 0 0 0-8.875 2.688L117.578 120H69.416a15.923 15.923 0 0 0-14.855 10.058L40 166.459V64zm108.9 136H43.817l25.6-64h48.162a15.948 15.948 0 0 0 8.875-2.688L146.422 120H228.9z" fill="currentColor"/></svg>
                            <span class="side-menu__label">Demandes</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{route('demande-nouvelle')}}" class="slide-item">Nouvelles demandes 
                            @if(\App\Models\Demande::where('status_demande', '=', null)
                            ->where('region_id', Auth::user()->region_id)
                            ->get()->count()==0)

                            @else
                             <span class="nav-unread badge badge-danger badge-pill pulse">
                                @if(Auth::user()->profile=="admin") 
                                {{\App\Models\Demande::where('status_demande', '=', null)
                                    ->get()->count()}}
                                @elseif(Auth::user()->profile=="dr")
                                {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                    ->where('status_demande', '=', null)
                                    ->get()->count()}}
                                @else
                                {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                ->where('status_demande', '=', null)

                                ->get()->count()}}
                                @endif
    
                                </span>
                            @endif
                            </a></li>
                            <li><a href="{{route('demande-preselectionnee')}}" class="slide-item">Demandes préselectionnées
                                @if(\App\Models\Demande::where('status_demande', '=', 'preselectionne')
                                ->where('transfere_autoecole_id', '=', null)
                                ->where('region_id', Auth::user()->region_id)
                                ->get()->count()==0)
    
                                @else
                                 <span class="nav-unread badge badge-danger badge-pill pulse">
                                    @if(Auth::user()->profile=="admin") 
                                ->where('transfere_autoecole_id', '=', null)
                                    {{\App\Models\Demande::where('status_demande', '=', 'preselectionne')
                                       ->where('transfere_autoecole_id', '=', null)
                                        ->get()->count()}}
                                    @elseif(Auth::user()->profile=="dr")
                                    {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                        ->where('status_demande', '=', 'preselectionne')
                                        ->where('transfere_autoecole_id', '=', null)
                                        ->get()->count()}}
                                    @else
                                    {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                    ->where('status_demande', '=', 'preselectionne')    
                                      ->where('transfere_autoecole_id', '=', null)
                                    ->get()->count()}}
                                    @endif
                                    @endif
                            </a></li>
                            <li><a href="{{route('demande-selectionnee')}}" class="slide-item">Demandes selectionnées
                                @if(\App\Models\Demande::where('status_demande', '=', 'selectionne')
                                ->where('region_id', Auth::user()->region_id)
                                  ->where('transfere_autoecole_id', '=', null)
                                ->get()->count()==0)
    
                                @else
                                 <span class="nav-unread badge badge-danger badge-pill pulse">
                                    @if(Auth::user()->profile=="admin") 
                                    {{\App\Models\Demande::where('status_demande', '=', 'selectionne')
                                       ->where('transfere_autoecole_id', '=', null)
                                        ->get()->count()}}
                                    @elseif(Auth::user()->profile=="dr")
                                    {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                        ->where('transfere_autoecole_id', '=', null)
                                        ->where('status_demande', '=', 'selectionne')
                                        ->get()->count()}}
                                    @else
                                    {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                    ->where('status_demande', '=', 'selectionne')    
                                     ->where('transfere_autoecole_id', '=', null)
                                    ->get()->count()}}
                                    @endif
                                    @endif
                            </a></li>
                            <li><a href="{{route('demande-rejete')}}" class="slide-item">Demandes rejetées
                                @if(\App\Models\Demande::where('status_demande', '=', 'rejete')
                                ->where('region_id', Auth::user()->region_id)
                                  
                                ->get()->count()==0)
    
                                @else
                                 <span class="nav-unread badge badge-danger badge-pill pulse">
                                    @if(Auth::user()->profile=="admin") 
                                    {{\App\Models\Demande::where('status_demande', '=', 'rejete')
                                       
                                        ->get()->count()}}
                                    @elseif(Auth::user()->profile=="dr")
                                    {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                        
                                        ->where('status_demande', '=', 'rejete')
                                        ->get()->count()}}
                                    @else
                                    {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                    ->where('status_demande', '=', 'rejete')    
                                     
                                    ->get()->count()}}
                                    @endif
                                    @endif
                            </a></li>
                            <li><a href="{{route('demandes')}}" class="slide-item">Toutes les demandes</a></li>
                        </ul>
                    </li>
                   
                @endif
                @if (Auth::guard('admin')->user()->profile == 'admin') 

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="side-menu__icon" aria-hidden="true" role="img" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><circle cx="88" cy="108" r="52" opacity=".2" fill="currentColor"/><path d="M121.199 157.948a60 60 0 1 0-66.397 0A96.215 96.215 0 0 0 9.455 192.79a8 8 0 1 0 13.083 9.21a80.017 80.017 0 0 1 130.921-.004a8 8 0 1 0 13.082-9.212a96.215 96.215 0 0 0-45.342-34.837zM44 108a44 44 0 1 1 44 44a44.05 44.05 0 0 1-44-44z" fill="currentColor"/><path d="M248.063 192.785a96.214 96.214 0 0 0-45.343-34.837a60 60 0 0 0-49.474-107.712a8 8 0 0 0 4.333 15.402A44.006 44.006 0 1 1 169.522 152a8 8 0 0 0 0 16a80.168 80.168 0 0 1 65.46 33.997a8 8 0 0 0 13.081-9.212z" fill="currentColor"/></svg>
                            <span class="side-menu__label"> Utilisateurs</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{route('addusers')}}" class="slide-item">Nouveau utilisateur</a></li>
                            <li><a href="{{route('users')}}" class="slide-item">Tous les utilisateurs</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24" class="side-menu__icon" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M69.416 128h48.162a8.003 8.003 0 0 0 4.438-1.344l19.968-13.312a8.003 8.003 0 0 1 4.438-1.344H208V88a8 8 0 0 0-8-8h-69.333a8 8 0 0 1-4.8-1.6L98.133 57.6a8 8 0 0 0-4.8-1.6H40a8 8 0 0 0-8 8v144l29.988-74.971A8 8 0 0 1 69.416 128z" opacity=".2" fill="currentColor"/><path d="M241.88 110.645A16.04 16.04 0 0 0 228.9 104H216V88a16.018 16.018 0 0 0-16-16h-69.333l-27.733-20.8a16.103 16.103 0 0 0-9.601-3.2H40a16.018 16.018 0 0 0-16 16v144a8.062 8.062 0 0 0 .045.846c.003.027.01.054.013.081a7.868 7.868 0 0 0 .138.816c.016.072.037.143.055.215a7.783 7.783 0 0 0 .283.897q.126.33.28.645c.032.064.06.129.093.192a7.981 7.981 0 0 0 1.013 1.5c.061.07.125.137.188.206a7.86 7.86 0 0 0 1.194 1.067c.054.04.107.084.163.122a7.917 7.917 0 0 0 .772.472c.026.013.053.024.078.037a7.862 7.862 0 0 0 .738.336c.071.028.144.053.217.08q.317.115.646.204c.085.023.169.046.254.066c.22.051.441.091.666.124c.082.012.163.028.245.037A8.046 8.046 0 0 0 32 216h176a8.001 8.001 0 0 0 7.59-5.47l28.49-85.47a16.039 16.039 0 0 0-2.2-14.415zM93.333 64l27.733 20.8a16.103 16.103 0 0 0 9.601 3.2H200v16h-53.578a15.948 15.948 0 0 0-8.875 2.688L117.578 120H69.416a15.923 15.923 0 0 0-14.855 10.058L40 166.459V64zm108.9 136H43.817l25.6-64h48.162a15.948 15.948 0 0 0 8.875-2.688L146.422 120H228.9z" fill="currentColor"/></svg>
                            <span class="side-menu__label">Demandes</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{route('demande-nouvelle')}}" class="slide-item">Nouvelles demandes 
                            @if(\App\Models\Demande::where('status_demande', '=', null)
                            ->where('region_id', Auth::user()->region_id)
                            ->get()->count()==0)

                            @else
                             <span class="nav-unread badge badge-danger badge-pill pulse">
                                @if(Auth::user()->profile=="admin") 
                                {{\App\Models\Demande::where('status_demande', '=', null)
                                    ->get()->count()}}
                                @elseif(Auth::user()->profile=="dr")
                                {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                    ->where('status_demande', '=', null)
                                    ->get()->count()}}
                                @else
                                {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                ->where('status_demande', '=', null)

                                ->get()->count()}}
                                @endif
    
                                </span>
                            @endif
                            </a></li>
                            <li><a href="{{route('demande-preselectionnee')}}" class="slide-item">Demandes préselectionnées
                               
                                @if(\App\Models\Demande::where('status_demande', '=', 'preselectionne')
                                ->where('region_id', Auth::user()->region_id)
                                ->get()->count()==0)
    
                                @else
                                 <span class="nav-unread badge badge-danger badge-pill pulse">
                                    @if(Auth::user()->profile=="admin") 
                                    {{\App\Models\Demande::where('status_demande', '=', 'preselectionne')
                                        ->get()->count()}}
                                    @elseif(Auth::user()->profile=="dr")
                                    {{\App\Models\Demande::where('region_id', Auth::user()->region_id)
                                        ->where('status_demande', '=', 'preselectionne')
                                        ->get()->count()}}
                                    @else
                                    {{\App\Models\Demande::where('province_id', Auth::user()->province_id)
                                    ->where('status_demande', '=', 'preselectionne')    
                                    ->get()->count()}}
                                    @endif
        
                                    </span>
                                @endif
                            </a></li>
                            <li><a href="{{route('demande-selectionnee')}}" class="slide-item">Demandes selectionnées</a></li>
                            <li><a href="{{route('demande-rejete')}}" class="slide-item">Demandes rejetées</a></li>
                            <li><a href="{{route('demandes')}}" class="slide-item">Toutes les demandes</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="24"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="m226.5 56.4l-96-32a8.5 8.5 0 0 0-5 0l-95.9 32h-.2l-1 .5h-.1l-1 .6c0 .1-.1.1-.2.2l-.8.7l-.7.8c0 .1-.1.1-.1.2l-.6.9c0 .1 0 .1-.1.2l-.4.9l-.3 1.1v.3A3.7 3.7 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.6 11.2A63.2 63.2 0 0 0 64 120a64 64 0 0 0 30 54.2a96.1 96.1 0 0 0-46.5 37.4a8.1 8.1 0 0 0 2.4 11.1a7.9 7.9 0 0 0 11-2.3a80 80 0 0 1 134.2 0a8 8 0 0 0 6.7 3.6a7.5 7.5 0 0 0 4.3-1.3a8.1 8.1 0 0 0 2.4-11.1a96.1 96.1 0 0 0-46.5-37.4a64 64 0 0 0 30-54.2a63.2 63.2 0 0 0-9.6-33.7l44.1-14.7a8 8 0 0 0 0-15.2ZM176 120a48 48 0 0 1-96 0a48.6 48.6 0 0 1 9.3-28.5l36.2 12.1a8 8 0 0 0 5 0l36.2-12.1A48.6 48.6 0 0 1 176 120Zm-9.3-45.3h-.1L128 87.6L89.4 74.7h-.1L57.3 64L128 40.4L198.7 64Z"/></svg>
                            <span class="side-menu__label"> Formations</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{route('formation')}}" class="slide-item">Formations</a></li>
                            <li><a href="{{route('niveau')}}" class="slide-item">Niveaux de formation</a></li>
                            <li><a href="{{route('diplome')}}" class="slide-item">Diplômes</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="side-menu__icon"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            <span class="side-menu__label"> Localités</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{route('regions')}}" class="slide-item">Régions</a></li>
                            <li><a href="{{route('provinces')}}" class="slide-item">Provinces</a></li>
                            <li><a href="{{route('communes')}}" class="slide-item">Communes</a></li>
                            <li><a href="{{route('arrondissements')}}" class="slide-item">Arrondissements</a></li>
                            <li><a href="{{route('secteurs')}}" class="slide-item">Secteurs</a></li>
                            <li><a href="{{route('villages')}}" class="slide-item">Villages</a></li>
                        </ul>
                    </li>
                    <li><h3>Autres</h3></li>
                   
                    <li class="slide">
                            <a class="side-menu__item" href="{{route('parametre')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"  class="side-menu__icon" role="img" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M229.645 105.964L203.699 91.56a83.925 83.925 0 0 0-6.288-10.91l.5-29.689a103.89 103.89 0 0 0-38.171-22.001l-25.447 15.268a83.89 83.89 0 0 0-12.592-.01l-25.46-15.276A103.886 103.886 0 0 0 58.1 50.999l.5 29.672a83.85 83.85 0 0 0-6.305 10.9l-25.961 14.411a103.896 103.896 0 0 0 .032 44.058l25.946 14.403a83.925 83.925 0 0 0 6.288 10.91l-.5 29.689a103.89 103.89 0 0 0 38.171 22.001l25.447-15.269a83.89 83.89 0 0 0 12.592.01l25.46 15.277a103.885 103.885 0 0 0 38.14-22.056l-.5-29.672a83.795 83.795 0 0 0 6.305-10.9l25.96-14.411a103.896 103.896 0 0 0-.031-44.058zm-101.64 70.038a48 48 0 1 1 48-48a48 48 0 0 1-48 48z" opacity=".2" fill="currentColor"/><path d="M128.006 72.002a56 56 0 1 0 56 56a56.064 56.064 0 0 0-56-56zm0 96a40 40 0 1 1 40-40a40.045 40.045 0 0 1-40 40zm109.457-63.736a8.001 8.001 0 0 0-3.936-5.297l-23.776-13.198a92.526 92.526 0 0 0-4.3-7.461l.459-27.213a8 8 0 0 0-2.622-6.058a111.138 111.138 0 0 0-41.11-23.697a8.002 8.002 0 0 0-6.554.76l-23.318 13.99a91.925 91.925 0 0 0-8.612-.006l-23.338-14.003a8.003 8.003 0 0 0-6.557-.76a111.155 111.155 0 0 0-41.077 23.754a8 8 0 0 0-2.62 6.057l.458 27.19a92.58 92.58 0 0 0-4.312 7.454l-23.796 13.21a8 8 0 0 0-3.935 5.3a111.135 111.135 0 0 0 .032 47.45a8.001 8.001 0 0 0 3.935 5.297l23.776 13.198a92.53 92.53 0 0 0 4.3 7.461l-.458 27.213a8 8 0 0 0 2.622 6.058a111.138 111.138 0 0 0 41.109 23.697a8.002 8.002 0 0 0 6.555-.76l23.318-13.99c2.868.135 5.749.138 8.611.006l23.338 14.003a8.002 8.002 0 0 0 6.558.76a111.156 111.156 0 0 0 41.077-23.754a8 8 0 0 0 2.62-6.057l-.458-27.19a92.58 92.58 0 0 0 4.312-7.454l23.796-13.21a8 8 0 0 0 3.935-5.3a111.135 111.135 0 0 0-.032-47.45zm-14.913 40.562l-22.717 12.61a8.006 8.006 0 0 0-3.323 3.521a76.084 76.084 0 0 1-5.704 9.86a8 8 0 0 0-1.393 4.649l.437 25.965a95.03 95.03 0 0 1-29.144 16.86l-22.28-13.369a7.997 7.997 0 0 0-4.115-1.14q-.297 0-.595.022a76.084 76.084 0 0 1-11.392-.009a8.017 8.017 0 0 0-4.721 1.118l-22.269 13.36a95.056 95.056 0 0 1-29.172-16.808l.438-25.979a8.006 8.006 0 0 0-1.388-4.638a76.183 76.183 0 0 1-5.688-9.87a7.998 7.998 0 0 0-3.328-3.531l-22.705-12.604a95.043 95.043 0 0 1-.03-33.669l22.718-12.61a8.006 8.006 0 0 0 3.323-3.521a76.085 76.085 0 0 1 5.704-9.86a8 8 0 0 0 1.393-4.649l-.437-25.965a95.03 95.03 0 0 1 29.144-16.86l22.279 13.369a7.985 7.985 0 0 0 4.71 1.118a76.216 76.216 0 0 1 11.393.009a7.996 7.996 0 0 0 4.721-1.118l22.268-13.361a95.056 95.056 0 0 1 29.173 16.81l-.438 25.978a8.006 8.006 0 0 0 1.387 4.638a76.182 76.182 0 0 1 5.688 9.87a7.998 7.998 0 0 0 3.328 3.531l22.706 12.604a95.043 95.043 0 0 1 .03 33.669z" fill="currentColor"/></svg>
                                <span class="side-menu__label">Paramètres</span>
                            </a>
                    </li>
                           <li class="slide">
                        <a class="side-menu__item" href="{{route('session')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path d="M11 12h6v6h-6z" fill="currentColor"/><path d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.001 16H5V8h14l.001 12z" fill="currentColor"/></svg>
                            <span class="side-menu__label">Sessions</span>
                        </a>
                    </li>
                @endif
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M208 28H72a28.1 28.1 0 0 0-28 28v168a4 4 0 0 0 4 4h144a4 4 0 0 0 0-8H52v-4a20.1 20.1 0 0 1 20-20h136a4 4 0 0 0 4-4V32a4 4 0 0 0-4-4Zm-92 8h56v84l-25.6-19.2a3.9 3.9 0 0 0-4.8 0L116 120Zm88 152H72a27.9 27.9 0 0 0-20 8.4V56a20.1 20.1 0 0 1 20-20h36v92a4.2 4.2 0 0 0 2.2 3.6a4 4 0 0 0 4.2-.4L144 109l29.6 22.2a4.3 4.3 0 0 0 2.4.8a3.9 3.9 0 0 0 1.8-.4a4.2 4.2 0 0 0 2.2-3.6V36h24Z"/></svg>
                        <span class="side-menu__label"> Resultats Examen</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{route('resultat-code')}}" class="slide-item">Resultat code</a></li>
                        <li><a href="{{route('resultat-creneau')}}" class="slide-item">Resultat créneau</a></li>
                        <li><a href="{{route('resultat-permis')}}" class="slide-item">Resultat conduite</a></li>
                    </ul>
                </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('autoecoles')}} ">
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path d="M21.259 11.948A.986.986 0 0 0 22 11V8a.999.999 0 0 0-.996-.999V6H21c0-2.206-1.794-4-4-4H7C4.794 2 3 3.794 3 6v1a1 1 0 0 0-1 1v3c0 .461.317.832.742.948a3.953 3.953 0 0 0-.741 2.298l.004 3.757c.001.733.404 1.369.995 1.716V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h12v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1.274a2.02 2.02 0 0 0 .421-.313c.377-.378.585-.881.584-1.415l-.004-3.759a3.966 3.966 0 0 0-.742-2.291zM5 18h-.995l-.004-3.757c-.001-.459.161-.89.443-1.243h15.111c.283.353.445.783.446 1.242L20.006 18H5zm6.004-10v3H5V8h6.004zM19 11h-5.996V8H19v3zM7 4h10c1.103 0 2 .897 2 2h-4V5H9v1H5c0-1.103.897-2 2-2z" fill="currentColor"/><circle cx="6.5" cy="15.5" r="1.5" fill="currentColor"/><circle cx="17.5" cy="15.5" r="1.5" fill="currentColor"/></svg>
                            <span class="side-menu__label">Auto écoles</span>
                        </a>
                    </li>
                   
                    <li class="slide">
                    <a class="side-menu__item" href="{{route('rapport')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path d="M9 6h2v14H9zm4 2h2v12h-2zm4-4h2v16h-2zM5 12h2v8H5z" fill="currentColor"/></svg>
                        <span class="side-menu__label">Rapports</span>
                    </a>
                    </li>

                @else
                         <li class="slide">
                            <a class="side-menu__item" href="{{route('candidatparecole')}} ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="24"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path d="M20.29 8.29L16 12.58l-1.3-1.29l-1.41 1.42l2.7 2.7l5.72-5.7zM4 8a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4a3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2a1.91 1.91 0 0 1-2-2a1.91 1.91 0 0 1 2-2a1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z" fill="currentColor"/></svg>
                                <span class="side-menu__label">Liste de candidats </span>
                            </a>
                        </li> 
                         
                         <li class="slide">
                        <a class="side-menu__item" href="{{route('rapport')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="side-menu__icon"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            <span class="side-menu__label">Rapport</span>
                        </a>
                    </li>               
                    @endif
                </ul>
            </aside>
            <!--/APP-SIDEBAR-->