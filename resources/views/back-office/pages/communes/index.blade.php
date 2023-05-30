@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
              <div class="page-header">
    <div>
        <h1 class="page-title">Communes</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les communes</li>
        </ol>
    </div>
    
     </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                    
                        <div class="card-body">
                            @if($communes->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Libelle</th>
                                            <th class="wd-15p">Province</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($communes as $item)    
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('edit-commune', $item->uuid)}}">Commune de {{$item->libelle}}</a></td>
                                            <td>{{$item->provinces->libelle}}</td>
                                            
                                        </tr>                                                     
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="text-center">
                                <p>Auccune commune disponible</p>            
                            </div>             
                            @endif
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    @include('back-office.partials._notification')
                    
                    @if (isset($commune->uuid))
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-commune', $commune->uuid)}}" id="update-user" enctype="multipart/form-data">
                            {{ method_field('PATCH') }} 

                            <h3>Modifier {{$commune->libelle}}</h3>
                            <hr>
                    @else
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{ route('add-commune') }}" enctype="multipart/form-data" id="add-user">
                            {{ method_field('POST') }} 
                            <h3>Ajouter une commune</h3>
                        <hr>
                    @endif
                        @csrf
                        
                        <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                            <label class="font-weight-bold" for="nom">Libelle <span class="text-danger">*</span></label>
                            <input type="text"  required name="libelle" value="{{ old('libelle')?? $commune->libelle }}" id="libelle" placeholder="Libelle de la commune" class="form-control" />
                            @error('libelle')
                            <div class="text-red"> {{$message}}</div>
                            @enderror
                        </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="user_type">Province</label>
                                <select id="paysId" class="form-control" name="province_id"  value="{{ old('province_id') }}" >
                                    <option selected disabled> Choisir la province</option>
                                    @foreach ($provinces as $item)
                                    <option value="{{$item->uuid}}"
                                    @if ($item->uuid == $commune->province_id) selected @endif >{{$item->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <div class="form-label">Statut</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="statut" value="{{ true }}" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Commune a statut particulier</span>
                                </label>
                            </div>
                        
                        <div class="btns d-flex justify-content-center col-12 mt-5">
                            <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>
                            {{-- @if (isset($user->uuid)) --}}
                                {{-- <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Modifier</button> --}}
                            {{-- @else --}}
                                {{-- <button type="reset" class="mx-5 btn btn-danger">Réinitialiser</button> --}}
                                <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                            {{-- @endif --}}
                    
                        </div>
                    </form>
                </div>
            </div>

@endsection


@section('js')

@endsection