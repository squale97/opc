

@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
 <div class="page-header">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Session</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouvelle session</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-8">
        

        @if (isset($session->uuid))
            <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-session', $session->uuid)}}" id="update-session" enctype="multipart/form-data">
                {{ method_field('PATCH') }} 
        @else
            <form class="bg-white row p-5 mx-0" method="POST" action="{{ route('store-session') }}" enctype="multipart/form-data" id="add-user">
                {{ method_field('POST') }} 
        @endif
            @csrf
            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                <label class="font-weight-bold" for="nom">titre de la session <span class="text-danger">*</span></label>
                <input type="text" value="{{ old('titre')?? $session->titre }}" required name="titre" id="titre" class="form-control" />
                @error('titre')
                   <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                <label class="font-weight-bold" for="prenom">Nombre candidat <span class="text-danger">*</span></label>
                <input required type="number" name="nombre_candidat" value="{{ old('nombre_candidat')?? $session->nombre_candidat }}" id="prenom" class="form-control" />
                @error('nombre_candidat')
                   <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                <label class="font-weight-bold" for="date_ouverture">Date d'ouverture <span class="text-danger">*</span></label>
                <input  type="date" name="date_ouverture" value="{{ old('date_ouverture') ?? $session->date_ouverture }}" id="date_ouverture" class="form-control" />
                @error('date_ouverture')
                   <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                <label class="font-weight-bold" for="date_fermeture">Date de fermeture <span class="text-danger">*</span></label>
                <input  type="date" name="date_fermeture" value="{{ old('date_fermeture')?? $session->date_fermeture }}" id="date_fermeture" class="form-control" />
                @error('date_fermeture')
                <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-1 col-6 col-xs-12 mb-5">
                <label class="font-weight-bold" for="date_fermeture">Conditions <span class="text-danger">*</span></label>
                    <Textarea name="condition" rows="3" cols="99">{{$session->condition}}</Textarea>
                @error('condition')
                   <div class="text-red"> {{$message}}</div>
                @enderror
            </div>
                       
            <div class="btns d-flex justify-content-center col-12 mt-5">
                <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>
                @if (isset($session->uuid))
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
                <h3 class="card-title">Liste des sessions</h3>
            </div>
            <div class="card-body">
                @if ($sessions->count()>0)
                    <div class="activity-block">
                        <ul class="task-list user-tasks">
                            @foreach ($sessions as $user)
                                <li>
                                    <a href="{{route('edit-session',$user->uuid)}}"><span class="avatar avatar-md brround cover-image task-icon1 bg-pink">{{$user->titre}}</span></a>
                                    <h6><a href="{{route('edit-session',$user->uuid)}}">{{$user->titre}}</a><small class="float-right text-muted tx-11">{{$user->created_at}}</small></h6>
                                    
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
