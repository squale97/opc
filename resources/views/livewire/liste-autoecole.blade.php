<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Les auto écoles</h3>
               
                <button type="button" id="#button1" class="btn btn-sm btn-danger mr-2 transferer" data-toggle="modal"
                    data-target="#multi_trans" onclick="transferer()" >
                    <i class="fa fa-exchange mr-2" ></i>Affecter
                </button>
                
            </div>
            <div class="card-body">
                @if($ecoles->count()>0)
                    <div class="table-responsive">
                        <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <th class="wd-15p">
                                    <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top" id="checkall">
                                        <input class="custom-control-input "  type="checkbox" class="ml-5" wire:model="allEcoles" id="selectall">
                                        <label class="custom-control-label" for="selectall"></label>
                                        </div>

                                    </th>
                                    <th class="wd-15p"> Libéllé</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ecoles as $item)    
                                <td class="inbox-small-cells">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="{{ $item->uuid }}" wire:model="ecolesSelectionnee" id="checkItem-{{ $item->uuid }}">
                                        <span class="custom-control-label"></span>
                                    </label>
                                
                                
                            </td>
                                    <td>{{$item->denomination}}</td>
                                   
                                    <td>
                                        <a href="{{route('show-ecole', $item->uuid)}}" class="btn btn-danger btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fe fe-eye"></i></a>		

                                    </td>
                                </tr>  
                                <div id="multi_trans" class="modal fade" wire:ignore.self tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">            
                                       
                                            <form>
                                                @csrf
                                                <div class="modal-header ">
                                                    <h4 class="modal-title  text-white text-center">Affectation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col-md-2 col-sm-12"></div>
                                                        <div class="col-md-10 col-sm-12">
                                                            <p class=""> Veuiller choisir l'auto école où le candidat sera affecté</p>
                                                            
                                                        </div>
                                                    </div>
                                                    {{-- <input type="hidden" wire:model="demandesSelectionnee" name="demandesSelectionnee" id="demandesSelectionnee"> --}}
                                                   
                                                    <div class="form-group d-flex has-feedback">
                                                       <div class="col-md-10 col-sm-6">
                                                        <select wire:model="transfere_region_id" class="form-control"  value="{{ old('transfere_region_id') }}">
                                                            <option value=""  selected>Veuillez choisir la region</option>
                                                            @foreach ($regions as $item)
                                                            <option value="{{$item->uuid}}">{{$item->libelle }} </option>
                                                            @endforeach
                                                        </select>
                                                            @error('transfere_region_id')
                                                                <div class="text-red"> {{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                                                    <button type="submit"  wire:click.prevent="submit()" class="btn btn-sm  btn-outline-warning">Affecter   </button>
                                                </div>
                                            </form>
                                        </div>
                                </div>                                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center">
                        <p>Auccune auto école disponible</p>            
                    </div>
                @endif
            </div>
            <!-- TABLE WRAPPER -->
        </div>
    </div>
</div>










