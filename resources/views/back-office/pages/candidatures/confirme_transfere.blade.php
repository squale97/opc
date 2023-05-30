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
                        <select wire:model="transfere_autoecole_id" class="form-control"  value="{{ old('transfere_autoecole_id') }}">
                            <option value=""  selected>Veuillez choisir l'auto ecole</option>
                            @foreach ($ecoles as $item)
                            <option value="{{$item->uuid}}">{{$item->ecoles->denomination }} </option>
                            @endforeach
                        </select>
                            @error('transfere_autoecole_id')
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








