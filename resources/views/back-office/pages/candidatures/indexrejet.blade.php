@extends('layouts.back.master')
@section('css')


@endsection
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@section('b-content')
@include('back-office.partials._breack')
@include('back-office.partials._notification')
<div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="card-title">Les {{$titre}}</h3>
                        </div>
                        <div class="card-body">
                            @if($demandes->count()>0)
                                <div class="table-responsive">
                                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                               
                                                <th class="wd-15p">Nom & prénom</th>
                                                <th class="wd-15p">Téléphone</th>
                                                <th>Type pièce</th>
                                                <th>Reference</th>
                                                <th>Date établissement</th>
                                                <th class="wd-15p">Statut demande</th>
                                                {{-- <th class="wd-15p">Statut paiement</th> --}}
                                                <th class="wd-15p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($demandes as $item)    
                                            <tr>
                                                
                                                <td>{{$item->nom}} {{$item->prenom}}</td>
                                                <td>{{$item->telephone}}</td>
                                                    <td> {{$item->typepiece}} </td>                                    
                                                    <td> {{$item->reference}} </td>                                    
                                                    <td> {{\Carbon\Carbon::parse($item->datedelivrance)->format('d-m-Y')}} </td> 
                                                    <td>
                                                    @if($item->transfere_autoecole_id !=null)
                                            <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">Candidat affecté</span>
                                            @elseif ($item->status_demande== 'selectionne')
                                                <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                    
                                                @elseif ($item->status_demande== 'preselectionne')
                                                <span class="badge badge-pill badge-info mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                @elseif ($item->status_demande== 'rejete')
                                                <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                @else
                                                <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                @endif
                                                </td>
                                                {{-- <td>
                                                @if ($item->status_paiemente== true)
                                                        <span class="badge badge-success-gradient mr-1 mb-1 mt-1">Payée</span>
                                                    @else
                                                        <span class="badge badge-danger-gradient mr-1 mb-1 mt-1">Non payée</span>
                                                    @endif
                                                </td> --}}
                                                <td>

                                                    <a href="{{route('demande-show', $item->uuid)}}" class="btn btn-default btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fe fe-eye"></i></a>		
                                                @if (Auth::user()->profile != 'admin')
                                                   @if ($item->status_demande == null)
                                                    <button type="button" class="btn btn-success btn-sm  mr-2" data-toggle="modal" data-target="#preselection{{$item->uuid}}">Préselectionner</button>
                                                    <button type="button" class="btn btn-danger btn-sm  mr-2" data-toggle="modal" data-target="#rejet">Rejeter</button>

                                                @elseif($item->status_demande == 'preselectionne')
                                                    <button type="button" class="btn btn-success btn-sm  mr-2" data-toggle="modal" data-target="#selection{{$item->uuid}}">Selectionner</button>

                                                    <button type="button" class="btn btn-danger btn-sm  mr-2" data-toggle="modal" data-target="#rejet{{$item->uuid}}">Rejeter</button>
                                                    
                                                
                                                @else
                                                
                                                @endif 
                                                @endif
                                                
                                               
                                                </td>
                                                
                                            </tr>  
                                                <div class="modal" id="selection{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                 <input type="hidden" value="{{$item->uuid}}" name="demandeid">
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
                                                <div class="modal" id="rejet{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                 <input type="hidden" value="{{$item->uuid}}" name="demandeid">
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
                                             <div class="modal" id="preselection{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                 <input type="hidden" value="{{$item->uuid}}" name="demandeid">
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
                                            {{-- <div class="modal" id="exampleModal{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('demnade-status')}}" method="post">
                                                        @method('POST')
                                                        @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="example-Modal2">Modifier le statut de la demande</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <input type="hidden" value="{{$item->uuid}}" name="demandeid">
                                                                        <div class="form-group ">
                                                                            <label class="form-label mt-0">Choisir le statut</label>
                                                                            <select class="form-control select2 custom-select select2-hidden-accessible" data-placeholder="Choose one" tabindex="-1" name="statut" aria-hidden="true">
                                                                                <option label="Choisir le statut">Choisir le statut
                                                                                </option>
                                                                                <option value="preselectionne" @if ($item->status_demande== 'preselectionne')) disabled @endif>Demande préselectionnée</option>                                                                                
                                                                                <option value="selectionne" @if ($item->status_demande== null)) disabled @endif>Demande selectionnée</option>                                                                                
                                                                                <option value="rejete"  >Demande rejetée</option>
                                                                        
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Moifier</button>
                                                            </div>
                                                        </form>
                                                    
                                                    </div>
                                                </div>
                                            </div>    --}}
                                                                                             
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
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
</div>  

@endsection


@section('js')

@endsection


<script language="javascript">
        // $("#checkAll").click(function() {
        //     $('input:checkbox').not(this).prop('checked', this.checked);
        // });
        function transferer() {
            var selected = new Array();
            $('input:checked').each(function() {
                selected.push($(this).attr('value'));
            });
            $('#demandeToTransfer').val(selected)
        }
    </script>
