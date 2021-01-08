@extends('layouts.app')

@section('content')
    <h1 class="my-3">Publier une annonce:</h1>

    @if (session()->has('confirmMsg'))
        <div class="my-2 alert alert-success text-center">{{ session()->get('confirmMsg') }}</div>
    @endif

    @if (session()->has('errorMsg'))
        <div class="my-2 alert alert-warning text-center">{{ session()->get('errorMsg') }}</div>
    @endif

    <form action="/annonce-recruteur" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-group">
            <input type="text" class="form-control @error('compte_recruteur_id') is-invalid @enderror" name="compte_recruteur_id" value="">
        </div> --}}

        <!-- <div class="form-group">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="">
        </div> -->

        <div class="form-container">
            <div class="content">
                <!-- PREMMIERE ETAPE -->
                <div class="" id="is-empty"></div>
                <div id="form1">
                    {{-- {{ dd(Session::all()) }} --}}
                    <div class="row">
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="poste_input">Sélectionnez le poste:</label>
                            <input type="text" name="" class="form-control" placeholder="Selectionnez le poste" id="poste_input" list="poste">
                            <datalist id="poste">
                                @foreach($postes as $key => $poste)
                                    <option value="{{ $poste->nom }}" id="{{ $poste->id }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group col-12 col-xs-8 col-md-8">
                            <label for="">Sélectionner une/plusieurs tâches: <a href="" class="btn btn-danger mx-4" data-toggle="modal" data-target="#selectTacheModal"><span class="fa fa-plus"></span></a></label>
                            @include('include/modalSelectTache')
                            <div class="taches-views"></div>
                        </div>
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="description">Descrivez le poste:</label>
                            <textarea name="" id="description" cols="30" rows="8" class="form-control" placeholder="facultatif"></textarea>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <label>Urgent?</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="1" name="urgent" id="oui">
                                <label for="oui" class="form-check-label"> Oui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="0" name="urgent" id="non">
                                <label class="form-check-label" for="non"> Non</label>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6">

                            <label>Residente?</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="1" name="residente" id="yes">
                                <label for="yes" class="form-check-label"> Oui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="0" name="residente" id="no">
                                <label class="form-check-label" for="no"> Non</label>
                            </div>
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <a class="btn btn-primary" id="step1">Suivant <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- DEUXIEME ETAPE -->
                {{-- <div id="session">{{ Session::flush() }}</div> --}}
                <div id="form2">
                    <div class="row">
                        <div class="form-group col-12 col-xs-8 col-md-8">
                            <label for="">Définissez les horaires de travail: <a href="" class="btn btn-danger mx-4" data-toggle="modal" data-target="#selectJourModal"><span class="fa fa-plus"></span></a></label>
                            @include('include/modalSelectJour')
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="" class="btn btn-outline-secondary" id="back1"><span class="fa fa-chevron-left"></span> Précédent</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <a class="btn btn-primary" id="step2">Suivant <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- TROISIEME ETAPE -->
                <div id="form3">
                    <div class="row">
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="">Type de maison: </label>
                            <select name="" id="type_maisons" class="custom-select form-control">
                                @foreach($type_maisons as $type_maison)
                                    <option value="{{ $type_maison }}">{{ $type_maison }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="">Nombre de pièces: </label>
                            <select name="" id="pieces" class="custom-select form-control">
                                @foreach($pieces as $piece)
                                    <option value="{{ $piece }}">{{ $piece }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="">Dimension de la maison: </label>
                            <select name="" id="taille_maisons" class="custom-select form-control">
                                @foreach($taille_maisons as $taille_maison)
                                    <option value="{{ $taille_maison }}">{{ $taille_maison }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="" class="btn btn-outline-secondary" id="back2"><span class="fa fa-chevron-left"></span> Précédent</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <a class="btn btn-primary" id="step3">Suivant <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- QUATRIEME ETAPE -->
                <div id="form4">
                    <div class="row">
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="">Nombre d'enfants: </label>
                            <input type="number" name="" value="0" id="nbre_enfant" min="0" max="15" class="form-control col-xs-6 col-md-6">
                        </div>
                        <div class="setAge row"></div>
                        <div class="form-group col-xs-8 col-md-8">
                            <label for="">Personne(s) âgée(e) en charge? </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="1" name="enCharge" id="agee_oui">
                                <label for="agee_oui" class="form-check-label"> Oui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="0" name="enCharge" id="agee_non">
                                <label class="form-check-label" for="agee_non"> Non</label>
                            </div>
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="" class="btn btn-outline-secondary" id="back3"><span class="fa fa-chevron-left"></span> Précédent</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <a class="btn btn-primary" id="step4">Suivant <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- CINQUIEME ETAPE -->
                <div id="form5">
                    <div class="row">
                        <div class="form-group col-xs-6 col-md-6">
                            <label for="pays">Pays:</label>
                            <input type="text" name="" class="form-control" placeholder="Dans quel pays êtes-vous?" id="pays" list="search_pays">
                            <datalist id="search_pays">
                                @foreach($localisations as $localisation)
                                    <option value="{{ $localisation->designation }}" label="{{ $localisation->id }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div class="form-group col-xs-6 col-md-6">
                            <label for="region">Region:</label>
                            <input type="text" name="" class="form-control" placeholder="Dans quelle region êtes-vous?" id="region" list="search_region">
                            <datalist id="search_region"></datalist>
                        </div>

                        <div class="form-group col-xs-6 col-md-6">
                            <label for="ville">Ville:</label>
                            <input type="text" name="" class="form-control" placeholder="Dans quelle ville êtes-vous?" id="ville" list="search_ville">
                            <datalist id="search_ville"></datalist>
                        </div>

                        <div class="form-group col-xs-6 col-md-6">
                            <label for="arr">Arrondissement:</label>
                            <input type="text" name="" class="form-control" placeholder="Dans quel arrondissement êtes-vous?" id="arr" list="search_arr">
                            <datalist id="search_arr"></datalist>
                        </div>

                        <div class="form-group col-xs-6 col-md-6">
                            <label for="quartier">Quartier:</label>
                            <input type="text" name="" class="form-control" placeholder="Dans quel quartier êtes-vous?" id="quartier" list="search_quartier">
                            <datalist id="search_quartier"></datalist>
                        </div>

                        <div class="form-group col-xs-6 col-md-6">
                            <label for="zone">Zone:</label>
                            <input required type="text" name="localisation" class="form-control @error('localisation') is-invalid @enderror" value="{{ old('localisation') }}" placeholder="Dans quelle zone êtes-vous?" id="zone" list="search_zone">
                            <datalist id="search_zone"></datalist>

                            @error('localisation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="" class="btn btn-outline-secondary" id="back4"><span class="fa fa-chevron-left"></span> Précédent</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <a href="{{ route('offre.publier') }}" class="btn btn-primary" id="step5">Suivant <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>


            </div>
        </div>
    </form>
@endsection
