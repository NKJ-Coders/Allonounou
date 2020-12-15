<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
    <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/signin.js') }}" defer></script>
    @if(request()->is('registration/demandeur'))
    <script src="{{ asset('js/validationForms.js') }}" defer></script>
    @endif
    <script src="{{ asset('js/intlTelInput.min.js') }}" defer></script>
    <script src="{{ asset('js/itl.js') }}" async></script>
    <script src="{{ asset('js/inputphone2.js') }}" async></script>
    <script src="{{ asset('js/inputphone3.js') }}" async></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/pages/signin.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/itl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">



</head>

<body>

	<div class="navbar navbar-fixed-top">

	<div class="navbar-inner">

		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a class="brand" href="index.html">
                Allô<span class="text-danger">Nounou</span>
			</a>

			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">
						<a href="{{ route('login') }}" class="">
							Vous avez déjà un compte? connectez-vous maintenant
						</a>

					</li>
					<li class="">
						<a href="{{ route('home') }}" class="">
							<i class="icon-chevron-left"></i>
							Retour à la page d'accueil
						</a>

					</li>
				</ul>

			</div><!--/.nav-collapse -->

		</div> <!-- /container -->

	</div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

@yield('card')

<script>
    // var pays = document.getElementById('pays')[0];
    $(document).ready(function() {
        $('#pays').on('change', function() {
            // $('#region').val(' ');
            $('#search_region').empty();

            var id = $('#search_pays option[value="' + $(this).val() + '"]').text();

            $.get("{{ route('localisation') }}",
                {
                    id: id
                },
                function(res, status) {
                    var data = JSON.parse(res);
                    if(status === 'success'){
                        for(var i=0; i<data.length; i++){
                            $('#search_region').append('<option value="'+ data[i].designation +'">'+data[i].id+'</option>');
                        }
                    }
                }
            );
        });

        $('#region').on('change', function() {
            // $('#ville').val(' ');
            $('#search_ville').empty();

            var id = $('#search_region option[value="' + $(this).val() + '"]').text();

            $.get("{{ route('localisation') }}",
                {
                    id: id
                },
                function(res, status) {
                    var data = JSON.parse(res);
                    if(status === 'success'){
                        // console.log(res);
                        for(var j=0; j<data.length; j++){
                            $('#search_ville').append('<option value="'+ data[j].designation +'">'+data[j].id+'</option>');
                        }
                    }
                }
            );
        });

        $('#ville').on('change', function() {
            // $('#arr').val(' ');
            $('#search_arr').empty();

            var id = $('#search_ville option[value="' + $(this).val() + '"]').text();

            $.get("{{ route('localisation') }}",
                {
                    id: id
                },
                function(res, status) {
                    var data = JSON.parse(res);
                    if(status === 'success'){
                        for(var j=0; j<data.length; j++){
                            $('#search_arr').append('<option value="'+ data[j].designation +'">'+data[j].id+'</option>');
                        }
                    }
                }
            );
        });

        $('#arr').on('change', function() {
            // $('#quartier').val(' ');
            $('#search_quartier').empty();

            var id = $('#search_arr option[value="' + $(this).val() + '"]').text();

            $.get("{{ route('localisation') }}",
                {
                    id: id
                },
                function(res, status) {
                    var data = JSON.parse(res);
                    if(status === 'success'){
                        for(var j=0; j<data.length; j++){
                            $('#search_quartier').append('<option value="'+ data[j].designation +'">'+data[j].id+'</option>');
                        }
                    }
                }
            );
        });

        $('#quartier').on('change', function() {
            // $('#zone').val(' ');
            $('#search_zone').empty();

            var id = $('#search_quartier option[value="' + $(this).val() + '"]').text();

            $.get("{{ route('localisation') }}",
                {
                    id: id
                },
                function(res, status) {
                    var data = JSON.parse(res);
                    if(status === 'success'){
                        for(var j=0; j<data.length; j++){
                            $('#search_zone').append('<option value="'+ data[j].designation +'">'+data[j].id+'</option>');
                        }
                    }
                }
            );
        });
    });
</script>
</body>

 </html>
