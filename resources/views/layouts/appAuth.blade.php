<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
    <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/validationForms.js') }}" async></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/pages/signin.css') }}" rel="stylesheet" type="text/css">



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

<script src="{{ asset('js/jquery-1.7.2.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.js') }}" defer></script>

<script src="{{ asset('js/signin.js') }}" defer></script>
</body>

 </html>
