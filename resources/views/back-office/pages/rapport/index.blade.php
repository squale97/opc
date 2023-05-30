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
                        <table id="exportexample" class="table table-bordered ">
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
                                       @foreach ($regions as $item)
                                       <tr>
                                        <td rowspan="{{$item->provinces->count()+3}}">{{$item->libelle}}</td>
                                    </tr> 
                                        @php
                                                $mo =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->get()->count();
                                                $f0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->get()->count(); 
                                                $m10 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count();
                                                $f10 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count();
                                                $codem0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('code_status', '=', '1')->where('status_demande',  'selection')->get()->count();
                                                $codef0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('code_status', '=', '1')->where('status_demande', 'selection')->get()->count();
                                                $creneaum0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', '=', '1')->get()->count();
                                                $creneauf0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', '=', '1')->get()->count();
                                                $permism0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', '=', '1')->get()->count();
                                                $permisf0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', '=', '1')->get()->count();
                                                $abandonm0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', '=', '1')->get()->count();
                                                $abandonf0 =App\Models\Demande::where('region_id', $item->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', '=', '1')->get()->count();

                                                @endphp
                                        @foreach ($item->provinces as $items)
                                       
                                            <tr>
                                                    
                                                
                                                    <td >
                                                        {{$items->libelle}}
                                                    </td >
                                                    <td >
                                                            
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->get()->count()}}

                                                    </td >
                                                    <td >
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->get()->count()}}
                                                            
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->get()->count() + App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count()}}

                                                    </td >
                                                    <td >
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count() +App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count()}}

                                                    </td >
                                                    <td >
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('code_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('code_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                            {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('code_status', true)->where('status_demande', '!=', 'null')->get()->count() + App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('code_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', true)->where('status_demande', '!=', 'null')->get()->count() + App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', true)->where('status_demande', '!=', 'null')->get()->count() + App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                        {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                    <td >
                                                    {{App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', true)->where('status_demande', '!=', 'null')->get()->count() + App\Models\Demande::where('province_id', $items->uuid )->where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', true)->where('status_demande', '!=', 'null')->get()->count()}}
                                                    </td >
                                                
                                            </tr> 

                                        @endforeach
                                                
                                            <tr class="bg-info">
                                                    
                                                    <td>Total session</td>
                                                  
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
                                                    <td>@if($f0 !=0 ||$mo !=0) {{number_format(((($permism0 +$permisf0) *100)/ ($mo +$f0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                   
                                                    <td>@if($mo !=0) {{number_format((($abandonm0 *100)/ $mo), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 ) {{number_format((($abandonf0 *100)/ $f0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                    <td>@if($f0 !=0 || $mo !=0) {{number_format(((($abandonm0 +$abandonf0) *100)/ ($mo +$f0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                                   
                                                    <td>@if($m10 !=0 || $f10 !=0) {{number_format(((($permism0 + $permisf0) *100)/ ($m10 + $f10)), 2 , '.', '')}} % @else {{0}} % @endif</td>

                                            </tr>
                                         
                                       @endforeach  
                                       <tr class="bg-info">
                                           @php
                                              $tm0 = App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count();
                                              $tf0 = App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count();

                                              $tm= App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('status_demande',  'selectionne')->get()->count();
                                              $tf= App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('status_demande',  'selectionne')->get()->count();
                                              
                                              $tcm =App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('code_status', '=', '1')->get()->count();
                                              $tcf =App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('code_status', '=', '1')->get()->count();

                                              $tcrm =App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', '=', '1')->get()->count();
                                              $tcrf =App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', '=', '1')->get()->count();
                                              $tcom =App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', '=', '1')->get()->count();
                                              $tcof =App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', '=', '1')->get()->count();

                                              $tam =App\Models\Demande::where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', '=', '1')->get()->count();
                                              $taf =App\Models\Demande::where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', '=', '1')->get()->count();
                                           @endphp         
                                        <td>Total Session</td>
                                        <td></td>
                                        
                                        <td>{{$tm0 }}</td>
                                        <td>{{$tf0}} </td>
                                        <td>{{$tm0 + $tf0}}</td>
                                        <td>{{$tm}}</td>
                                        <td>{{$tf}}</td>
                                        <td>{{ $tm + $tf }}</td>
                                        <td>{{$tcm}} </td>
                                        <td>{{$tcf}}</td>
                                        <td> {{ $tcm+ $tcf }}</td>
                                        <td>{{$tcrm}}</td>
                                        <td>{{$tcrf}}</td>
                                        <td>{{$tcrm + $tcrf}}</td>
                                        <td>{{$tcom}}</td>
                                        <td>{{$tcof}}</td>
                                        <td>{{$tcom + $tcof}}</td>
                                        <td>{{$tam}}</td>
                                        <td>{{$taf}}</td>
                                        <td>{{$tam + $taf}}</td>
                                       
                                       
                                        
                                </tr>
                                    <tr class="bg-info">
                                            
                                            <td>Total session</td>
                                          
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>@if($tm0 !=0) {{number_format((($tcm *100)/ $tm0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0) {{ number_format((($tcf *100)/ $tf0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0 || $tm0 !=0) {{number_format(((($tcm +$tcf)*100)/ ($tm0 +$tf0)) , 2 , '.', '')}} % @else {{0}} % @endif</td>
                                            
                                            <td>@if($tm0 !=0) {{number_format((($tcrm *100)/ $tm0), 2 , '.', '') }} %@else {{0}}% @endif</td>
                                            <td>@if($tf0 !=0 ) {{number_format((($tcrf *100)/ $tf0), 2 , '.', '') }} %@else {{0}}% @endif</td>
                                            <td>@if($tf0 !=0 || $tm0 !=0) {{number_format(((($tcrm +$tcrf) *100)/ ($tm0 +$tf0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            
                                            <td>@if($tm0 !=0) {{number_format((($tcom *100)/ $tm0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0 ) {{number_format((($tcof *100)/ $tf0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0 ||$tm0 !=0) {{number_format(((($tcom +$tcof) *100)/ ($tm0 +$tf0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                           
                                            <td>@if($tm0 !=0) {{number_format((($tam *100)/ $tm0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0 ) {{number_format((($taf *100)/ $tf0), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                            <td>@if($tf0 !=0 || $tm0 !=0) {{number_format(((($tam +$taf) *100)/ ($tm0 +$tf0)), 2 , '.', '') }} % @else {{0}} % @endif</td>
                                           
                                            <td>@if($tm !=0 || $tf !=0) {{number_format(((($tcom + $tcof) *100)/ ($tm + $tf)), 2 , '.', '')}} % @else {{0}} % @endif</td>

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

