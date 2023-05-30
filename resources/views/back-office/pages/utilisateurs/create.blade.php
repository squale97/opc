@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')

 <div class="page-header">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Utilisateurs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouveau utilisateur</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-8">
        @include('back-office.partials._notification')

        @if (isset($user->uuid))
            <form class="bg-white row p-5 mx-0" method="POST" action="" id="add-user" enctype="multipart/form-data">
                {{ method_field('PATCH') }} 
        @else
            <form class="bg-white row p-5 mx-0" method="POST" action="{{ route('saveusers') }}" enctype="multipart/form-data" id="add-user">
                {{ method_field('POST') }} 
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
                <input required type="file" value="{{old('photo')??  $user->photo }}"  name="photo" id="photo"
                    class="form-control" />
                @error('photo')
                   <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
            
            <div class="form-group mb-1 col-6 col-xs-12">
                <label class="font-weight-bold" for="user_type">Profil</label>
                <select name="profile" id="user_type" class="form-control">
                    <option value=''>Sélectionner le profil</option>
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
            
            <div class="btns d-flex justify-content-center col-12 mt-5">
                <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>
                @if (isset($user->uuid))
                    <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Modifier</button>
                @else
                    <button type="reset" class="mx-5 btn btn-danger">Réinitialiser</button>
                    <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                @endif
        
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des utilisateurs</h3>
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