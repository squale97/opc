@extends('layouts.usager.app')
@section('css')


@endsection

@section('content')
<div class="">
    <div class="card">
      <div class="card-header d-flex">
        <h5 class="h1-text">Les informations de votre Demande du {{ $demande->created_at->format("d/m/Y") }}</h5>
        <div class="ml-2 card-options" id="btnflx">
          @if ($demande->status_demande == null)
          <a class="btn btn-primary btn-sm" href="{{route('edit-demande', $demande->uuid)}} "><i class="fa fa-edit"></i></a>
          <a onClick="event.preventDefault(); deleteConfirm('{{ $demande->uuid }}')" class="btn btn-danger btn-sm ml-2" href="{{route('delete-demande',$demande->uuid)}}"><i class="fa fa-trash"></i></a>
          <form id="{{ $demande->uuid }}" action="{{route('delete-demande',$demande->uuid)}}" method="POST">
            @csrf
            @method('DELETE')
          </form>
          @endif
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <dl class="dl h5">
            <dt class="mb-4"><strong>Nom: </strong> </dt>
            <dd class="mb-4">{{ $demande->nom }}</dd>
            <dt class="mb-4"><strong>Prénom: </strong> </dt>
            <dd class="mb-4">{{ $demande->prenomnom }}</dd>
            <dt class="mb-4"><strong>Date de naissance: </strong> </dt>
            <dd class="mb-4">{{Carbon\Carbon::parse($demande->datenaissance)->format('d-m-Y')}}</dd>
            <dt class="mb-4"><strong>Lieu de naissance: </strong> </dt>
            <dd class="mb-4">{{ $demande->lieunaissance }}</dd>
            <dt class="mb-4"><strong>Region: </strong> </dt>
            <dd class="mb-4">{{ $demande->region->libelle }}</dd>
            <dt class="mb-4"><strong>Province: </strong> </dt>
            <dd class="mb-4">{{ $demande->province->libelle }}</dd>
            <dt class="mb-4"><strong>Type de pièce : </strong> </dt>
            <dd class="mb-4">{{ $demande->typepiece }}</dd>
            <dt class="mb-4"><strong>Téléphone: </strong> </dt>
            <dd class="mb-4">{{ $demande->telephone }}</dd>
            <dt class="mb-4"><strong>E-mail: </strong> </dt>
            <dd class="mb-4">{{ $demande->email }}</dd>
            <dt class="mb-4"><strong>Persnne à prevenir: </strong> </dt>
            <dd class="mb-4">{{ $demande->nom_personne }}</dd>
            <dt class="mb-4"><strong>Téléphone de la personne: </strong> </dt>
            <dd class="mb-4">{{ $demande->tel_personne }}</dd>
            <dt class="mb-4"><strong>Habitation: </strong> </dt>
            <dd class="mb-4">{{ $demande->residence }}</dd>
            <dt class="mb-4"><strong>Formation: </strong> </dt>
            <dd class="mb-4">{{ $demande->typeformation }}</dd>
            <dt class="mb-4"><strong>Niveau : </strong> </dt>
            <dd class="mb-4">{{ $demande->niveauformation }}</dd>
            @if($demande->classe != null)
            <dt class="mb-4"><strong>Classe: </strong> </dt>
            <dd class="mb-4">{{ $demande->classe }}</dd>
            @endif
            <dt class="mb-4"><strong>Demande effectuée le: </strong> </dt>
            <dd class="mb-4">{{ $demande->created_at->format("d/m/Y") }}</dd>
            <dt class="mb-4"><strong>Statut: </strong> </dt>
            <dd class="mb-4">
              @if ($demande->status_demande== 'selectionne')
                    <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                        
                    @elseif ($demande->status_demande== 'preselectionne')
                    <span class="badge badge-pill badge-info mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                    @elseif ($demande->status_demande== 'rejete')
                    <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                    @else
                    <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                    @endif
            </dd>
            {{-- @if($demande->date_payement)
            <dt class="mb-4"><strong>Payement effectué le: </strong> </dt>
            <dd class="mb-4">{{ $demande->date_payement->format("d/m/Y") }}</dd>
            @endif --}}
          </dl>
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
