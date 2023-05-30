@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
    <div class="page-header">
    <div>
        <h1 class="page-title">Paramètres</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
        </ol>
    </div>
    
    </div>
            <div class="row">
                <div class="col-md-12 col-lg-8 offset-md-2">
                    <div class="card">
                      
                        <div class="card-body">
                            @if($parametre->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Montant à payé</th>
                                            <th class="wd-15p">Compte marchand</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parametre as $item)    
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a data-toggle="modal" data-target="#exampleModal{{$item->id}}" href="#">{{$item->montant_payement}}</a></td>
                                            <td><a data-toggle="modal" data-target="#exampleModal{{$item->id}}" href="">{{$item->compte_marchand}}</a></td>
                                            
                                        </tr>  

<!-- MODAL -->
<div class="modal" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modifier les informations</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-parametre', $item->id)}}" enctype="multipart/form-data" id="add-user">
                <div class="modal-body">
                                {{ method_field('patch') }} 
                    
                            @csrf
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="nom">Montant à payé <span class="text-danger">*</span></label>
                                <input type="text"  required name="montant_payement" value="{{ old('montant_payement')?? $item->montant_payement }}" id="montant_payement" class="form-control" />
                                @error('montant_payement')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="nom">Compte marchant <span class="text-danger">*</span></label>
                                <input type="text"  required name="compte_marchand" value="{{ old('compte_marchand')?? $item->compte_marchand }}" id="compte_marchand" class="form-control" />
                                @error('compte_marchand')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="nom">Nom d'utilisateur <span class="text-danger">*</span></label>
                                <input type="text"  required name="username" value="{{ old('username')?? $item->username }}" id="username" class="form-control" />
                                @error('username')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="nom">Mot de passe <span class="text-danger">*</span></label>
                                <input type="text"  required name="password" value="{{ old('password')?? $item->password }}" id="password" class="form-control" />
                                @error('password')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="ministere">Nom ministère <span class="text-danger">*</span></label>
                                <input type="text"  required name="ministere" value="{{ old('ministere')?? $item->ministere }}" id="ministere" class="form-control" />
                                @error('ministere')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="direction">Direction régionale <span class="text-danger">*</span></label>
                                <input type="text"  required name="direction" value="{{ old('direction')?? $item->direction }}" id="direction" class="form-control" />
                                @error('direction')
                                <div class="text-red"> {{$message}}</div>
                                @enderror
                            </div>
                            
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
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
                                            
                            @endif
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
              
            </div>

@endsection


@section('js')

@endsection