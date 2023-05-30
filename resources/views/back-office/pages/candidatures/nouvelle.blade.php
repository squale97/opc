@extends('layouts.back.master')
@section('css')


@endsection
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@section('b-content')
@include('back-office.partials._breack')
@include('back-office.partials._notification')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Les nouvelles demandes d'inscription au OPC</h3>
            </div>
            <div class="card-body">
                @if($demandes->count()>0)
                <div class="table-responsive">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Nom & prénom</th>
                                <th>Téléphone</th>
                                <th>Date de naissance</th>
                                <th>Lieu naissance</th>
                                <th>Genre</th>
                                <th>Type formation</th>
                                <th>Niveau formation</th>
                                <th>Diplome</th>
                                <th>Type pièce</th>
                                <th>Reference</th>
                                <th>Date établissement</th>
                                
                                <th>Qualification</th>
                                <th>Occupation</th>
                                <th>Permis</th>
                                <th>Langue de formation</th>
                                <th>Region</th>
                                <th>Province</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $item)
                                <tr>
                                    <td><a href="{{route('demande-show', $item->uuid)}}">{{$item->nom}} {{$item->prenom}} </a></td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{Carbon\Carbon::parse($item->datenaissance)->format('d-m-Y')}}  </td>
                                    <td>{{$item->lieunaissance}}</td>
                                    <td>{{$item->genre}}</td>
                                    <td>{{$item->formation->libelle}}</td>
                                    <td> {{$item->niveau->libelle}}</td>                                    
                                    <td> @if($item->diplome == null) Néant @else {{$item->diplome->libelle}} @endif </td>                                    
                                    <td> {{$item->typepiece}} </td>                                    
                                    <td> {{$item->reference}} </td>                                    
                                    <td> {{\Carbon\Carbon::parse($item->datedelivrance)->format('d-m-Y')}} </td>                                    
                                    <td> @if($item->qualification == null) Néant @else {{$item->qualification}} @endif </td>                                    
                                    <td>{{$item->occupation}}</td>                                    
                                    <td> {{$item->permis}} </td>                                    
                                    <td>{{$item->langue}}</td>                                    
                                    <td>{{$item->region->libelle}}</td>
                                    <td>{{$item->province->libelle}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center">
                    <p>Auccune demande disponibles</p>            
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection


<script language="javascript">
        // $("#checkAll").click(function() {
        //     $('input:checkbox').not(this).prop('checked', this.checked);
        // });
        function transferer() {
            var selected = new Array();
            $('input:checked').each(function() {
                selected.push($(this).attr('value'));
            });
            $('#demandeToTransfer').val(selected)
        }
    </script>
