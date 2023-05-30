@extends('layouts.back.master')
@section('css')


@endsection
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Les Candidats</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Candidats</li>
        </ol>
    </div>
   
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="mail-option">
                       
                    <div class="btn-group">
                        <a  data-placement="top" href="{{route('resultat-code')}} "  class="btn @if(Route::getCurrentRoute()->getName() == 'resultat-code') btn-success @endif  tooltips">
                            Resultat Code 
                        </a>
                    </div>
                    <div class="btn-group hidden-phone show">
                        <a  href="{{route('resultat-creneau')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'resultat-creneau') btn-success @endif" >
                            Resultat Crénéau
                        </a>
                    </div>
                    
                    <div class="btn-group hidden-phone show">
                        <a  href="{{route('resultat-permis')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'resultat-permis') btn-success @endif">
                            Resultat Permis
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                @if($demandes->count()>0)
                <div class="table-responsive">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Nom & prénom</th>
                                <th>Téléphone</th>
                                <th>Genre</th>
                                <th>Permis</th>
                                <th>Type pièce</th>
                                <th>Reference</th>
                                <th>Date établissement</th>
                                <th>Region</th>
                                <th>Province</th>
                                <th>Commune</th>
                              
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $item)
                                <tr>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->nom}} {{$item->prenom}} </a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->telephone}}</a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->genre}}</a></td>                                   
                                    <td><a href="{{route('demande-show', $item->uuid)}}">  {{$item->permis}}</a> </td>  
                                    <td><a href="{{route('demande-show', $item->uuid)}}"> {{$item->typepiece}} </a></td>                                    
                                    <td><a href="{{route('demande-show', $item->uuid)}}"> {{$item->reference}} </a></td>                                    
                                    <td><a href="{{route('demande-show', $item->uuid)}}"> {{\Carbon\Carbon::parse($item->datedelivrance)->format('d-m-Y')}} </a></td>                              
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->region->libelle}}</a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->province->libelle}}</a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->commune->libelle}}</a></td>
                                   
                                </tr>
                                {{-- <div class="modal" id="exampleModal{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('examen-save', $item->uuid)}}" method="post">
                                        @method('POST')
                                        @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="example-Modal2">Resultat de l'examen du code</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    @if(Route::getCurrentRoute()->getName() == 'candidatparecole') 
                                                                    <input type="hidden" value="code" name="type">
                                                                @elseif(Route::getCurrentRoute()->getName() == 'code-valide' )
                                                                <input type="hidden" value="crenau" name="type">
                                                                @elseif(Route::getCurrentRoute()->getName() == 'crenau-valide')
                                                                <input type="hidden" value="conduite" name="type">
                                                                @else
                                                                    <input type="hidden" value="permis" name="type">
                                                                @endif
                                                        <input type="hidden" value="{{$item->uuid}}" name="demandeid">
                                                        <div class="form-group ">
                                                            <label class="form-label mt-0">Choisir le statut de l'examen  
                                                            @if(Route::getCurrentRoute()->getName() == 'candidatparecole') 
                                                                     du code
                                                                @elseif(Route::getCurrentRoute()->getName() == 'code-valide' )
                                                                du crenau
                                                                @elseif(Route::getCurrentRoute()->getName() == 'crenau-valide')
                                                                de la conduite
                                                                @else
                                                                    du permis
                                                                @endif</label>
                                                            <select class="form-control select2 custom-select select2-hidden-accessible" data-placeholder="Choose one" tabindex="-1" name="examen" aria-hidden="true" required>
                                                                <option label="Choisir le statut">Choisir le statut de l'examen 
                                                                @if(Route::getCurrentRoute()->getName() == 'candidatparecole') 
                                                                     du code
                                                                @elseif(Route::getCurrentRoute()->getName() == 'code-valide' )
                                                                du crenau
                                                                @elseif(Route::getCurrentRoute()->getName() == 'crenau-valide')
                                                                de la conduite
                                                                @else
                                                                    du permis
                                                                @endif
                                                                </option>
                                                                @if(($item->code_status == false) && ($item->creneau_status == false) && ($item->conduite_status==false) && ($item->permis_status==false))
                                                                
                                                                
                                                                <option value="1"  >Code validé  </option> 
                                                                <option value="0"  >Code non validé    </option> 
                                                                @elseif($item->code_status != 0 && $item->creneau_status == 0 && $item->conduite_status==0 && $item->permis_status==0)
                                                                    <option value="1"  >Crenau validé  </option> 
                                                                <option value="0"  >Crenau non validé    </option> 
                                                                @elseif($item->code_status != 0 && $item->creneau_status != 0 && $item->conduite_status==0 && $item->permis_status==0)
                                                                      <option value="1"  >Conduite validé  </option> 
                                                                      <option value="0"  >Conduite non validé    </option> 
                                                                @elseif($item->code_status != 0 && $item->creneau_status != 0 && $item->conduite_status!=0 && $item->permis_status==0)
                                                                        <option value="1"  >Permis validé  </option> 
                                                                      <option value="0"  >Permis non validé    </option> 
                                                                @endif
                                                            
                                                        
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-danger">Valider</button>
                                            </div>


                                        </form>
                                  
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center">
                    <p>Auccune demande disponibles</p>            
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection

