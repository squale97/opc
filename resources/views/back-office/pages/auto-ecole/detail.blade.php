@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Les Auto écoles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item "><a href="{{route('candidatparecole')}}">Candidats</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$demande->nomcomplet}}</li>
        </ol>
    </div>
   
</div>
<div class="row">
    <div class="col-sm-12 col-md-8 ">
@include('back-office.partials._notification')
       
        <div class="tab-content" id="show">
            <div class="tab-pane show active" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="media-heading text-center">
                                <h5><strong>Informations de {{$demande->nomcomplet}}</strong></h5>
                            </div>
                            <hr>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Denomination :</strong> {{$demande->nomcomplet}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong> {{$demande->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Téléphone:</strong> {{$demande->telephone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Genre :</strong>@if($demande->genre == 'M') Masculin @else Feminin @endif </td>
                                        </tr>
                                       
                                       
                                        
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Région :</strong> {{$demande->region->libelle}}  </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Province :</strong> {{$demande->province->libelle}} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lange de formation :</strong> {{$demande->langue}} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							{{-- <div class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{route('edit-ecole', $ecole->uuid)}}"><i class="fa fa-edit"></i></a>
                                <a onClick="event.preventDefault(); deleteConfirm('{{ $ecole->uuid }}')" class="btn btn-danger btn-sm ml-2" href="{{route('delete-ecole',$ecole->uuid)}}"><i class="fa fa-trash"></i></a>
                                <form id="{{ $ecole->uuid }}" action="{{route('delete-ecole',$ecole->uuid)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div> --}}
                            
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="{{url()->previous()}}" class="btn btn-default px-4 mx-5">&larr; Retour</a>
                        <button type="button" class="btn btn-primary">Code</button>
                        <button type="button" class="btn btn-primary">Crenaut</button>
                        <button type="button" class="btn btn-primary">Conduite</button>
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des Auto écoles</h3>
            </div>
            <div class="card-body">
                @if ($demandes->count()>0)
                    <div class="activity-block">
                        <ul class="task-list user-tasks">
                            @foreach ($demandes as $user)
                                <li>
                                    <a href="{{route('show-candidat', $user->uuid)}}"><span class="avatar avatar-md brround cover-image task-icon1 bg-pink">{{$user->nomcomplet}}</span></a>
                                    <h6><a href="{{route('show-candidat', $user->uuid)}}">{{$user->nomcomplet}}</a><small class="float-right text-muted tx-11">{{$user->created_at}}</small></h6>
  
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                @else
                    <h5 class="text-center">Aucune demande disponible !</h5>
                @endif
            </div>
        </div>
    </div>
</div>
  
           
@endsection


@section('js')

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.deleteConfirm = function(formId, theTitle, theText) {
    Swal.fire({
      title: theTitle,
      text: theText, 
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      confirmButtonColor: '#e3342f',
    }).then(function (result) {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
}
  </script>