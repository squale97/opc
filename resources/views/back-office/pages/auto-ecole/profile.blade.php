@extends('layouts.back.master')
@section('css')


@endsection
@section('b-content')
@include('back-office.partials._breack')
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="wideget-user text-center">
					<div class="wideget-user-desc">
						<div class="wideget-user-img">
						
							<img class="" src="{{asset('storage/'.$user->photo)}}" alt="img">
						</div>
						<div class="user-wrap">
							<h4 class="mb-1">{{$user->nom}} {{$user->prenom}}</h4>
							<h5 class="text-muted mb-4">Depuis : {{$user->created_at->format('M / Y')}}</h5>												
							<h6 class="text-muted mb-4"> {{$user->region->libelle}}</h6>												
							<a href="{{route('regenerepass', $user->uuid)}}" class="btn btn-primary mt-1 mb-1">Régénérer mot de passe</a>
							{{-- <a href="#" class="btn btn-secondary mt-1 mb-1" ><i class="fa fa-envelope"></i> E-mail</a> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8" id="profile">
    @include('back-office.partials._notification')

		<div class="card">
			<div class="wideget-user-tab">
				<div class="tab-menu-heading">
					<div class="tabs-menu1">
						<ul class="nav">
							<li class=""><a href="#tab-51" class="show active" data-toggle="tab">Information Personnelle</a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane show active" id="tab-51">
				<div class="card">
					<div class="card-body">
						<div id="profile-log-switch">
							
							<div class="table-responsive ">
								<table class="table row table-borderless">
									<tbody class="col-lg-12 col-xl-6 p-0">
										<tr>
											<td><strong>Nom  :</strong> {{$user->nom}} </td>
										</tr>
										@if ($user->prenom !=null)
											<tr>
											<td><strong>Prénom :</strong> {{$user->prenom}} </td>
										</tr>
										@endif
										@if ($user->profession != null)
										<tr>
											<td><strong>Profession :</strong> {{$user->profession}}</td>
										</tr>
										@endif
										<tr>
											<td><strong>Profil :</strong>{!! $user->profil !!} </td>
										</tr>
									</tbody>
									<tbody class="col-lg-12 col-xl-6 p-0">
										
										<tr>
											<td><strong>Email :</strong> {{$user->email}} </td>
										</tr>
										<tr>
											<td><strong>Téléphone :</strong> {{$user->numero}} </td>
										</tr>
										<tr>
											<td><strong>Region :</strong> {{$user->region->libelle}}</td>
										</tr>
										@if ($user->province != null)
										<tr>
											<td><strong>Province :</strong> {{$user->province->libelle}}</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
							<div class="text-center">
								<a href="javascript:history.go(-1)" class="btn btn-icon  btn-default mt-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Retour"><i class="fa fa-long-arrow-left text-red"></i></a>
								<a href="{{route('edit-user', $user->uuid)}}" class="btn btn-icon btn-primary mt-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier"><i class="fa fa-pencil-square-o "></i></a>
								@if( Auth::user()->uuid != $user->uuid)
								{{-- <a href="javascript:void(0)" class="btn btn-icon btn-danger mt-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"><i class="icon icon-trash"></i></a> --}}
								<a   data-toggle="tooltip" data-placement="top" title="Supprimer ce compte" onClick="event.preventDefault(); deleteConfirm('{{ $user->uuid }}')" class="btn btn-danger btn-sm ml-2" href="{{route('delete-ecole',$user->uuid)}}"><i class="fa fa-trash"></i></a>
                                            <form id="{{ $user->uuid }}" action="{{route('delete-ecole',$user->uuid)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
								@endif
							</div>
	</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div><!-- COL-END -->
	<div>
	
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
	  cancelButtonText: 'Annuller',
      confirmButtonColor: '#e3342f',
    }).then(function (result) {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
}
  </script>