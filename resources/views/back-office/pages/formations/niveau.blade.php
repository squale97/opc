@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
              <div class="page-header">
    <div>
        <h1 class="page-title">Niveaux de formation</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les niveaux de formation</li>
        </ol>
    </div>
    
     </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
@include('back-office.partials._notification')

                    <div class="card">
                    
                        <div class="card-body">
                            @if($formations->count()>0)
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">N°</th>
                                            <th class="wd-15p">Libelle</th>
                                            <th class="wd-15p">Formation</th>
                                            <th class="wd-15p">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($niveaux as $item)    
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('edit-niveau', $item->uuid)}}">{{$item->libelle}}</a></td>
                                            <td>{{$item->formations->libelle}}</td>
                                           <td>
                                            <a onClick="event.preventDefault(); deleteConfirm('{{ $item->uuid }}')" class="btn btn-danger mx-5" href="{{route('delete-niveau',$item->uuid)}}"><i class="fa fa-trash"></i></a>
                                            <form id="{{ $item->uuid }}" action="{{route('delete-niveau', $item->uuid)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                           </td>
                                            
                                        </tr>                                                     
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                            
                            @endif
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
       
                    @if (isset($niveau->uuid))
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{route('update-niveau', $niveau->uuid)}} " id="update-user" enctype="multipart/form-data">
                            {{ method_field('PATCH') }} 
                    @else
                        <form class="bg-white row p-5 mx-0" method="POST" action="{{route('store-niveau')}}" enctype="multipart/form-data" id="add-user">
                            {{ method_field('POST') }} 
                    @endif
                        @csrf
                        <h3>Ajouter un niveau de formation</h3>

                        <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                            <label class="font-weight-bold" for="libelle">Libelle <span class="text-danger">*</span></label>
                            <input type="text"  required name="libelle" value="{{ old('libelle')?? $niveau->libelle }}" id="libelle" class="form-control" />
                            @error('libelle')
                            <div class="text-red"> {{$message}}</div>
                            @enderror
                        </div>
                            
                        <div class="form-group mb-1 col-12 col-xs-12 mb-5">
                            <label class="font-weight-bold" for="user_type">Formation</label>
                            <select id="formation_id" class="form-control" name="formation_id"  value="{{ old('formation_id') }}" >
                                <option selected disabled> Choisir la formation</option>
                                @foreach ($formations as $item)
                                <option value="{{$item->uuid}}"
                                @if ($item->uuid == $niveau->formation_id) selected @endif >{{$item->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="btns d-flex justify-content-center col-12 mt-5">
                            @if (isset($niveau->uuid))
                            
                            <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Modifier</button>
                            @else 
                            <a href="{{url()->previous()}}" class="btn btn-primary px-4 mx-5">&larr; Retour</a>
                                {{-- <button type="reset" class="mx-5 btn btn-danger">Réinitialiser</button> --}}
                                <button type="submit" class="mx-5 btn btn-success"> <i class="fa fa-check"></i> Enregistrer</button>
                             @endif
                    
                        </div>
                        
                    </form>
                </div>
            </div>

@endsection


@section('js')

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.deleteConfirm = function(formId, theTitle, theText) {
    Swal.fire({
      title: theTitle,
      text: theText, 
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      confirmButtonColor: '#e3342f',
	  cancelButtonText: 'Annuller',
    }).then(function (result) {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
}
  </script>