@extends('layouts.back.master')
@section('css')

@endsection
 @livewireStyles
@section('b-content')
@include('back-office.partials._breack')
@include('back-office.partials._notification')
    @livewire('demande-transfert', ['demandes'=>$demandes])            
@endsection


@section('js')
@endsection
@livewireScripts
