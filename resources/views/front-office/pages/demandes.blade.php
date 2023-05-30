@extends('layouts.usager.app')
@section('css')


@endsection
<link rel="stylesheet" href="{{URL::asset('css/bootstrap/bootstrap.min.css')}}">

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des candidats sélectionnés pour l'OPC session {{ \Carbon\Carbon::parse($session->date_ouverture)->format('Y')}}</h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Nom & prénom(s)</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Genre</th>                               
                                <th>N° CNIB ou Passport</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $item)   
                            <tr>
                                <td>{{$item->nom}} {{$item->prenom}}</td>
                                <td>{{Carbon\Carbon::parse($item->datenaissance)->format('d-m-Y')}}</td>
                                <td>{{$item->lieunaissance}}</td>
                                <td>{{$item->genre}}</td>
                                <td>{{$item->reference}}</td>
                                
                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

