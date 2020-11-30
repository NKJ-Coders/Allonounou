<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Allô<span class="text-danger">Nounou</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/tache/create">Creer une tache</a>
                        </li> --}}
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Accueil <span class="sr-only">(current)</span></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            @if (Auth::user()->type == 'demandeur')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Candidatures') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('mes_candidatures') }}" class="dropdown-item">
                                            {{ __('Mes candidatures') }}
                                        </a>
                                        <a href="" class="dropdown-item">
                                            {{ __('Présélections') }}
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Mes interviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profil.show', ['user' => Auth::id()]) }}">Mon profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('annonce-recruteur.list') }}">Voir offres</a>
                                </li>
                            @endif

                            @if (Auth::user()->type == 'recruteur')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Annonces') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('annonce-recruteur.index') }}" class="dropdown-item">
                                            {{ __('Mes annonces') }}
                                        </a>
                                        <a href="{{ route('annonce-recruteur.create') }}" class="dropdown-item">
                                            {{ __('Publier une annonces') }}
                                        </a>
                                    </div>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="">{{ __('Interviews programmés') }}</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Mes employés') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        <a href="" class="dropdown-item">
                                            {{ __('Actuels') }}
                                        </a>
                                        <a href="" class="dropdown-item">
                                            {{ __('Precedent') }}
                                        </a>
                                    </div>
                                </li>
                            @endif

                            {{-- @if (Auth::user()->type == 'admin') --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            {{-- @endif --}}
                        @endguest


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                                <!-- Mise a jour -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('S\'enregistrer') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('registration', ['type_compte' => 'demandeur']) }}" class="dropdown-item">
                                            {{ __('Compte demandeur') }}
                                        </a>
                                        <a href="{{ route('registration', ['type_compte' => 'recruteur']) }}" class="dropdown-item">
                                            {{ __('Compte recruteur') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            @if (Auth::user()->type == 'demandeur')
                                <li class="nav-item">
                                    <a class="nav-link" href=""><span class="fa fa-bell"></span></a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
