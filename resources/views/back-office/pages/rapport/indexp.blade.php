@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

@php
$mo=0;
$f0 =0;
$m10 =0;
$f10 =0;
$codem0 =0;
$codef0 =0;
$creneaum0 =0;
$creneauf0 =0;
$permism0 =0;
$permisf0 =0;
$abandonm0 =0;
$abandonf0 =0;
@endphp

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rapport de la session {{App\Models\Session::where('uuid', $uuid)->first()->created_at->format('Y')}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                        <tr>
                                            <th >Region</th>
                                            <th>Province</th>
                                            <th colspan="3">Pré-inscrit</th>
                                            <th colspan="3">Inscrit</th>
                                            <th colspan="12">Niveau de formation </th>
                                            <th>Pourcentage permis </th>
                                            
                                        </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                            <th colspan="8"></th>
                                            
                                            <th colspan="3">Code</th>
                                            <th colspan="3">Créneau</th>
                                            <th colspan="3">Permis </th>
                                            <th colspan="3">Abandons </th>
                                            <th></th>
                                            
                                        </tr>
                                    <tr>
                                            <th ></th>
                                            <th></th>
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
                                            
                            
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
        
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
                                           
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
                                          
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
                                          
                                            <th>M</th>
                                            <th>F</th>
                                            <th>T </th>
                                           
                                          
                                            
                                        </tr>
                                      
                                       <tr>
                                        <td rowspan="4">{{Auth::user()->region->libelle}}</td>
                                        </tr>                                      
                                       
                                        <tr>
                                                @php
                                                $mo +=$m;
                                                $f0 +=$f; 
                                                $m10 +=$m1;
                                                $f10 +=$f1;
                                                $codem0 +=$codem;
                                                $codef0 +=$codef;
                                                $creneaum0 +=$creneaum;
                                                $creneauf0 +=$creneauf;
                                                $permism0 +=$permism;
                                                $permisf0 +=$permisf;
                                                $abandonm0 +=$abandonm;
                                                $abandonf0 +=$abandonf;

                                                @endphp   
                                               
                                                <td >
                                                      {{Auth::user()->province->libelle}}
                                                </td >
                                                <td >
                                                        {{-- {{App\Models\Demande::where('province_id',Auth::user()->province->uuid )->where('genre','=','M')->get()->count()}} --}}
                                                       {{$m}}
                                                </td >
                                                <td >
                                                        {{$f}}
                                                </td >
                                                <td >
                                                    {{$m+$f}}
                                                </td >
                                                <td >
                                                        {{$m1}}
                                                </td >
                                                <td >
                                                        {{$f1}}
                                                </td >
                                                <td >
                                                        {{$m1 + $f1}}
                                                </td >
                                                <td >
                                                    {{$codem}}
                                                </td >
                                                <td >
                                                        {{$codef}}
                                                </td >
                                                <td >
                                                        {{$codem + $codef}}
                                                </td >
                                                <td >
                                                      {{$creneaum}}
                                                </td >
                                                <td >
                                                   {{$creneauf}}
                                                </td >
                                                <td >
                                                        {{$creneaum + $creneauf}}
                                                </td >
                                                <td >
                                                   {{$permism}}
                                                </td >
                                                <td >
                                                   {{$permisf}}
                                                </td >
                                                <td >
                                                   {{$permism + $permisf}}
                                                </td >
                                                <td >
                                                   {{$abandonm}}
                                                </td >
                                                <td >
                                                    {{$abandonf}}
                                                </td >
                                                <td >
                                                   {{$abandonm + $abandonf}}
                                                </td >
                                               
                                        </tr> 
                                           
                                            
                                          

                                            <tr class="bg-info">
                                                    
                                                    <td>Total</td>
                                                  
                                                    <td>{{$mo}}</td>
                                                    <td>{{$f0}} </td>
                                                    <td>{{$mo +$f0}}</td>
                                                    <td>{{$m10}}</td>
                                                    <td>{{$f10}}</td>
                                                    <td>{{$m10 + $f10}}</td>
                                                    <td>{{$codem0}} </td>
                                                    <td>{{$codef0}}</td>
                                                    <td> {{$codem0 +$codef0 }}</td>
                                                    <td>{{$creneaum0}}</td>
                                                    <td>{{$creneauf0}}</td>
                                                    <td>{{$creneaum0 + $creneauf0}}</td>
                                                    <td>{{$permism0}}</td>
                                                    <td>{{$permisf0}}</td>
                                                    <td>{{$permism0+$permisf0}}</td>
                                                    <td>{{$abandonm0}}</td>
                                                    <td>{{$abandonf0}}</td>
                                                    <td>{{$abandonm0 + $abandonf0}}</td>
                                                   
                                                   
                                                    
                                            </tr>
                                            <tr class="bg-info">
                                                    
                                                    <td>Pourcentage</td>
                                                  
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>@if($mo !=0) {{number_format((($codem0 *100)/ $mo), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0) {{ number_format((($codef0 *100)/ $f0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 || $mo !=0) {{number_format(((($codem0 +$codef0)*100)/ ($mo +$f0)) , 2 , '.', '')}} % @else {{0}} % @endif</td>
                                                    
                                                    <td>@if($mo !=0) {{number_format((($creneaum0 *100)/ $mo), 2 , '.', '') }} %@else {{0}}% @endif</td>
                                                    <td>@if($f0 !=0 ) {{number_format((($creneauf0 *100)/ $f0), 2 , '.', '') }} %@else {{0}}% @endif</td>
                                                    <td>@if($f0 !=0 || $mo !=0) {{number_format(((($creneaum0 +$creneauf0) *100)/ ($mo +$f0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    
                                                    <td>@if($mo !=0) {{number_format((($permism0 *100)/ $mo), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 ) {{number_format((($permisf0 *100)/ $f0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 || $mo !=0) {{number_format(((($permism0 +$permisf0) *100)/ ($mo +$f0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                   
                                                    <td>@if($mo !=0) {{number_format((($abandonm0 *100)/ $mo), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 ) {{number_format((($abandonf0 *100)/ $f0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 || $mo !=0) {{number_format(((($abandonm0 +$abandonf0) *100)/ ($mo +$f0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                   
                                                    <td>@if($m10 !=0 || $f10 !=0) {{number_format(((($permism0 + $permisf0) *100)/ ($m10 + $f10)), 2 , '.', '')}} % @else {{0}} % @endif</td>
                                                    
                                            </tr>
                                                             
                                    </tbody>  
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection

