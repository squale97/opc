@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Session</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item "><a href="{{route('session')}}">Session</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$session->titre}}</li>
        </ol>
    </div>
   
</div>
    <div class="row">
        
    <div class="col-sm-12 col-md-8">
       
        <div class="tab-content">
            <div class="tab-pane show active" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="media-heading text-center">
                                <h5><strong>Informations de {{$session->titre}}</strong></h5>
                            </div>
                            <hr>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Titre :</strong> {{$session->titre}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date d'ouverture :</strong> {{$session->date_ouverture}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date fermeture:</strong> {{$session->date_fermeture}}</td>
                                        </tr>
                                        <tr>
                                       
                                        
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Condition :</strong> {{$session->Condition}}  </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
							<div class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{route('edit-session', $session->uuid)}}"><i class="fa fa-edit"></i></a>
                                <a onClick="event.preventDefault(); deleteConfirm('{{ $session->uuid }}')" class="btn btn-danger btn-sm ml-2" href="{{route('delete-session',$session->uuid)}}"><i class="fa fa-trash"></i></a>
                                <form id="{{ $session->uuid }}" action="{{route('delete-session',$session->uuid)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
            
        </div>
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
                                    <a href="{{route('show-session',$user->uuid)}}"><span class="avatar avatar-md brround cover-image task-icon1 bg-pink">{{$user->titre}}</span></a>
                                    <h6><a href="{{route('show-session',$user->uuid)}}">{{$user->titre}}</a><small class="float-right text-muted tx-11">{{$user->created_at}}</small></h6>
                                    
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
	  cancelButtonText: 'Annuller',
    }).then(function (result) {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
}
  </script>