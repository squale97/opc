@extends('layouts.usager.app')
@section('css')


@endsection

@section('content')

<div class="" id="main">
    <div class="card">
     <div class="card-header d-flex">
        <h5 class="h1-text">Les informations sur la demande d'incription à l'OPC</h5>
        <div class="ml-2 card-options" id="btnflx">
         
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
      <fieldset class="scheduler-border">
          <legend class="scheduler-border"><h6 class="heading">IDENTITE</h6></legend>

          <div class="table-responsive ">
              <table class="table row table-borderless ">
                  <tbody class="col-lg-8 col-xl-6 p-0">
                      <tr>
                          <td><strong>Nom  :</strong> {{ ucFirst($demande->nom) }}</td>
                      </tr>
                      <tr>
                          <td><strong>Genre :</strong> {{ $demande->genre }}</td>
                      </tr>
                      <tr>
                          <td><strong>Date de naissance: </strong> {{ Carbon\Carbon::parse($demande->datenaissance)->format('d-m-Y') }}</td>
                      </tr>

                      
                      <tr>
                          <td><strong>Référence de pièce  :</strong> {{ $demande->reference }}</td>
                      </tr>
                      
                  </tbody>
                  <tbody class="col-lg-8 col-xl-6 p-0">
                    <tr>
                        <td><strong>Prénom  :</strong> {{ ucFirst($demande->prenom) }}</td>
                    </tr>
                      <tr>
                          <td><strong>Type de pièce :</strong> {{ $demande->typepiece }}</td>
                      </tr>
                      <tr>
                          <td><strong>Lieu de naissance :</strong> {{ $demande->lieunaissance }}</td>
                      </tr>
                      
                     
                      
                  </tbody>
              </table>
          </div>
      </fieldset>
      <fieldset class="scheduler-border">
          <legend class="scheduler-border"><h6 class="heading">ADRESSE PERMANENTE </h6></legend>

          <div class="table-responsive">
              <table class="table row table-borderless ">
                  <tbody class="col-lg-8 col-xl-6 p-0">                      
                      
                      <tr>
                          <td><strong>Téléphone : </strong> {{ $demande->telephone }}</td>
                      </tr>
                      <tr>
                          <td><strong>E-mail : </strong> {{ $demande->email }}</td>
                      </tr>
                      
                      
                  </tbody>
                  <tbody class="col-lg-8 col-xl-6 p-0">
                  <tr>
                          <td><strong>Persnne à prevenir: </strong> {{ $demande->nom_personne}} </td>
                      </tr>
                      <tr>
                          <td><strong>Téléphone de la personne : </strong> {{ $demande->tel_personne}} </td>
                      </tr>
                                           
                  </tbody>
              </table>
          </div>
      </fieldset>
      <fieldset class="scheduler-border">
          <legend class="scheduler-border"><h6 class="heading">RESIDENCE</h6></legend>

          <div class="table-responsive">
              <table class="table row table-borderless ">
                  <tbody class="col-lg-8 col-xl-6 p-0">                      
                      
                     <tr>
                          <td><strong>Habitation :</strong> {{ $demande->residence}}</td>
                      </tr>
                      
                      <tr>
                          <td><strong>Région :</strong> {{ $demande->region->libelle }}</td>
                      </tr>
                     @if ($demande->secteur != null)
                         
                     <tr>
                          <td><strong>Secteur :</strong> {{  $demande->secteur->libelle }}</td>
                      </tr>
                     @endif
                      
                      
                  </tbody>
                  <tbody class="col-lg-8 col-xl-6 p-0">
                      <tr>
                          <td><strong>Province :</strong> {{  $demande->province->libelle }}</td>
                      </tr>
                      <tr>
                          <td><strong>Commune :</strong> {{  $demande->commune->libelle }}</td>
                      </tr>
                      @if ($demande->arrondissement != null)    
                      <tr>
                          <td><strong>Arrondissement :</strong> {{  $demande->arrondissement->libelle }}</td>
                      </tr>
                      @endif
                     @if ($demande->village != null)  
                      <tr>
                          <td><strong>Village :</strong> {{  $demande->village->libelle }}</td>
                      </tr>
                     @endif
                     
                     
                    
                  </tbody>
              </table>
          </div>
      </fieldset>
      <fieldset class="scheduler-border">
          <legend class="scheduler-border"><h6 class="heading">FORMATION</h6></legend>

          <div class="table-responsive">
              <table class="table row table-borderless ">
                  <tbody class="col-lg-8 col-xl-6 p-0">                      
                      
                     <tr>
                          <td><strong>Enseignement :</strong> {{ $demande->formation->libelle}}</td>
                      </tr>
                     
                       @if($demande->niveauformation_id != null)
                      <tr>
                          <td><strong>Niveau : </strong> {{$demande->niveau->libelle }}</td>
                      </tr>
                      @endif
                       @if($demande->diplome_id != null)
                      <tr>
                          <td><strong>Dernier diplôme : </strong> {{$demande->diplome->libelle }}</td>
                      </tr>
                      @endif
                       @if($demande->qualification != null)
                      <tr>
                          <td><strong>Titre de qualification : </strong> {{$demande->qualification }}</td>
                      </tr>
                      @endif                     
                      
                  </tbody>
                  <tbody class="col-lg-8 col-xl-6 p-0">
                     <tr>
                          <td><strong>Occupation : </strong> {{$demande->occupation }}</td>
                      </tr>
                      @if($demande->permis != null)
                      <tr>
                          <td><strong>Catégorie de permis : </strong> {{$demande->permis }}</td>
                      </tr>
                      @endif
                     
                      <tr>
                          <td><strong>Langue de formation : </strong> {{$demande->langue }}</td>
                      </tr>
                      @if($demande->classe != null)
                      <tr>
                          <td><strong>Demande effectuée le:</strong> {{$demande->created_at->format("d/m/Y") }}</td>
                      </tr>
                      @endif
                      <tr>
                          <td><strong>Statut : </strong>
                            @if ($demande->status_demande== 'selectionne')
                              {!! $demande->demandestatus!!}
                            @elseif ($demande->status_demande== 'preselectionne')
                              {!! $demande->demandestatus!!}
                            @elseif ($demande->status_demande== 'rejete')
                              {!! $demande->demandestatus!!}
                            @else
                              {!! $demande->demandestatus!!}
                            @endif
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </fieldset>
    </div>
    <div class="text-center">
    <a href="{{url()->previous()}}" class="btn btn-default">&larr; Retour</a>
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
    </div>
  </div>
@endsection

@section('js')

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.deleteConfirm = function(formId, theTitle, theText) {
    Swal.fire({
      title: "Suppression de la demande",
      text: "Merci de confirmer la suppression de la demande?", 
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText:'Annuler',
      confirmButtonText: 'Oui',
      confirmButtonColor: '#e3342f',
    }).then(function (result) {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
}
  </script>
