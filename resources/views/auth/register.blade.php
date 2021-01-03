@extends('layouts.appAuth')

@section('card')

    @if (($type_compte == 'demandeur') && (!empty($test)))
        @include('include.formDemandeur',compact('type_compte','test'))
    @endif

    @if (($type_compte == 'demandeur') && (!empty($check)))
        @include('include.formDemandeur',compact('type_compte', 'check'))
    @endif

    @if ($type_compte == 'recruteur')
        @include('include.formRecruteur');
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

            $('#register3').hide();
            $('#register4').hide();
            $('#register5').hide();
            // $('#demandeur-form1').submit(function(e){
            //     e.preventDefault();
            //     $('#register1').hide();
            //     $('#register2').show();
            //     var _token = $('input[name=_token]').val();
            //     var postdata = $('#demandeur-form1').serialize();
            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route("registration.demandeur") }}',
            //         data: postdata,
            //         dataType: 'json',
            //         success: function(result) {
            //             // alert(result);
            //             console.log(result);

            //         }
            //     });
            // })
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
            for (let i = 3; i < 6; i++) {
                $('.close_editor'+i).click(function(){
                var x=i-1;
                $('#register'+i).hide();
                $('#register'+x).show();
                });
            }

         })
    </script>
@endsection
