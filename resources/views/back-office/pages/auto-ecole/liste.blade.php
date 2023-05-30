@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Les Auto écoles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les Auto écoles affectées à la region</li>
        </ol>
    </div>
    
</div>
@include('back-office.partials._notification')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Les auto écoles</h3>
                </div>
                <div class="card-body">
                    @if($ecoles->count()>0)
                        <div class="table-responsive">
                            <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    
                                        <th class="wd-15p"> Libéllé</th>
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ecoles as $item)    
                                    
                                        <td>{{$item->ecoles->denomination}}</td>
                                        
                                        <td>
                                            <a href="{{route('show-ecoles', $item->uuid)}}" class="btn btn-danger btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fe fe-eye"></i></a>		

                                        </td>
                                    </tr>  
                                                                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <p>Auccune auto école disponible</p>            
                        </div>
                    @endif
                </div>
                <!-- TABLE WRAPPER -->
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Les gestionnaires auto école</h3>
                </div>
                <div class="card-body">
                    @if ($users->count()>0)
                        <div class="activity-block">
                            <ul class="task-list user-tasks">
                                @foreach ($users as $user)
                                    <li>
                                        <a href="{{route('showautoecole',$user->uuid)}}"><span class="avatar avatar-md brround cover-image task-icon1 bg-pink">{{$user->nom}}</span></a>
                                        <h6><a href="{{route('showautoecole',$user->uuid)}}">{{$user->nom}}</a><small class="float-right text-muted tx-11">{{$user->created_at}}</small></h6>
                                        <span class="text-muted tx-12">Role : {!! $user->Profil !!} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @else
                        <h5 class="text-center">Aucun utilisateur disponible !</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

            <!-- GRID MODAL -->
            
            <!-- GRID MODAL CLOSED -->
            
@endsection


@section('js')

@endsection

