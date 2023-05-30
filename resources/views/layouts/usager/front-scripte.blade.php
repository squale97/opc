
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js"></script>
    
    
    {{-- <script src="{{URL::asset('js/jquery.min.js')}}"></script> --}}
    <script src="{{URL::asset('js/annim.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
            </script>
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
		  <script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
		  <script src="{{ asset('assets/plugins/datatable/datatable.js') }}"></script>
		  <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		  <script src="{{asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
        @yield('js')