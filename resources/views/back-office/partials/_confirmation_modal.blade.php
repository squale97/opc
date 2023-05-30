                         <div class="modal" id="exampleModal{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="example-Modal2">Resultat de l'examen du code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
											<label class="form-label mt-0">Choisir le statut</label>
											<select class="form-control select2 custom-select select2-hidden-accessible" data-placeholder="Choose one" tabindex="-1" aria-hidden="true">
												<option label="Choisir le statut">
												</option>
												<option value="preselectionne">Demande préselectionnée</option>
												<option value="selectionne">Demande selectionneé</option>
												<option value="rejete">Demande rejetée</option>
										
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
            </div>  