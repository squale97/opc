@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
@include('back-office.partials._breack')
<div class="row">

    <div   class=" col-lg-8 offset-md-2">
        <div class="tab-content">
            <div class="card">
                    <div class="card-body">
                        <div class="wideget-user">
                            <div class="wideget-user-desc">
                                <div class="user-wrap">
                                    <h4 class="mb-1 text-center">INFORMATIONS DU COMPTE</h4>
                                    <hr>    
                                    <dl class="dl">
                                        <dt>Nom :</dt>
                                        <dd class="text-uppercase"> {{ucFirst($user->nom)}} </dd>
                                        <dt>Prénom :</dt>
                                        <dd> {{$user->prenom}} </dd>
                                        <dt>Role :</dt>
                                        <dd> {{ $user->profile}} </dd>
                                        <dt>Numéro :</dt>
                                        <dd> {{$user->numero}} </dd>
                                        <dt>E-mail :</dt>
                                        <dd> {{$user->email}} </dd>
                                        <dt>Profession :</dt>
                                        <dd> {{$user->profession}} </dd>
                                        
                                    </dl>

                                </div>
                             </div>
                        </div>
                                <div class=" row m-5 d-flex justify-content-center ">
                                    <div class="">
                                    <a href="#" class="btn btn-sm btn-outline-info" onclick="history.go(-1);"><i class="fa fa-undo"></i></a>
                                    @if ( Auth::Guard('admin')->user()->uuid == $user->uuid)
                                    <a data-toggle="tooltip" data-placement="top" title="Modifier votre compte" href="" class="btn btn-sm  btn-primary ml-3"><i class="fa fa-edit"></i></a>
                                    @else
                                        <td class="text-center align-middle">

                                            @if ($user->active == 1)
                                            <a  data-toggle="tooltip" data-placement="top" title="Desactiver ce compte" class="btn btn-sm btn-primary desactive" type="button" onClick=""><i class="fa fa-ban"  aria-hidden="true"></i>
                                                </a>
                                            @else

                                            <a  data-toggle="tooltip" data-placement="top" title="Activer ce compte"class="btn btn-sm btn-primary active" type="button" onClick=""><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            </a>

                                            @endif

                                            {{-- <button  data-toggle="tooltip" data-placement="top" title="Supprimer ce compte" class="btn btn-sm  btn-outline-danger delete" type="button"><i class="fa fa-trash" onClick=""></i></button> --}}
                                            
                                    </td>
                                    @endif
                                </div>

                                </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    @endsection


@section('js')

@endsection
