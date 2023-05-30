@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
@include('back-office.partials._breack')
<div class="row">
    <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
        {{-- <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="userprofile">
                        <div class="userpic  brround"> <img src="{{asset('storage/'.$user->photo)}}" alt="" class="userpicimg"> </div>
                        <h3 class="username text-dark mb-2">{{$user->nom}} {{$user->prenom}}</h3>
                        <p class="mb-1 text-muted">Depuis : {{$user->created_at->format('M / Y')}}</p>
                        <div class="socials text-center mt-3">
                            <a href="#" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Télephoner</a>
							<a href="#" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i> E-mail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title">Changer vote mot de passe</div>
            </div>
            <form class="bg-white row p-4 mx-0" method="POST" action="{{route('update-user-password', $user->uuid)}}" id="add-user" enctype="multipart/form-data">
                {{ method_field('PATCH') }} 
                @csrf
                    <div class="card-body">   
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Info : </strong> si vous ne shoutaitez pas changer de mot de passe laisser ces champs vides
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" value="password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Modifier</button>
                    </div>
            </form>
        </div>
      
    </div>
    <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edition du Profil</h3>
            </div>
            <div class="card-body">
               @if ($user->uuid !=Auth::user()->uuid)
               <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-users', $user->uuid)}}" id="add-user" enctype="multipart/form-data">
                {{ method_field('PATCH') }} 
                @else
            
                <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-user', $user->uuid)}}" id="add-user" enctype="multipart/form-data">
                    {{ method_field('PATCH') }} 
                   
               @endif
           
                @csrf
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="nom">Nom <span class="text-danger">*</span></label>
                    <input type="text" value="{{ old('nom')?? $user->nom }}" required name="nom" id="nom" class="form-control" />
                    @error('nom')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="prenom">Prénom(s) <span class="text-danger">*</span></label>
                    <input required type="text" name="prenom" value="{{ old('prenom')?? $user->prenom }}" id="prenom" class="form-control" />
                    @error('prenom')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                    <input required type="email" name="email" value="{{ old('email')?? $user->email }}" id="email" class="form-control" />
                    @error('email')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="telephone">Téléphone <span class="text-danger">*</span></label>
                    <input required type="number" value="{{old('numero')??  $user->numero }}"  name="numero" id="telephone"
                        class="form-control" />
                    @error('numero')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="profession">Profession <span class="text-danger">*</span></label>
                    <input required type="text" value="{{old('profession')??  $user->profession }}"  name="profession" id="profession"
                        class="form-control" />
                    @error('profession')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="photo">Photo <span class="text-danger">*</span></label>
                    <input  type="file" value="{{old('photo')??  $user->photo }}"  name="photo" id="photo"
                        class="form-control" />
                    @error('photo')
                       <div class="text-red"> {{$message}}</div>
                    @enderror
                </div>
                @if(Auth::user()->profile == 'admin' && $user->uuid !=Auth::user()->uuid)
                <div class="form-group mb-1 col-6 col-xs-12">
                    <label class="font-weight-bold" for="user_type">Profil</label>
                    <select name="profil" id="user_type" class="form-control">
                        <option value=''>Sélectionner le profile</option>
                        <option value="dr" {{$user->profile == 'dr' ? 'selected' : '' }}>Direction regionale</option>
                        <option value="dp" {{$user->profile == 'dp' ? 'selected' : '' }}>Direction provinciale</option>
                    </select>
                </div> 
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="user_type">Region</label>
                    <select id="paysId" class="form-control" name="paysId" onchange="selectBureau(this, 'villeId', 'Choisir la La province', {{ $province }})" value="{{ old('paysId') }}" >
                        <option selected disabled> Choisir la region</option>
                        @foreach ($region as $item)
                        <option value="{{$item->uuid}}"
                        @if ($item->uuid == $user->region_id) selected @endif >{{$item->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                    <label class="font-weight-bold" for="user_type">Province</label>
    
                    <select id="villeId" class="form-group input-group form-control" name="villeId" value="{{ old('villeId') }}">
                        <option value="null" disabled selected>Veuillez choisir la region</option>
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
                @endif
                
                
                <div class="btns d-flex justify-content-center col-12 mt-5">
                    <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>

                        <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Modifier</button>
                </div>
            </form>
            </div>
            
        </div>
       
    </div>
</div>
@endsection


@section('js')

@endsection
<script>
    function selectBureau(selectOptionName, selectIdShow, messageOpption, province = []) {
        let valueOption = selectOptionName.options[selectOptionName.selectedIndex].value;
        if (valueOption != null && valueOption != 'null') {
            $('select[name="' + selectIdShow + '"]').empty();
            $('select[name="' + selectIdShow + '"]').append('<option value="" selected disabled>' + messageOpption + '</option>');
            
            if(province.length >= 1) {
                province.forEach(value => {
                    let optionSelected = '';
        
                    if(valueOption == value.region_id) {
                        $('select[name="' + selectIdShow + '"]').append('<option value="'+ value.uuid +'" '+optionSelected+'>'+ value.libelle +'</option>');
                    }
                });
            } else {
                $('select[name="' + selectIdShow + '"]').append('<option value="" disabled>Aucun poste disponible </option>');
            }
            $('select').formSelect();
        } else {
            // $('select[name="' + selectIdShow + '"]').empty();
        }
    }
  
    var onloadCallback = function() {
  
  };
  </script>