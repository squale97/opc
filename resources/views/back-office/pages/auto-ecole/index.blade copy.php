@extends('layouts.back.master')
@section('css')


@endsection
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
<div class="row">
                <div class="col-md-12 col-lg-12">
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
                                            
                                                <td>{{$item->denomination}}</td>
                                               
                                                <td>
                                                    <a href="{{route('show-ecole', $item->uuid)}}" class="btn btn-danger btn-sm  mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Voir plus"><i class="fe fe-eye"></i></a>		

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
</div>

            <!-- GRID MODAL -->
            
            <!-- GRID MODAL CLOSED -->
            
@endsection


@section('js')

@endsection

