<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js"></script>

    <!-- font-awesome -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}

    <!-- Scripts -->
    {{--
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/ajax.js') }}" defer></script>
    <script src="{{ asset('js/myjs.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/profils.css') }}" defer>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <script src="{{ asset('js/script.js') }}" defer></script> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/customInput.css') }}">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('annonce-demande.list') }}">Voir demandes</a>
                                </li>
                            @endif

                            {{-- @if (Auth::user()->type == 'admin' || Auth::user()->type == 'super admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endif --}}
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
                                    {{ Auth::user()->prenom }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    @if(Route::currentRouteName() == 'profil.create')
        <script>
            $(document).ready(function() {
                $image_crop = $('#image-preview').croppie({
                    enableExif:true,
                    viewport:{
                        width: 200,
                        height: 250,
                        type: 'square'
                    },
                    boundary:{
                        width: 300,
                        height: 300
                    }
                });

                $('#photo').change(function() {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $image_crop.croppie('bind', {
                            url: event.target.result
                        }).then(function() {
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                $('.crop_image').click(function(event) {
                    $image_crop.croppie('result', {
                        type:'canvas',
                        size:'viewport'
                    }).then(function(response) {
                        var _token = $('input[name=_token]').val();
                        // var photo = $('input[name="photo"]'),val();
                        var compte_demandeur_id = $('input[name="compte_demandeur_id"]').val();
                        $.ajax({
                            url: "{{ route('imageCrop') }}",
                            type: 'post',
                            // data: {"photo=" + photo + "&compte_demandeur_id=" + compte_demandeur_id},
                            data: {"photo": response, "id": compte_demandeur_id, _token:_token},
                            dataType: "json",
                            success: function(data) {
                                var crop_image = '<img src="{{ asset('+ data.path +') }}" />';
                                $('#uploaded_image').html(crop_image);
                                var confirm = '<span class="fa fa-check"></span> ' + data.confirmMsg;
                                // var crop_image = '<p>'+data.id+'</p>';
                                $('#confirmMsg').attr('class', 'alert alert-success text-center');
                                $('#confirmMsg').html(confirm);
                                // var text = data.path
                                // $('#text').text(text);
                            }
                        });
                    });
                });
            });
        </script>
    @endif

    @if(request()->is('annonce-recruteur/create'))
        <script>
            // var pays = document.getElementById('pays')[0];
            $(document).ready(function() {
                $('#pays').on('change', function() {
                    // $('#region').val(' ');
                    $('#search_region').empty();

                    var id = $('#search_pays option[value="' + $(this).val() + '"]').attr('label');

                    $.get("{{ route('localisation') }}",
                        {
                            id: id
                        },
                        function(res, status) {
                            var data = JSON.parse(res);
                            if(status === 'success'){
                                for(var i=0; i<data.length; i++){
                                    $('#search_region').append('<option value="'+ data[i].designation +'" label="'+data[i].id+'">');
                                }
                            }
                        }
                    );
                });

                $('#region').on('change', function() {
                    // $('#ville').val(' ');
                    $('#search_ville').empty();

                    var id = $('#search_region option[value="' + $(this).val() + '"]').attr('label');

                    $.get("{{ route('localisation') }}",
                        {
                            id: id
                        },
                        function(res, status) {
                            var data = JSON.parse(res);
                            if(status === 'success'){
                                // console.log(res);
                                for(var j=0; j<data.length; j++){
                                    $('#search_ville').append('<option value="'+ data[j].designation +'" label="'+data[j].id+'">');
                                }
                            }
                        }
                    );
                });

                $('#ville').on('change', function() {
                    // $('#arr').val(' ');
                    $('#search_arr').empty();

                    var id = $('#search_ville option[value="' + $(this).val() + '"]').attr('label');

                    $.get("{{ route('localisation') }}",
                        {
                            id: id
                        },
                        function(res, status) {
                            var data = JSON.parse(res);
                            if(status === 'success'){
                                for(var j=0; j<data.length; j++){
                                    $('#search_arr').append('<option value="'+ data[j].designation +'" label="'+data[j].id+'">');
                                }
                            }
                        }
                    );
                });

                $('#arr').on('change', function() {
                    // $('#quartier').val(' ');
                    $('#search_quartier').empty();

                    var id = $('#search_arr option[value="' + $(this).val() + '"]').attr('label');

                    $.get("{{ route('localisation') }}",
                        {
                            id: id
                        },
                        function(res, status) {
                            var data = JSON.parse(res);
                            if(status === 'success'){
                                for(var j=0; j<data.length; j++){
                                    $('#search_quartier').append('<option value="'+ data[j].designation +'" label="'+data[j].id+'">');
                                }
                            }
                        }
                    );
                });

                $('#quartier').on('change', function() {
                    // $('#zone').val(' ');
                    $('#search_zone').empty();

                    var id = $('#search_quartier option[value="' + $(this).val() + '"]').attr('label');

                    $.get("{{ route('localisation') }}",
                        {
                            id: id
                        },
                        function(res, status) {
                            var data = JSON.parse(res);
                            if(status === 'success'){
                                for(var j=0; j<data.length; j++){
                                    $('#search_zone').append('<option value="'+ data[j].designation +'" label="'+data[j].id+'">');
                                }
                            }
                        }
                    );
                });


            });
        </script>
    @endif

    @if(request()->is('offres/list'))
        <script>
            $('.liker').each(function(i) {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    var annonce_recruteur_id = $(this).attr('id');
                    var liker = $(this);

                    $.get("{{ route('offre.liker') }}",
                        {
                            annonce_recruteur_id: annonce_recruteur_id
                        },
                        function(response, status) {
                            var result = JSON.parse(response);

                            if(result.status === 'like'){
                                // var liker = $(this);
                                setTimeout(() => {
                                    liker.empty();
                                    liker.html('<i class="text-danger fa fa-heart"></i>');
                                }, 1000);
                            } else {
                                // var liker = $(this);
                                setTimeout(() => {
                                    liker.empty();
                                    liker.html('<i class="fa fa-heart"></i>');
                                }, 1000);
                            }
                        }
                    );

                });
            });
        </script>

        <script>
            // candidater a une offre
            $('.candidater').each(function(i) {
                $(this).on('click', function(event) {
                    event.preventDefault();
                    var id_annonce = $(this).attr('id');
                    var candidater = $(this);

                    $.get("{{ route('annonce-recruteur.candidater') }}",
                        {
                            id_annonce: id_annonce
                        },
                        function(res, status) {
                            var result = JSON.parse(res);
                            if(result.status === 'valider'){
                                // var candidater = $('#candidater');
                                setTimeout(() => {
                                    candidater.empty();
                                    candidater.text('Je ne suis plus intéressé(e)');
                                }, 1000);
                            } else {
                                // var candidater = $('#candidater');
                                setTimeout(() => {
                                    candidater.empty();
                                    candidater.text('Je suis intéressé(e)');
                                }, 1000);
                            }

                        }
                    );
                });
            });
        </script>
    @endif

    @if(Route::currentRouteName() === 'annonce-demande.list')
        <script>
            $(function() {
                $('.liker').each(function(i) {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        var annonce_demandeur_id = $(this).attr('id');
                        var liker = $(this);

                        $.get("{{ route('demande.liker') }}",
                            {
                                annonce_demandeur_id: annonce_demandeur_id
                            },
                            function(response, status) {
                                var result = JSON.parse(response);

                                if(result.status === 'like'){
                                    // var liker = $(this);
                                    setTimeout(() => {
                                        liker.empty();
                                        liker.html('<i class="text-danger fa fa-heart"></i>');
                                    }, 1000);
                                } else {
                                    // var liker = $(this);
                                    setTimeout(() => {
                                        liker.empty();
                                        liker.html('<i class="fa fa-heart"></i>');
                                    }, 1000);
                                }
                            }
                        );

                    });
                });

                $('.addToSelection').each(function(i) {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        var id_profil = $(this).attr('id');
                        // var liker = $(this);

                        $.get("{{ route('demande.addList') }}",
                            {
                                id_profil: id_profil
                            },
                            function(response, status) {
                                var result = JSON.parse(response);
                                // console.log(result);
                                for (let propriete in result) {
                                    const donnee = result[propriete];
                                    // ajouter au modal dynamiquement
                                }

                            }
                        );

                    });
                });

                $('.removeToSelection').each(function(i) {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        var id_profil = $(this).attr('id');
                        // var liker = $(this);

                        $.get("{{ route('demande.removeToList') }}",
                            {
                                id_profil: id_profil
                            },
                            function(response, status) {
                                // var result = JSON.parse(response);
                                console.log('ok');
                            }
                        );

                    });
                });

                $('#insert').on('click', function(e) {
                    e.preventDefault();

                    $.get("{{ route('demande.insert') }}",
                        function(res, status) {
                            // var result = JSON.parse(res);
                            // console.log('ok');
                            $('.toClear').empty();
                            $('.toClear').html('<h5 class="text-center text-success"><span class="fa fa-check"></span> Votre sélection a été bien enregistréé!</h5>')
                        }
                    );

                });
            });
        </script>
    @endif
</body>
</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap-grid.min.css'
    media="screen" />
