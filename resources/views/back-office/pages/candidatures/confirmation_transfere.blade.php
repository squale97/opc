

  <div id={!! $idModal !!} class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('demandes-transfert',$uuid) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header text-center">
                    <h4 class="modal-title text-center  text-danger">Affectation </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-2 col-sm-12"></div>
                        <div class="col-md-10 col-sm-12">
                            <p class="">Veuiller choisir l'auto école où le candidat sera affecté.</p>
                           
                        </div>
                    </div>
                   
                    <div class="form-group d-flex has-feedback">
                       <div class="col-md-10 col-sm-6">
                       @if ($ecoles->count()>0)
                          <select name="transfere_autoecole_id" class="form-control" id="transfere_autoecole_id" value="{{ old('transfere_autoecole_id') }}">
                            <option value="" disabled selected>Veuillez choisir l'auto école</option>
                            @foreach ($ecoles as $item)
                            <option value="{{$item->uuid}}">{{$item->ecoles->denomination }} </option>
                            @endforeach
                        </select> 
                       @else
                           <select required disabled class="form-control" id="transfere_autoecole_id" value="{{ old('transfere_autoecole_id') }}">
                            <option value="" disabled selected>Pas d'auto école dans votre province pour le moment</option>
                           
                        </select> 
                       @endif
                        
                        </div>
                    </div>
                   
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Affecter</button>
                </div>
            </form>
        </div>
    </div>
