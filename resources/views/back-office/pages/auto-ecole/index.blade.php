@extends('layouts.back.master')
@section('css')
@endsection
@livewireStyles

@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Les Auto écoles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Auto écoles</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a href="{{route('add-ecole')}} " class="btn btn-success btn-icon text-white">
            <span>
                <i class="fe fe-plus"></i>
            </span> Ajouter auto école
        </a>
    </div>
</div>
@include('back-office.partials._notification')
@livewire('liste-autoecole', ['ecoles'=>$ecoles])               
@endsection

@section('js')
@endsection
@livewireScripts
