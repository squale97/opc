
        @if ( Session::has('success') )
       
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {!! session('success') !!}
        </div>
        @elseif (Session::has('warning'))

 
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-exclamation mr-2" aria-hidden="true"></i> {!! session('warning') !!}
        </div>
        @elseif (Session::has('danger'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>
            {!! session('danger') !!}
        </div>
        
        @endif

