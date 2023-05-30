@extends('layouts.usager.app')
@section('css')
@livewireStyles
@endsection

@section('content')
 @include('front-office.partials._notification')

   @livewire('demande-user') 
@endsection

@section('js')
@livewireScripts
@endsection
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script>
    function selectBureau(selectOptionName, selectIdShow, messageOpption, province = []) {
        let valueOption = selectOptionName.options[selectOptionName.selectedIndex].value;
        if (valueOption != null && valueOption != 'null') {
            $('select[name="' + selectIdShow + '"]').empty();
            $('select[name="' + selectIdShow + '"]').append('<option value="" selected disabled>' + messageOpption + '</option>');
            if (province.length >= 1) {
                province.forEach(value => {
                    let optionSelected = '';

                    if (valueOption == value.region_id) {
                        $('select[name="' + selectIdShow + '"]').append('<option value="' + value.uuid + '" ' + optionSelected + '>' + value.libelle + '</option>');
                    }
                });
            } else {
                $('select[name="' + selectIdShow + '"]').append('<option value="" disabled>Aucune province disponible </option>');
            }
            $('select').formSelect();
        } else {
            // $('select[name="' + selectIdShow + '"]').empty();
        }
    }

    var onloadCallback = function() {

    };
</script> 
<script type="text/javascript">
    function selectionChanged() {

        if ($("#gene").val() == "Enseignement général") {

            $("#professionnelle").hide();

            $("#generale").show(); //should already be hidden

        }

    }

    function selectionChanged1() {

        if ($("#prof").val() == "Formation professionnelle") {

            $("#generale").hide();

            $("#professionnelle").show(); //should already be hidden

        }

    }
</script>
<script type="text/javascript">
    function ShowHideDivx() {
        var chkYes = document.getElementById("prof");
        var tgi = document.getElementById("professionnelle");
        tgi.style.display = chkYes.checked ? "block" : "none";
    }
</script>
<script type="text/javascript">
 function selectionPermisC() {

        if ($("#permis").val() == "Permis C") {

            $("#prmisfile").hide(); //should already be hidden
           console.log('ok')


        }

    }
    function selectionPermisD() {

           console.log('ok 1')
        if ($("#permis1").val() == "Permis D") {

            $("#prmisfile").show(); //should already be hidden

        }

    }
   
</script>
