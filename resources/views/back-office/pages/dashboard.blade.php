@extends('layouts.back.master')
@section('css')


@endsection


@section('b-content')
@if (Auth::user()->profile != 'auto-ecole')

<section class="mt-7">

    <div class="row">
        @if(Auth::user()->profile == 'admin')
        <div class="col-xl-3 col-sm-6">
          <a href="{{route('demandes')}}">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Demandes</p>
                            <h3 class="mb-0 number-font">{{$demande->count()}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary1">
                                <i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </a>
        </div>
        <div class="col-xl-3 col-sm-6">
            <a href="{{route('session')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col">
                                <p class="mb-1">Session</p>
                                <h3 class="mb-0 text-center number-font">{{$session->count()}}</h3>
                            </div>
                            <div class="col-auto mb-0">
                                <div class="dash-icon text-orange">
                                    <i class="bx bx-user-circle"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>
        </div>
    @endif
        @if(Auth::user()->profile != 'admin')
        <div class="@if(Auth::user()->profile == 'admin') col-xl-3  @else col-xl-4 @endif col-sm-6">

         <a href="{{route('demandes')}}">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Demandes</p>
                            <h3 class="mb-0 number-font">{{$demande->count()}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary1">
                                <i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </a>
        </div>
        @endif
        <div class="@if(Auth::user()->profile == 'admin') col-xl-3  @else col-xl-4 @endif col-sm-6">
         <a href="{{route('autoecoles')}}">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Autos écoles</p>
                            <h3 class="mb-0 number-font">{{$ecole->count()}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary">
                                <i class="bx bxs-school"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </a>
        </div>
        <div class="@if(Auth::user()->profile == 'admin') col-xl-3  @else col-xl-4 @endif col-sm-6">
        <a href="{{route('rapport')}} ">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Statistiques</p>
                            {{-- <h3 class="mb-0 number-font">4,673</h3> --}}
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-warning">
                                <i class="bx bx-stats"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
             </a>
        </div>
    </div>
    <!-- Row-1 End -->
</section>
@else
<section class="mt-7">

    <div class="row">
        <div class="col-xl-6 col-sm-6">
            <a href="{{route('demandes')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col">
                                <p class="mb-1">Utilisateurs</p>
                                <h3 class="mb-0 text-center number-font">{{$user->count()}}</h3>
                            </div>
                            <div class="col-auto mb-0">
                                <div class="dash-icon text-orange">
                                    <i class="bx bx-user-circle"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-6">
         <a href="{{route('demandes')}}">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Demandes</p>
                            <h3 class="mb-0 number-font">{{$demande->count()}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary1">
                                <i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </a>
        </div>
        
     
    </div>
    <!-- Row-1 End -->
</section>
@endif

@if (Auth::user()->profile == "admin")
    <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tous les utilisateurs</h3>
                        </div>
                        <div class="card-body">
                            @if($uses->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Photo</th>
                                            <th class="wd-15p">Nom &Prenom</th>
                                            <th class="wd-20p">Téléphone</th>
                                            <th class="wd-10p">Profil</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($uses as $item)
                                        <tr>
                                            <td class="align-middle text-center">
                                               {{$loop->iteration}}
											</td>
                                            <td class="align-middle text-center"><img alt="" class="avatar avatar-md rounded-circle" src="{{asset('storage/'.$item->photo)}}"></td>
                                            <td>{{$item->nom}} {{$item->prenom}}</td>
                                            <td>{{$item->numero}}</td>
                                            <td>{!!$item->profil !!}</td>
                                            
                                            <td>
                                                <a href="{{route('showusers', $item->uuid)}}" class="btn btn-danger btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="icon icon-eye"></i></a>
											</td>
                                        </tr>
                                     @endforeach                                                   
                                    </tbody>
                                </table>
                            </div>
                            @else
                                            
                            @endif
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
            </div>
@elseif(Auth::user()->profile != "admin")
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nouvelles demandes d'inscription au OPC</h3>
            </div>
            <div class="card-body">
                @if($uses->count()>0)
                <div class="table-responsive">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Nom & prénom</th>
                                <th>Téléphone</th>
                                <th>Date de naissance</th>
                                <th>Lieu naissance</th>
                                <th>Genre</th>
                                <th>Type formation</th>
                                <th>Niveau formation</th>
                            
                                <th>Diplome</th>
                                <th>Qualification</th>
                                <th>Occupation</th>
                                <th>Permis</th>
                                <th>Langue de formation</th>
                                <th>Region</th>
                                <th>Province</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uses as $item)
                                <tr>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->nom}} {{$item->prenom}} </a></td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{Carbon\Carbon::parse($item->datenaissance)->format('d-m-Y')}}  </td>
                                    <td>{{$item->lieunaissance}}</td>
                                    <td>{{$item->genre}}</td>
                                    <td>{{$item->formation->libelle}}</td>
                                    <td>@if($item->niveauformation_id == null) Néant @else {{$item->niveau->libelle}} @endif</td>                                    
                                                                   
                                    <td> @if($item->diplome_id == null) Néant @else {{$item->diplome->libelle}} @endif </td>                                    
                                    <td> @if($item->qualification == null) Néant @else {{$item->qualification}} @endif </td>                                    
                                    <td>{{$item->occupation}}</td>                                    
                                    <td>  {{$item->permis}} </td>                                    
                                    <td>{{$item->langue}}</td>                                    
                                    <td>{{$item->region->libelle}}</td>
                                    <td>{{$item->province->libelle}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center">
                    <p>Auccune demande disponibles</p>            
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endif    

@endsection


@section('js')

@endsection

<p>jdnksndks</p>