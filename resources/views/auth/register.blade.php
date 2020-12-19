@extends('layouts.appAuth')

@section('card')

    @if ($type_compte == 'demandeur')
        @include('include.formDemandeur')
    @endif

    @if ($type_compte == 'recruteur')
        @include('include.formRecruteur')
    @endif

    {{-- <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> --}}


    <script>
        $(function(){

            $('#register2').hide();
            $('#register3').hide();
            $('#register4').hide();
            $('#register5').hide();
            $('#demandeur-form1').submit(function(e){
                e.preventDefault();
                $('#register1').hide();
                $('#register2').show();
                var _token = $('input[name=_token]').val();
                var postdata = $('#demandeur-form1').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("registration.demandeur") }}',
                    data: postdata,
                    dataType: 'json',
                    success: function(result) {
                        // alert(result);
                        console.log(result);

                    }
                });
            })
            $('#demandeur-form2').submit(function(e){
                e.preventDefault();
                $('#register2').hide();
                $('#register3').show();
                var _token = $('input[name=_token]').val();
                var postdata = $('#demandeur-form2').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("registration.demandeur") }}',
                    data: postdata,
                    dataType: 'json',
                    success: function(result) {
                        // alert(result);
                        console.log(result);

                    }
                });
            })
            $('#demandeur-form3').submit(function(e){
                e.preventDefault();
                $('#register3').hide();
                $('#register4').show();
                var _token = $('input[name=_token]').val();
                var postdata = $('#demandeur-form3').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("registration.demandeur") }}',
                    data: postdata,
                    dataType: 'json',
                    success: function(result) {
                        // alert(result);
                        console.log(result);

                    }
                });
            })
            $('#demandeur-form4').submit(function(e){
                e.preventDefault();
                $('#register4').hide();
                $('#register5').show();
                var _token = $('input[name=_token]').val();
                var postdata = $('#demandeur-form4').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("registration.demandeur") }}',
                    data: postdata,
                    dataType: 'json',
                    success: function(result) {
                        // alert(result);
                        console.log(result);

                    }
                });
            })
            // $('.profil-form'+i).submit(function(e){
            //     e.preventDefault();
            //     var _token = $('input[name=_token]').val();
            //     var postdata = $('.profil-form'+i).serialize();
            //     // alert(postdata) ;
            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route("profil.update") }}',
            //         data: postdata,
            //         dataType: 'json',
            //         success: function(result) {
            //             // alert(result);
            //             // console.log(result);
            //             $("#nom_pere").hide(function(){
            //                 $("#sp1").text(result.nom_pere);
            //             });
            //             $("#nom_mere").hide(function(){
            //                 $("#sp2").text(result.nom_mere);
            //             });
            //             $("#lieu_nais").hide(function(){
            //                 $("#sp3").text(result.lieu_nais);
            //             });
            //             $("#nbre_enfant").hide(function(){
            //                 $("#sp4").text(result.nbre_enfant);
            //             });
            //             $("#personne_proche1").hide(function(){
            //                 $("#sp5").text(result.personne_proche1);
            //             });
            //             $("#personne_proche2").hide(function(){
            //                 $("#sp6").text(result.personne_proche2);
            //             });
            //             $("#personne_proche3").hide(function(){
            //                 $("#sp7").text(result.personne_proche3);
            //             });
            //             $("#personne_proche4").hide(function(){
            //                 $("#sp8").text(result.personne_proche4);
            //             });
            //             $("#telephone_personne_proche1").hide(function(){
            //                 $("#sp9").text(result.telephone_personne_proche1);
            //             });
            //             $("#telephone_personne_proche2").hide(function(){
            //                 $("#sp10").text(result.telephone_personne_proche2);
            //             });
            //             $("#telephone_personne_proche3").hide(function(){
            //                 $("#sp11").text(result.telephone_personne_proche3);
            //             });
            //             $("#telephone_personne_proche4").hide(function(){
            //                 $("#sp12").text(result.telephone_personne_proche4);
            //             });
            //             $("#handicape_moteur").hide(function(){
            //                 $("#sp13").text(result.handicape_moteur);
            //             });
            //             $("#handicape_visuel").hide(function(){
            //                 $("#sp14").text(result.handicape_visuel);
            //             });
            //             $("#handicape_des_mains").hide(function(){
            //                 $("#sp15").text(result.handicape_des_mains);
            //             });

            //         }
            //     });
            // })

         })
    </script>
@endsection
