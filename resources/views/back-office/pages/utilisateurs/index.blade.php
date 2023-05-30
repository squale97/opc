@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Utilisateurs</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a href="{{route('addusers')}} " class="btn btn-success btn-icon text-white">
            <span>
                <i class="fe fe-plus"></i>
            </span> Ajouter Utilisateur
        </a>
    </div>
</div>
@include('back-office.partials._notification')

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tous les utilisateurs</h3>
                        </div>
                        <div class="card-body">
                            @if($users->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Photo</th>
                                            <th class="wd-15p">Nom &Prenom</th>
                                            <th class="wd-20p">Téléphone</th>
                                            <th class="wd-10p">Profil</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="align-middle text-center">
                                               {{$loop->iteration}}
											</td>
                                            <td class="align-middle text-center"><img alt="" class="avatar avatar-md rounded-circle" src="{{asset('storage/'.$item->photo)}}"></td>
                                            <td>{{$item->nom}} {{$item->prenom}}</td>
                                            <td>{{$item->numero}}</td>
                                            <td>{!!$item->profil !!}</td>
                                            
                                            <td>
                                                <a href="{{route('showusers', $item->uuid)}}" class="btn btn-danger btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="icon icon-eye"></i></a>
											</td>
                                        </tr>
                                     @endforeach                                                   
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div>
                                <p>Aucun utilisateur disponible</p>     
                            </div>   
                            @endif
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
            </div>

@endsection


@section('js')

@endsection