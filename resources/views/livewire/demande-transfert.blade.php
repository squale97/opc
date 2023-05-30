<div>
   <div class="row">
        <div class="col-md-12 col-lg-12" id="transfere">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Les demandes d'inscription à l'OPC selectionnées</h3>
                    @if ($isSelect)
                        <button type="button" id="#button1" class="btn btn-sm btn-danger mr-2 transfere" data-toggle="modal"
                            data-target="#multi_trans" onclick="transferer()" >
                            <i class="fa fa-exchange mr-2" ></i>Affecter
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    @if($demandes->count() >0)
                        <div class="table-responsive">
                            <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">
                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top" id="checkall">
                                            <input class="custom-control-input "  type="checkbox" class="ml-5" wire:model="allDemandes" id="selectall">
                                            <label class="custom-control-label" for="selectall"></label>
                                            </div>

                                        </th>
                                        <th class="wd-15p">Nom & prénom</th>
                                        <th class="wd-15p">Téléphone</th>
                                        <th>Type pièce</th>
                                                <th>Reference</th>
                                                <th>Date établissement</th>
                                        <th class="wd-15p">Statut demande</th>
                                                                                
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $item)    
                                    <tr>
                                
                                        <td class="inbox-small-cells">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" @if ($item->status_paiement==false)
                                                    disabled
                                                    @endif  @if ($item->transfere_autoecole_id != null)  disabled @endif  value="{{ $item->uuid }}" wire:model="demandesSelectionnee" id="checkItem-{{ $item->uuid }}">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            
                                            
                                        </td>
                                        <td>{{$item->nom}} {{$item->prenom}}</td>
                                        <td>{{$item->telephone}}</td>
                                        <td> {{$item->typepiece}} </td>                                    
                                                    <td> {{$item->reference}} </td>                                    
                                                    <td> {{\Carbon\Carbon::parse($item->datedelivrance)->format('d-m-Y')}} </td>
                                        <td>
                                           
                                            @if ($item->status_paiement == false)
                                            <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">En attente de paiement</span>
                                            
                                            @else
                                            @if($item->transfere_autoecole_id !=null)
                                            <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">Candidat affecté</span>
                                            @else
                                            <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">Paiement effectué</span>
                                            @endif
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
                                            <a href="{{route('demande-show', $item->uuid)}}" class="btn btn-danger btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fe fe-eye"></i></a>		
                                        {{-- @if ($item->status_paiemente == true) --}}
                                            {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$item->uuid}}">Modifier le statut</button>		 --}}
                                        {{-- @else
                                            <button type="button" class="btn btn-pill btn-default" data-toggle="modal" data-target="#exampleModal{{$item->uuid}}" disabled>Attente de paiement</button>		

                                        @endif --}}
                                        </td>
                                        
                                    </tr>  
                                  
                                        @include('back-office.pages.candidatures.confirme_transfere',
                                        ['modalUrl'=>'admin.demandes.multi-transferer','uuid'=>$item->uuid,'nom'=>$item->nomcomplet,
                                        'ecoles'=>$ecoles

                                        ])                                                
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
</div>
