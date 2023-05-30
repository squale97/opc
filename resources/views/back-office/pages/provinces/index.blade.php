@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
              <div class="page-header">
    <div>
        <h1 class="page-title">Provinces</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les provinces</li>
        </ol>
    </div>
    
     </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                    
                        <div class="card-body">
                            @if($provinces->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Libelle</th>
                                            <th class="wd-15p">Region</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($provinces as $item)    
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('edit-province', $item->uuid)}}">{{$item->libelle}}</a></td>
                                            <td>{{$item->region->libelle}}</td>
                                            
                                        </tr>                                                     
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
                <div class="col-sm-12 col-md-12 col-lg-4">
       
                    @if (isset($province->uuid))
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-province', $province->uuid)}}" id="update-user" enctype="multipart/form-data">
                            {{ method_field('PATCH') }} 
                    @else
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{ route('add-province') }}" enctype="multipart/form-data" id="add-user">
                            {{ method_field('POST') }} 
                    @endif
                        @csrf
                        <h3>Ajouter une province</h3>

                        <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                            <label class="font-weight-bold" for="nom">Libelle <span class="text-danger">*</span></label>
                            <input type="text"  required name="libelle" value="{{ old('libelle')?? $province->libelle }}" id="libelle" class="form-control" />
                            @error('libelle')
                            <div class="text-red"> {{$message}}</div>
                            @enderror
                        </div>
                            <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                                <label class="font-weight-bold" for="user_type">Region</label>
                                <select id="paysId" class="form-control" name="region_id"  value="{{ old('region_id') }}" >
                                    <option selected disabled> Choisir la region</option>
                                    @foreach ($regions as $item)
                                    <option value="{{$item->uuid}}"
                                    @if ($item->uuid == $province->region_id) selected @endif >{{$item->libelle}}</option>
                                    @endforeach
                                </select>
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