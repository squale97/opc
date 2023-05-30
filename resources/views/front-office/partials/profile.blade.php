<link rel="stylesheet" href="{{URL::asset('css/profile.css')}}">
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="text-center"> 
                <img src="{{URL::asset('assets/images/users/default-user.png')}}" width="60" class="rounded-circle">
                <h5 class="mt-2">KABORE12</h5>
                <span class="mt-1 clearfix"> <small>abdul@gmail.com</small></span>
            </div>
        </div>
    </div>
    <hr class="" />
    <div class="row mt-1">
        <div class="col-12">
           <!-- <div class="mb-1 d-flex justify-content-between ml-3 mr-3">
                <span><small>Demandes en attentes</small></span>
                <span class="badge  badge-secondary"><small>
                    {{\App\Models\Demande::where('status_demande', '=', null)
                                ->where('user_id',Auth::user()->id )
                                ->orderBy('created_at', 'desc')
                                ->get()->count()}}
                </small></span>
            </div>-->
        </div>
        <div class="col-12">
            <!--<div class="mb-1 d-flex justify-content-between ml-3 mr-3">
                <span><small>Demandes</small></span>
                <span class="badge  badge-secondary"><small>{{\App\Models\Demande::where('user_id',Auth::user()->id )
                                ->orderBy('created_at', 'desc')
                                ->get()->count()}}</small></span>
            </div>-->
        </div>
    </div>
</div>
