@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Sessions</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Session</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a href="{{route('add-session')}} " class="btn btn-success btn-icon text-white">
            <span>
                <i class="fe fe-plus"></i>
            </span> Ajouter session
        </a>
    </div>
</div>
@include('back-office.partials._notification')

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                    
                        <div class="card-body">
                            @if($sessions->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">titre</th>
                                            <th class="wd-15p">Nombre candidat</th>
                                            <th class="wd-15p">Date ouverture</th>
                                            <th class="wd-15p">Date fermeture</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessions as $item)    
                                        <tr>
                                            <td> {{$loop->iteration}}</td>
                                            <td><a href="{{route('show-session', $item->uuid)}}">{{$item->titre}}</a></td>
                                            <td><a href="{{route('show-session', $item->uuid)}}">{{$item->nombre_candidat}}</a></td>
                                            <td><a href="{{route('show-session', $item->uuid)}}">{{$item->date_ouverture}}</a></td>
                                            <td><a href="{{route('show-session', $item->uuid)}}">{{$item->date_fermeture}}</a></td>
                                            
                                        </tr>                                                     
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                     <div>
                                        <p>Aucune session disponible</p>     
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