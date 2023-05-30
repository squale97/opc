@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')

@include('back-office.partials._breack')
@include('back-office.partials._notification')

    <div class="col-lg-12 ">
       
        <div class="tab-content">
            <div class="tab-pane show active" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="media-heading text-center">
                                <h5>Les informations sur <strong>  {{$demande->nom}} {{$demande->prenom}}</strong></h5>
                                <hr>
                            </div>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Nom :</strong> {{$demande->nom}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><strong> Prénom :</strong> {{$demande->prenom}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date de naissance: :</strong> {{Carbon\Carbon::parse($demande->datenaissance)->format('d-m-Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lieu de naissance :</strong> {{$demande->lieunaissance}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Type de pièce d’identification  :</strong> {{$demande->typepiece}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Référence de pièce d’identification  :</strong> {{$demande->reference}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date établissement  :</strong> {{\Carbon\Carbon::parse($demande->datedelivrance)->format('d-m-Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>N° téléphone :</strong> {{$demande->telephone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>E-mail :</strong> {{$demande->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nom et prénom (s) (personne à prévenir):</strong> {{$demande->nom_personne}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Téléphone (A contacter en cas de besoin)  :</strong> {{$demande->tel_personne}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Milieu d’habitation  :</strong> {{$demande->residence}}  </td>
                                        </tr>
                                        @if ($demande->status_demande =='selectionne')    
                                        <tr>
                                    
                                            <td><strong>Statut affectation  :</strong> 
                                                @if ($demande->transfere_autoecole_id != null)
                                                    Affectée à <strong >{{$demande->ecole->ecoles->denomination}}</strong>
                                                @else
                                                Non affecté pour le moment
                                                @endif
                                              </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Région : </strong> {{$demande->region->libelle}} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Province : </strong> {{$demande->province->libelle}} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Commune : </strong> {{$demande->commune->libelle}} </td>
                                        </tr>
                                        @if ($demande->arrondissement_id != null)
                                            
                                        <tr>
                                            <td><strong>Arrondissement : </strong> {{$demande->arrondissement->libelle}} </td>
                                        </tr>
                                        @endif
                                        @if ($demande->secteur_id != null)
                                        <tr>
                                            <td><strong>Secteur : </strong> {{$demande->secteur->libelle}} </td>
                                        </tr> 
                                        @endif
                                        @if ($demande->village_id != null)
                                            
                                        <tr>
                                            <td><strong>Village : </strong> {{$demande->village->libelle}} </td>
                                        </tr>
                                        @endif                                        
                                        @if ($demande->typeformation_id != null)    
                                        <tr>
                                            <td><strong>Type d’enseignement : </strong> {{$demande->formation->libelle}} </td>
                                        </tr>
                                        @endif
                                        @if ($demande->niveauformation_id != null)
                                            
                                        <tr>
                                            <td><strong>Niveau : </strong> {{$demande->niveau->libelle}} </td>
                                        </tr>
                                        @endif
                                        {{-- @if ($demande->classe != null)
                                        <tr>
                                            <td><strong>Niveau de classe : </strong> {{$demande->classe}} </td>
                                        </tr>
                                        @endif --}}
                                        @if ($demande->diplome_id != null)
                                        <tr>
                                            <td><strong>Dernier diplôme : </strong> {{$demande->diplome->libelle}} </td>
                                        </tr>
                                        @endif
                                        @if ($demande->qualification != null)
                                        <tr>
                                            <td><strong>titre de qualification : </strong> {{$demande->qualification}} </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Occupation actuelle  : </strong> {{$demande->occupation}} </td>
                                        </tr>
                                        @if ($demande->permis != null)
                                        <tr>
                                            <td><strong>Catégorie de permis      : </strong> {{$demande->permis}} </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Langue de formation      : </strong> {{$demande->langue}} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Statut demande      : </strong> 
                                            @if ($demande->abandon_status != false)
                                            <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">Abandonner</span>
                                                
                                            @else
                                              @if ($demande->status_demande== 'selectionne')
                                                <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                                                    
                                                @elseif ($demande->status_demande== 'preselectionne')
                                                <span class="badge badge-pill badge-info mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                                                @elseif ($demande->status_demande== 'rejete')
                                                <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                                                @else
                                                <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">{!! $demande->demandestatus!!}</span>
                                                @endif
                                                @endif
                                             </td>
                                        </tr>
                                         <tr>
                                            {{-- <td><strong>Demande affectée à : </strong> {{$demande->ecole}} </td> --}}
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
							<div class="text-center">
                                <a href="{{url()->previous()}}" class="btn btn-default px-4 mx-5">&larr; Retour</a>
                               @if (Auth::user()->profile != 'admin')
                                    @if ($demande->status_demande == null)
                                                    <button type="button" class="btn btn-success btn-sm  mr-2" data-toggle="modal" data-target="#preselection{{$demande->uuid}}">Préselectionner</button>
                                                    <button type="button" class="btn btn-danger btn-sm  mr-2" data-toggle="modal" data-target="#rejet">Rejeter</button>

                                                @elseif($demande->status_demande == 'preselectionne')
                                                    <button type="button" class="btn btn-success btn-sm  mr-2" data-toggle="modal" data-target="#selection{{$demande->uuid}}">Selectionner</button>

                                                    <button type="button" class="btn btn-danger btn-sm  mr-2" data-toggle="modal" data-target="#rejet{{$demande->uuid}}">Rejeter</button>
                                                    
                                                
                                                @else
                                                
                                                @endif
                                @if ($demande->status_demande =='selectionne')
                                    
                                    @if($demande->status_paiement   ==false)
                                    <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">En attente de paiement</span>
                                    @else
                                    @if (Auth::user()->profile !="auto-ecole")
                                        
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" @if ($demande->transfere_autoecole_id != null)  disabled @endif data-target="#transferer{{$demande->uuid }}">
                                        <i class="fa fa-exchange mr-2" ></i>Affecter
                                    </button>
                                    @endif
                                    @endif
                                @endif
                               @endif
                            </div>
                            
                                            <div class="modal" id="selection{{$demande->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <form action="{{route('demnade-status')}}" method="post">
                                                        @method('POST')
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Selectionnez la demande</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de bien vouloir effectuer cette action ?</p>
                                                                 <input type="hidden" value="{{$demande->uuid}}" name="demandeid">
                                                                 <input type="hidden" value="selectionne" name="statut">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Oui</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal" id="rejet{{$demande->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <form action="{{route('demnade-status')}}" method="post">
                                                        @method('POST')
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Préselectionnez la demande</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de bien vouloir effectuer cette action ?</p>
                                                                 <input type="hidden" value="{{$demande->uuid}}" name="demandeid">
                                                                 <input type="hidden" value="rejete" name="statut">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Oui</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                             <div class="modal" id="preselection{{$demande->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <form action="{{route('demnade-status')}}" method="post">
                                                        @method('POST')
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Préselectionnez la demande</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de bien vouloir effectuer cette action ?</p>
                                                                 <input type="hidden" value="{{$demande->uuid}}" name="demandeid">
                                                                 <input type="hidden" value="preselectionne" name="statut">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Oui</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                @include('back-office.pages.candidatures.confirmation_transfere',
                                                    ['modalUrl'=>'demandes-transfert','idModal' => "transferer".$demande->uuid, 'uuid'=>$demande->uuid, 'demande'=>$demande, 'nom'=>$demande->nomcomplet,
                                                    'ecoles'=>$ecoles

                                                ]) 
                        </div>
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </div>
    
   
        @if ($demande->complement != null)
           <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Complément du dossier d'inscription </h3>
                </div>
                <div class="card-body">
                
                    <div class="col-lg-12 " id="doc">
                        <div class="row">
                    
                    
                                @if (pathinfo($demande->complement->cnib, PATHINFO_EXTENSION) =="pdf")
                                    <div class="document-item d-flex  mb-3 ml-5">
                                        <div class="document-image-zone float-left pr-4">
                                            <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                        </div>
                                        <div class="document-text-zone">
                                            <span class="d-block font-13"  >   </span>
                                            <span class="font-13"> 
                                                <a href="{{asset('storage/'. $demande->complement->cnib)}}" target="_blank" rel="noopener noreferrer"> Télécharger la CNIB <i
                                                    class="fa fa-file-pdf-0"></i> </a>  
                                                
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="document-item d-flex  mb-3 ml-5">
                                        <div class="document-image-zone float-left pr-4">
                                            <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                        </div>
                                        <div class="document-text-zone">
                                            <span class="d-block font-13"  >   </span>
                                            <span class="font-13"> 
                                                <a href="{{asset('storage/'. $demande->complement->cnib)}}" target="_blank" rel="noopener noreferrer"> Télécharger la CNIB <i
                                            class="fa fa-file-photo-0"></i> </a> 
                                                
                                            </span>
                                        </div>
                                    </div>
                                    
                                @endif
                                @if (pathinfo($demande->complement->extrait  , PATHINFO_EXTENSION) == 'pdf')
                                    <div class="document-item d-flex  mb-3 ml-5">
                                        <div class="document-image-zone float-left pr-4">
                                            <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                        </div>
                                        <div class="document-text-zone">
                                            <span class="d-block font-13"  >   </span>
                                            <span class="font-13"> 
                                                <a href="{{asset('storage/'. $demande->complement->extrait)}}" target="_blank" rel="noopener noreferrer"> Télécharger l'extrait <i
                                                    class="fa fa-file-pdf-0"></i> </a>  
                                                
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="document-item d-flex  mb-3 ml-5">
                                        <div class="document-image-zone float-left pr-4">
                                            <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                        </div>
                                        <div class="document-text-zone">
                                            <span class="d-block font-13"  >   </span>
                                            <span class="font-13"> 
                                                <a href="{{asset('storage/'. $demande->complement->extrait)}}" target="_blank" rel="noopener noreferrer"> Télécharger l'extrait <i
                                            class="fa fa-file-photo-0"></i> </a> 
                                            </span>
                                        </div>
                                    </div>

                                @endif
                            
                                @if ($demande->complement->fiche_inscription != null)
                                    @if (pathinfo($demande->complement->fiche_inscription, PATHINFO_EXTENSION) == 'pdf')
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->fiche_inscription)}}" target="_blank" rel="noopener noreferrer"> Télécharger la fiche d'inscription <i
                                                            class="fa fa-file-pdf-0"></i> </a>  
                                                
                                                
                                                </span>
                                            </div>
                                        </div>
                                        @else
                                            <div class="document-item d-flex  mb-3 ml-5">
                                                <div class="document-image-zone float-left pr-4">
                                                    <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                                </div>
                                                <div class="document-text-zone">
                                                    <span class="d-block font-13"  >   </span>
                                                    <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->fiche_inscription)}}" target="_blank" rel="noopener noreferrer"> Télécharger la fiche d'inscription <i
                                                                class="fa fa-file-photo-0"></i> </a>  
                                                    
                                                    
                                                    </span>
                                                </div>
                                            </div>      
                                        @endif
                                @endif
                                @if ($demande->complement->engagement != null)
                                    @if (pathinfo($demande->complement->engagement, PATHINFO_EXTENSION) == 'pdf')
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->engagement)}}" target="_blank" rel="noopener noreferrer"> Télécharger l'engagement <i
                                                            class="fa fa-file-pdf-0"></i> </a>  
                                                
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                    <a href="{{asset('storage/'. $demande->complement->fiche_inscription)}}" target="_blank" rel="noopener noreferrer"> Télécharger l'engagement <i
                                                class="fa fa-file-photo-0"></i> </a>  
                                                
                                                </span>
                                            </div>
                                        </div>
                                            
                                        
                                    @endif
                                @endif
                                @if ($demande->complement->diplome != null)
                                    @if (pathinfo($demande->complement->diplome, PATHINFO_EXTENSION) == 'pdf')
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->diplome)}}" target="_blank" rel="noopener noreferrer"> Télécharger le diplôme <i
                                                            class="fa fa-file-pdf-0"></i> </a>  
                                                
                                                
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->diplome)}}" target="_blank" rel="noopener noreferrer"> Télécharger le diplôme <i
                                                            class="fa fa-file-photo-0"></i> </a> 
                                                
                                                </span>
                                            </div>
                                        </div>                   
                                    @endif
                                @endif
                                @if ($demande->complement->permis != null)
                                    @if (pathinfo($demande->complement->permis, PATHINFO_EXTENSION) == 'pdf')
                                        <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->permis)}}" target="_blank" rel="noopener noreferrer"> Télécharger le permis <i
                                                            class="fa fa-file-pdf-0"></i> </a>  
                                                
                                                
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                            <div class="document-item d-flex  mb-3 ml-5">
                                            <div class="document-image-zone float-left pr-4">
                                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                            </div>
                                            <div class="document-text-zone">
                                                <span class="d-block font-13"  >   </span>
                                                <span class="font-13"> 
                                                        <a href="{{asset('storage/'. $demande->complement->permis)}}" target="_blank" rel="noopener noreferrer"> Télécharger le permis <i
                                            class="fa fa-file-photo-0"></i> </a> 
                                                </span>
                                            </div>
                                        </div>    
                                        
                                    
                                    @endif
                                @endif
                            
                                <div class="document-item d-flex  mb-3 ml-5">
                                    <div class="document-image-zone float-left pr-4">
                                        <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                    </div>
                                    <div class="document-text-zone">
                                        <span class="d-block font-13"  >   </span>
                                        <span class="font-13"> 
                                                                                                
                                            <a href="{{asset('storage/'. $demande->complement->photo)}}" target="_blank" rel="noopener noreferrer"> Télécharger la photo <i
                                                class="fa fa-file-photo-0"></i> </a> 

                                        </span>
                                    </div>
                                </div>
                        
                        
                            
                    
                        
                        </div>
                    </div>
                </div>
        </div>  
        </div>  
        @else
           <div class="col-md-12 col-xl-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Documents liés</h3>
        </div>
        <div class="card-body">
            <div class="col-lg-12" id="doc">
                <div class="row">
                    @foreach($demande->documents as $doc)
                   
                        @if (pathinfo($doc->cnibfile, PATHINFO_EXTENSION) == 'pdf')
                        <div class="document-item d-flex  mb-3 ml-5">
                            <div class="document-image-zone float-left pr-4">
                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                            </div>
                            <div class="document-text-zone">
                                <span class="d-block font-13"  >   </span>
                                <span class="font-13"> 
                                    <a href="{{asset('storage/'. $doc->cnibfile)}}" target="_blank" rel="noopener noreferrer"> Télécharger la CNIB <i
                                        class="fa fa-file-pdf-0"></i> </a>  
                                
                                    
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="document-item d-flex  mb-3 ml-5">
                            <div class="document-image-zone float-left pr-4">
                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                            </div>
                            <div class="document-text-zone">
                                <span class="d-block font-13"  >   </span>
                                <span class="font-13"> 
                                   <a href="{{asset('storage/'. $doc->cnibfile)}}" target="_blank" rel="noopener noreferrer"> Télécharger la CNIB <i
                                        class="fa fa-file-photo-0"></i> </a> 
                                    
                                </span>
                            </div>
                        </div>
                                
                                    
                                
                        @endif
                    
                        @if (pathinfo($doc->cnibfile, PATHINFO_EXTENSION) == 'pdf')
                        <div class="document-item d-flex  mb-3 ml-5">
                            <div class="document-image-zone float-left pr-4">
                                <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                            </div>
                            <div class="document-text-zone">
                                <span class="d-block font-13"  >   </span>
                                <span class="font-13"> 
                                    <a href="{{asset('storage/'. $doc->diplomefile)}}" target="_blank" rel="noopener noreferrer"> Télécharger le diplôme <i
                                        class="fa fa-file-pdf-0"></i> </a>  
                               
                                    
                                </span>
                            </div>
                        </div>
                     @else
                     <div class="document-item d-flex  mb-3 ml-5">
                            <div class="document-image-zone float-left pr-4">
                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                            </div>
                            <div class="document-text-zone">
                                <span class="d-block font-13"  >   </span>
                                <span class="font-13"> 
                                    <a href="{{asset('storage/'. $doc->diplomefile)}}" target="_blank" rel="noopener noreferrer"> Télécharger le diplôme <i
                                        class="fa fa-file-photo-0"></i> </a> 
                                    
                                </span>
                            </div>
                        </div>
                                
                                   
                                
                                @endif
                        @if ($doc->permisfile != null)
                            @if (pathinfo($doc->permisfile, PATHINFO_EXTENSION) == 'pdf')
                            <div class="document-item d-flex  mb-3 ml-5">
                                <div class="document-image-zone float-left pr-4">
                                    <img src="{{asset('assets/backgounds/pdflogo.png')}}" alt="">
                                </div>
                                <div class="document-text-zone">
                                    <span class="d-block font-13"  >   </span>
                                    <span class="font-13"> 
                                            <a href="{{asset('storage/'. $doc->permisfile)}}" target="_blank" rel="noopener noreferrer"> Télécharger le permis C <i
                                                class="fa fa-file-pdf-0"></i> </a>  
                                    
                                    </span>
                                </div>
                            </div>
                            @else
                            <div class="document-item d-flex  mb-3 ml-5">
                                <div class="document-image-zone float-left pr-4">
                                    <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                                </div>
                                <div class="document-text-zone">
                                    <span class="d-block font-13"  >   </span>
                                    <span class="font-13"> 
                                       <a href="{{asset('storage/'. $doc->permisfile)}}" target="_blank" rel="noopener noreferrer"> Télécharger le permis C <i
                                    class="fa fa-file-photo-0"></i> </a>
                                    </span>
                                </div>
                            </div>
                            
                                 
                            
                            @endif
                        @endif
                    
                        <div class="document-item d-flex  mb-3 ml-5">
                            <div class="document-image-zone float-left pr-4">
                                <img src="{{asset('assets/backgounds/imagelogo.png')}}" alt="">
                            </div>
                            <div class="document-text-zone">
                                <span class="d-block font-13"  >   </span>
                                <span class="font-13"> 
                                                                                        
                                    <a href="{{asset('storage/'. $doc->photo)}}" target="_blank" rel="noopener noreferrer"> Télécharger la photo <i
                                        class="fa fa-file-photo-0"></i> </a> 

                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
           
        </div>
    </div> 
        @endif
@endsection


@section('js')

@endsection
<script language="javascript">
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        function transferer() {
            var selected = new Array();
            $('input:checked').each(function() {
                selected.push($(this).attr('value'));
            });
            $('#demandeToTransfer').val(selected)
        }
    </script>