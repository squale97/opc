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
            <li class="breadcrumb-item active" aria-current="page">Candidats affecté</li>
        </ol>
    </div>
   
</div>
@include('back-office.partials._notification')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="mail-option">
                                
                    <div class="btn-group">
                        <a  href="{{route('candidatparecole')}}" class="btn @if(Route::getCurrentRoute()->getName() == 'candidatparecole') btn-success @endif ">
                        Tous les candidats
                        </a>
                    
                    </div>
                               
                    <div class="btn-group">
                        <a  data-placement="top" href="{{route('code-valide')}}"  class="btn @if(Route::getCurrentRoute()->getName() == 'code-valide') btn-success @endif  tooltips">
                            Examen code validé
                        </a>
                    </div>
                    <div class="btn-group hidden-phone show">
                        <a  href="{{route('crenau-valide')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'crenau-valide') btn-success @endif" >
                        Crenau validé
                        </a>
                    </div>
                    {{-- <div class="btn-group hidden-phone show">
                        <a  href="{{route('conduite-valide')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'conduite-valide') btn-success @endif">
                        Conduite
                        </a>
                    </div> --}}
                    <div class="btn-group hidden-phone show">
                        <a  href="{{route('permis-valide')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'permis-valide') btn-success @endif">
                        Permis validé
                        </a>
                    </div>
                    <div class="btn-group hidden-phone show">
                        <a  href="{{route('abandon')}}" class="btn mini blue @if(Route::getCurrentRoute()->getName() == 'abandon') btn-success @endif">
                        Abandon
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
                                <th>Langue de formation</th>
                                <th>Region</th>
                                <th>Province</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $item)
                                <tr>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->nom}} {{$item->prenom}} </a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->telephone}}</a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->genre}}</a></td>                                   
                                    <td><a href="{{route('demande-show', $item->uuid)}}">  {{$item->permis}}</a> </td>                                    
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->langue}}</a></td>                                    
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->region->libelle}}</a></td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->province->libelle}}</a></td>
                                    <td>
                                        @if(Route::getCurrentRoute()->getName() == 'candidatparecole' && $item->code_status != 0 && $item->code_status != -1)
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-check-circle mr-2" ></i>Code validé
                                           </button>
                                        @elseif (Route::getCurrentRoute()->getName() == 'code-valide' && $item->creneau_status != 0 && $item->creneau_status != -1)
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-check-circle mr-2" ></i>Crenau validé
                                           </button>
                                        @elseif(Route::getCurrentRoute()->getName() == 'crenau-valide' && $item->conduite_status != 0 && $item->conduite_status != -1)
                                           <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-check-circle mr-2" ></i>Conduite validée
                                           </button>
                                        @elseif (Route::getCurrentRoute()->getName() == 'conduite-valide' && $item->conduite_status != 0)
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-check-circle mr-2" ></i>Conduite validée
                                           </button>
                                        @elseif(Route::getCurrentRoute()->getName() == 'permis-valide' && $item->permis_status != 0 && $item->permis_status != -1)
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-check-circle mr-2" ></i>Permis validé
                                           </button>
                                        @elseif(Route::getCurrentRoute()->getName() == 'abandon' && $item->abandon_status != 0)
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" disabled>
                                            <i class="fa fa-times-circle mr-2" ></i>Abandonné</button>
                                        @else
                                        @if ($item->code_status == -1)
                                        <button type="button" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}"  disabled >
                                            <i class="fa fa-check mr-2" ></i>Code échoué
                                           </button>
                                           <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" @if($item->abandon_status != 0) disabled @endif>
                                            <i class="fa fa-check mr-2" ></i>Resultat examen
                                           </button>
                                        @elseif($item->creneau_status == -1)
                                            <button type="button" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}"  disabled >
                                            <i class="fa fa-check mr-2" ></i>Créneau échoué
                                           </button>
                                           <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" @if($item->abandon_status != 0) disabled @endif>
                                            <i class="fa fa-check mr-2" ></i>Resultat examen
                                           </button>
                                        @elseif($item->conduite_status == -1)
                                        <button type="button" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}"  disabled >
                                            <i class="fa fa-check mr-2" ></i>Conduite échoué
                                           </button>
                                           <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" @if($item->abandon_status != 0) disabled @endif>
                                            <i class="fa fa-check mr-2" ></i>Resultat examen
                                           </button>
                                        @elseif($item->permis_status == -1)
                                            <button type="button" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}"  disabled >
                                            <i class="fa fa-check mr-2" ></i>Permis échoué
                                           </button>
                                           <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" @if($item->abandon_status != 0) disabled @endif>
                                            <i class="fa fa-check mr-2" ></i>Resultat examen
                                           </button>
                                        @else
                                        <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" @if($item->abandon_status != 0) disabled @endif>
                                            <i class="fa fa-check mr-2" ></i>Resultat examen
                                           </button>
                                        @endif    

                                       @if ($item->abandon_status != 0)   
                              
                                       <button  class="btn btn-sm btn-danger" disabled>
                                       <i class="fa fa-ban mr-2" ></i>Abandonner
                                      </button>
                                       @else
                                       <a href="{{route('candidat-abandonner', $item->uuid)}}" class="btn btn-sm btn-danger" >
                                        <i class="fa fa-ban mr-2" ></i>Abandonner
                                       </a>
                                       @endif
                                        @endif
                                        
                                    </td>
                                </tr>
                                <div class="modal" id="exampleModal{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
                                                                @if(($item->code_status != 1) && ($item->code_status == 0) && ($item->creneau_status == 0) && ($item->conduite_status==0) && ($item->permis_status==0))
                                                                
                                                                
                                                                <option value="1"  >Code validé  </option> 
                                                                <option value="-1"  >Code non validé    </option> 
                                                                @elseif($item->code_status != 0 && $item->code_status == 1  && $item->creneau_status == 0 && $item->conduite_status==0 && $item->permis_status==0)
                                                                    <option value="1"  >Crenau validé  </option> 
                                                                <option value="-1"  >Crenau non validé    </option> 
                                                                @elseif($item->code_status = 1 && $item->creneau_status ==1 && $item->creneau_status !=0 && $item->conduite_status==0 && $item->permis_status==0)
                                                                      <option value="1"  >Conduite validé  </option> 
                                                                      <option value="-1"  >Conduite non validé    </option> 
                                                                @elseif($item->code_status == 1 && $item->creneau_status == 1 && $item->conduite_status==1 && $item->permis_status==0)
                                                                        <option value="1"  >Permis validé  </option> 
                                                                      <option value="-1"  >Permis non validé    </option> 
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
                            </div>
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

