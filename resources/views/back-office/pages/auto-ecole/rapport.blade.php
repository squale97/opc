@extends('layouts.back.master')
@section('css')


@endsection
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@section('b-content')
<div class="page-header">
    <div>
        <h1 class="page-title">Rapport</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Auto école</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rapport</li>
        </ol>
    </div>
   
</div>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">23,536</h2>
                        <p class="text-white mb-0">Resultats code </p>
                    </div>
                    <div class="ml-auto"> <i class="fa fa-delicious text-white fs-30 mr-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-secondary img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">45,789</h2>
                        <p class="text-white mb-0">Resultats Creneau </p>
                    </div>
                    <div class="ml-auto"> <i class="fa fa-map-signs text-white fs-30 mr-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card  bg-success img-card box-success-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">89,786</h2>
                        <p class="text-white mb-0">resultat Conduite</p>
                    </div>
                    <div class="ml-auto"> <i class="fa fa-car text-white fs-30 mr-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-info img-card box-info-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">43,336</h2>
                        <p class="text-white mb-0">Abandons</p>
                    </div>
                    <div class="ml-auto"> <i class="fa fa-bug text-red fs-30 mr-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>
@endsection


@section('js')

@endsection

