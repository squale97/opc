@extends('layouts.usager.app')
@section('css')


@endsection


@section('content')
<div class="">
	<div class="app-content">
        <div class="side-app">
              <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                @if ($demandes->count()==0)
                    <p class="text-center">Accune demande disponible</p>
                @else
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap mb-0">
                                <thead >
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom & prénom(s)</th>
                                        <th>Téléphone</th>
                                        <th>statut demande</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $item)     
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td><a href="{{route('show-demande', $item->uuid)}}"> {{$item->nomcomplet}}</a></td>
                                        <td>{{$item->telephone}}</td>
                                        <td> 
                                            @if ($item->status_demande== 'selectionne')
                                            <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                                
                                            @elseif ($item->status_demande== 'preselectionne')
                                            <span class="badge badge-pill badge-info mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                            @elseif ($item->status_demande== 'rejete')
                                            <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                            @else
                                            <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">{!! $item->demandestatus!!}</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->
                    </div>
                </div>
                @endif
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
	</div>
</div>

@endsection


@section('js')

@endsection