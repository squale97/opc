@extends('layouts.usager.app')
@section('css')


@endsection
<link rel="stylesheet" href="{{URL::asset('css/bootstrap/bootstrap.min.css')}}">

@section('content')

<div class="">
	<div class="app-content" id="front">
        <div class="side-app">
            @include('front-office.partials._notification')
            <div class="row">
                @if ($demandes->count()==0)
                    <p class="text-center">Accune demande disponible</p>
                @else

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Les demandes d'inscription à l'OPC soumises </h3>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
										      			 <th>N°</th>
                                                        <th>Nom  </th>
                                                        <th>Prénom(s)  </th>
                                                        <th>Téléphone</th>
                                                        <th>Statut demande</th>
                                                        <th></th>
													</tr>
												</thead>
												<tbody>
                                                @foreach ($demandes as $item)
													<tr>
														<th scope="row">{{$loop->iteration}}</th>
                                                        <td> <a href="{{route('show-demande', $item->uuid)}}">{{$item->nom}} </a>  </td>
                                                        <td> <a href="{{route('show-demande', $item->uuid)}}">{{$item->prenom}} </a></td>
                                                        <td>{{$item->telephone}}</td>
														<td>
                                                             @if ($item->status_demande== 'selectionne')
                                                                <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                                    
                                                                @elseif ($item->status_demande== 'preselectionne')
                                                                <span class="badge badge-pill badge-info mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                                @elseif ($item->status_demande== 'rejete')
                                                                <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                                @else
                                                                <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                            @endif
                                                        </td>
														<td>
                                                            <a href="{{route('show-demande', $item->uuid)}}" class="btn btn-default btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fa fa-eye"></i></a>		
                                                            @if ($item->status_demande == 'selectionne') 
                                                                            
                                                            @if($item->status_paiement == false)
                                                            <a href="#" class="badge badge-pill badge-danger mr-1 mb-1 mt-1" data-toggle="modal" data-target="#exampleModalCenter{{$item->uuid}}">Payer</a>
                                                            
                                                            @else
                                                            @if ($item->complement ==null)
                                                            <a href="#" class="badge badge-pill badge-danger mr-1 mb-1 mt-1" data-toggle="modal" data-target="#complement{{$item->uuid}}"><span>Completer le dossier</a>
                                                            @endif
                                                                    
                                                                @endif                          
                                                            @endif
                                                        </td>
													</tr>
                                    <div class="modal fade modalcomplement" id="complement{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form action="{{ route('complement', $item->uuid) }}" method="POST" class="pl-5 col-md-12" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalCenterTitle">Complément du dossier d'inscription</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                    <div class="row ">
                                                    
                                                        <div class="form-group">
                                                            <div class="form-label">Copie légalisée de la CNIB <span class="text-red">*</span></div>
                                                            <input type="file" class="dropify" name="cnibfile" data-height="300" />
                                                            @error('cnibfile')
                                                            <div class="text-red"> {{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="form-label">Fiche d'inscription <span class="text-red">*</span></div>
                                                        <input type="file" class="dropify" name="fiche1file" data-height="300" />
                                                        @error('diplomefile')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="form-label">Copie légalisée de l'extrait <span class="text-red">*</span></div>
                                                        <input type="file" class="dropify" name="extraitfile" data-height="300" />
                                                        @error('diplomefile')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="form-label">Fiche d'engagement  <span class="text-red">*</span></div>
                                                        <input type="file" class="dropify" name="fichefile" data-height="300" />
                                                        @error('diplomefile')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                        
                                                    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="form-label">Copie légalisée du diplôme exigé <span class="text-red">*</span></div>
                                                        <input type="file" class="dropify" name="diplomefile" data-height="300" />
                                                        @error('diplomefile')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Photo d'identité<span class="text-red">*</span></label>
                                                            <input type="file" class="form-control-file" name="photo" id="exampleFormControlFile1">
                                                        </div>
                                                        @error('photo')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="form-label">Copie simple du permis C</div>
                                                        <input type="file" class="dropify" name="permisfile" data-height="300" />
                                                        @error('permisfile')
                                                        <div class="text-red"> {{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    </div>
                                                    
                                    
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <a href="#!" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</a>
                                                    <button class="btn btn-success"><i class="fa fa-check"></i> Completer</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade modalpaye" id="exampleModalCenter{{$item->uuid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form action="{{ route('payement', $item->uuid) }}" method="POST" class="pl-5 col-md-12">
                                                @csrf
                                                @method('Post')
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title text-white" id="exampleModalCenterTitle">Paiement</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1 class="h1-text text-center mb-4">Payement de {{$parametre->montant_payement}}FCFA </h1>
                                                    <div class="row col-md-12 ">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="form-control-label text-muted" for="telephone">Votre numéro de téléphone</label>
                                                        <input required type="number" class="form-control form-control" name="telephone" id="telephone"
                                                            placeholder="Ex: 76xxxxxx" @error('telephone') is-invalid @enderror
                                                            value="{{ old('telephone') }}">
                                                        @error('telephone')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="form-control-label text-muted" for="otp">Le Code OTP</label>
                                                        <input required type="number" class="form-control form-control" name="otp" id="otp"
                                                            placeholder="Entrez votre Code OTP" @error('otp') is-invalid @enderror value="{{ old('otp') }}">
                                                        @error('otp')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row col-md-12 justify-content-center my-3 px-3">
                                                    <span class="badge badge-primary text-white p-2 paie">Tapez *144*4*6* {{$parametre->montant_payement}} # pour générer le code OTP</span>
                                                    </div>
                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#!" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</a>
                                                    <button class="btn btn-success"><i class="fa fa-check"></i> Payer</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                                @endforeach
													
													
												</tbody>
											</table>
										</div>
									</div>
									<!-- TABLE WRAPPER -->
								</div>
								<!-- SECTION WRAPPER -->
							</div>
						</div>
						<!-- ROW-1 CLOSED -->

                @endif
            </div>
        </div>
	</div>
</div>
@endsection

@section('js')

@endsection
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

