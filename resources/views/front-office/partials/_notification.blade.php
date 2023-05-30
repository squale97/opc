
        @if ( Session::has('success') )

        <div class="alert bg-success  radius-bordered  alert-dismissible fade show" role="alert" >
            <span class="ml-2 mt-1 text-white"> 
                {{-- <i class=" fa fa-check-square-o text-white" aria-hidden="true"  ></i> --}}
                {!! session('success') !!}
            </span>
            <button  class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (Session::has('warning'))

        <div class="alert bg-warning radius-bordered  alert-dismissible fade show" role="alert" >
            <span class="ml-2 mt-1 text-white">
                <i class=" fa fa-exclamation-triangle  " aria-hidden="true"></i>
                {!! session('warning') !!}
            </span>
            <button  class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @elseif (Session::has('danger'))

        <div class="alert bg-danger radius-bordered  alert-dismissible fade show">
            <span class="ml-2 mt-1  text-white">
                <i class="fa fa-ban "></i>
                {!! session('danger') !!}
            </span>
            <button  class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

