<div>
    <div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="mail-option">
                                
                                    <div class="btn-group">
                                        <a  href="{{route('candidatparecole')}}" class="btn">
                                        Tous les candidats
                                        </a>
                                    
                                    </div>
                               
                                <div class="btn-group">
                                    <a  data-placement="top" href="{{route('code-valide')}}" class="btn mini tooltips">
                                        Examen code validé
                                    </a>
                                </div>
                                <div class="btn-group hidden-phone show">
                                    <a  href="{{route('crenau-valide')}}" class="btn mini blue" >
                                    Crenau
                                    </a>
                                </div>
                                <div class="btn-group hidden-phone show">
                                    <a  href="{{route('conduite-valide')}}" class="btn mini blue">
                                    Conduite
                                    </a>
                                </div>
                                <div class="btn-group hidden-phone show">
                                    <a  href="{{route('conduite-valide')}}" class="btn mini blue">
                                    Permis
                                    </a>
                                </div>
                                <div class="btn-group hidden-phone show">
                                    <a  href="{{route('conduite-valide')}}" class="btn mini blue">
                                    Abandon
                                    </a>
                                </div>
                                 @if ($isSelect)
                                    <button type="button" id="#button1" class="btn btn-sm btn-default mr-2 transfere" data-toggle="modal"
                                        data-target="#multi_trans" onclick="affecter()" >
                                        <i class="fa fa-exchange mr-2" ></i>Affecter
                                    </button>
                                 @endif
                            </div>
            </div>
            <div class="card-body">
                @if($demandes->count()>0)
                <div class="table-responsive">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                            
                                <th>
                                    
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" wire:model="allDemandes" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label"></span>
                                        </label>
									
                                </th>
                                <th>Nom & prénom</th>
                                <th>Téléphone</th>
                                <th>Genre</th>
                                <th>Permis</th>
                                <th>Langue de formation</th>
                                <th>Region</th>
                                <th>Province</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $item)
                                <tr>
                                
                                    <td class="inbox-small-cells">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label"></span>
                                        </label>
									</td>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->nomcomplet}} </a></td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->genre}}</td>                                   
                                    <td>  {{$item->permis}} </td>                                    
                                    <td>{{$item->langue}}</td>                                    
                                    <td>{{$item->region->libelle}}</td>
                                    <td>{{$item->province->libelle}}</td>
                                </tr>
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
</div>
