@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Les Auto écoles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item "><a href="{{route('autoecoles')}}">Auto écoles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$ecole->ecoles->denomination}}</li>
        </ol>
    </div>
   
</div>
    <div class="row">
        <div class="col-lg-8 ">
@include('back-office.partials._notification')
     
            <div class="tab-content">
                <div class="tab-pane show active" id="tab-51">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading text-center">
                                    <h5><strong>Informations sur l'auto école :  {{$ecole->ecoles->denomination}}</strong></h5>
                                </div>
                                <hr>
                                <div class="table-responsive ">
                                    <table class="table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Dénomination :</strong> {{$ecole->ecoles->denomination}}</td>
                                            </tr>
                                          
                                           
                                           
                                            
                                        </tbody>
                                                                           
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button type="button" id="#button1" class="btn btn-sm btn-danger mr-2" data-toggle="modal"
                                      data-target="#multi_trans" onclick="transferer()" >Ajouter utilisateur Auto école
                                     </button>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Les gestionnaires de l'auto école: <strong>{{$ecole->ecoles->denomination}}</strong></h3>
                </div>
                <div class="card-body">
                    @if ($users->count()>0)
                        <div class="activity-block">
                            <ul class="task-list user-tasks">
                                @foreach ($users as $user)
                                    <li>
                                        <a href="{{route('showusers',$user->uuid)}}"><span class="avatar avatar-md brround cover-image task-icon1 bg-pink">{{$user->nom}}</span></a>
                                        <h6><a href="{{route('showusers',$user->uuid)}}">{{$user->nom}}</a><small class="float-right text-muted tx-11">{{$user->created_at}}</small></h6>
                                        <span class="text-muted tx-12">Role : {!! $user->Profil !!} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @else
                        <h5 class="text-center">Aucun utilisateur disponible !</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
    <div id="multi_trans" class="modal fade" wire:ignore.self tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">     
                <div class="row">
                    <div class="col-sm-12 col-md-12"><br>
                        <h4 class="text-center">Ajouter l'utilisateur de l'auto école {{$ecole->ecoles->denomination}}</h4>       
                       <hr>
                            <form class="bg-white row p-5 mx-0" method="POST" action="{{ route('store-ecoles') }}" enctype="multipart/form-data" id="add-user">
                                {{ method_field('POST') }} 
                            @csrf
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="nom">Nom <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('nom')?? $ecole->nom }}" required name="nom" id="nom" class="form-control" />
                                @error('nom')
                                   <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="prenom">Prénom(s) <span class="text-danger">*</span></label>
                                <input required type="text" name="prenom" value="{{ old('prenom')?? $ecole->prenom }}" id="prenom" class="form-control" />
                                @error('prenom')
                                   <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                                <input required type="email" name="email" value="{{ old('email')?? $ecole->email }}" id="email" class="form-control" />
                                @error('email')
                                   <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="telephone">Téléphone <span class="text-danger">*</span></label>
                                <input required type="number" value="{{old('numero')??  $ecole->numero }}"  name="numero" id="telephone"
                                    class="form-control" />
                                @error('numero')
                                   <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                             <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="photo">Photo <span class="text-danger">*</span></label>
                                <input required type="file" value="{{old('photo')??  $ecole->photo }}"  name="photo" id="photo"
                                    class="form-control" />
                                @error('photo')
                                   <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            
                           
                            <input  type="hidden" value="auto-ecole"  name="profile">
                            <input  type="hidden" value="{{$ecole->uuid}}"  name="ecole_id">
                            <input  type="hidden" value="{{$ecole->region_id}}"  name="paysId">
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="user_type">Province</label>
                
                                <select id="villeId" class="form-group input-group form-control" name="villeId" value="{{ old('villeId') }}">
                                    <option value="" ></option>
                                    @foreach ($provinces as $item)
                                    <option value="{{$item->uuid}}">{{$item->libelle}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                                <div class="form-label">Statut</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="revoquer" value="{{ true }}" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Désactiver le compte</span>
                                </label>
                            </div>
                           
                            <div class="btns d-flex justify-content-center col-12 mt-5">
                                <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>
                                
                                    <button type="reset" class="mx-5 btn btn-danger">Réinitialiser</button>
                                    <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                               
                            </div> 
                        </form>
                    </div>
                   
                
                </div>                
            </div>
    </div> 
   
@endsection


@section('js')

@endsection
