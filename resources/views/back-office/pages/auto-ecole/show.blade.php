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
            <li class="breadcrumb-item active" aria-current="page">{{$ecole->denomination}}</li>
        </ol>
    </div>
   
</div>
    <div class="col-lg-12 ">
       
        <div class="tab-content">
            <div class="tab-pane show active" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="media-heading text-center">
                                <h5><strong>Informations de {{$ecole->denomination}}</strong></h5>
                            </div>
                            <hr>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Denomination :</strong> {{$ecole->denomination}}</td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </div>
							<div class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{route('edit-ecole', $ecole->uuid)}}"><i class="fa fa-edit"></i></a>
                                <a onClick="event.preventDefault(); deleteConfirm('{{ $ecole->uuid }}')" class="btn btn-danger btn-sm ml-2" href="{{route('delete-ecole',$ecole->uuid)}}"><i class="fa fa-trash"></i></a>
                                <form id="{{ $ecole->uuid }}" action="{{route('delete-ecole',$ecole->uuid)}}" method="POST">
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