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

        <div class="row" style="padding-right: 25px; padding-left: 25px">
            <div class="col-md-6 my-4">
                <select name="poste_id" id="poste_id" class="custom-select @error('poste_id') is-invalid @enderror">
                    <option value="">Selectionner un poste</option>
                    @foreach($postes as $key => $poste)
                        <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 my-4">
                <select name="tache_id" id="tache_id" class="custom-select @error('tache_id') is-invalid @enderror">
                    <option value="">Selectionner une tache</option>
                    @foreach($taches as $key => $tache)
                        <option value="{{ $tache->id }}">{{ $tache->nom }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="col-md-6 my-4">
                <select name="localisation_id" id="localisation_id" class="custom-select @error('localisation_id') is-invalid @enderror">
                    <option value="">Selectionner une localisation</option>
                    @foreach($localisations as $key => $localisation)
                        <option value="{{ $localisation->id }}">{{ $localisation->designation }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-6">
                <label for="urgent">Urgent?</label>
                <select name="urgent" id="urgent" class="custom-select @error('urgent') is-invalid @enderror">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="residente">Residente?</label>
                <select name="residente" id="residente" class="custom-select @error('residente') is-invalid @enderror">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>

            {{-- <div class="form-group">
                <select name="tache_id" id="tache_id" class="custom-select @error('tache_id') is-invalid @enderror">
                    <option value="">Selectionner une tache</option>
                </select>
            </div> --}}

            <div class="col-md-6 my-4">
                <label for="heure_debut">Heure de debut:</label>
                <input type="time" name="heure_debut" id="heure_debut" class="form-control @error('heure_debut') is-invalid @enderror" value="{{ old('heure_debut') }}">
                @error('salaire')
                    <div class="invalid-feedback">Veuillez definir une heure de debut</div>
                @enderror
            </div>

            <div class="col-md-6 my-4">
                <label for="heure_fin">Heure de fin:</label>
                <input type="time" name="heure_fin" id="heure_fin" class="form-control @error('heure_fin') is-invalid @enderror" value="{{ old('heure_fin') }}">
                @error('salaire')
                    <div class="invalid-feedback">Veuillez definir une heure de fin</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="pays">Pays:</label>
                <input type="text" name="" class="form-control" placeholder="Dans quel pays êtes-vous?" id="pays" list="search_pays">
                <datalist id="search_pays">
                    @foreach($localisations as $localisation)
                        <option value="{{ $localisation->designation }}" label="{{ $localisation->id }}">
                    @endforeach
                </datalist>
            </div>

            <div class="col-md-6">
                <label for="region">Region:</label>
                <input type="text" name="" class="form-control" placeholder="Dans quelle region êtes-vous?" id="region" list="search_region">
                <datalist id="search_region"></datalist>
            </div>

            <div class="col-md-6  my-3">
                <label for="ville">Ville:</label>
                <input type="text" name="" class="form-control" placeholder="Dans quelle ville êtes-vous?" id="ville" list="search_ville">
                <datalist id="search_ville"></datalist>
            </div>

            <div class="col-md-6  my-3">
                <label for="arr">Arrondissement:</label>
                <input type="text" name="" class="form-control" placeholder="Dans quelle ville êtes-vous?" id="arr" list="search_arr">
                <datalist id="search_arr"></datalist>
            </div>

            <div class="col-md-6">
                <label for="quartier">Quartier:</label>
                <input type="text" name="" class="form-control" placeholder="Dans quel quartier êtes-vous?" id="quartier" list="search_quartier">
                <datalist id="search_quartier"></datalist>
            </div>

            <div class="col-md-6">
                <label for="zone">Zone:</label>
                <input required type="text" name="localisation" class="form-control @error('localisation') is-invalid @enderror" value="{{ old('localisation_id') }}" placeholder="Dans quelle zone êtes-vous?" id="zone" list="search_zone">
                <datalist id="search_zone"></datalist>

                @error('localisation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-3 my-3" style="display: flex; justify-content: center">
                <input type="text" name="salaire" id="salaire" class="form-control @error('salaire') is-invalid @enderror" placeholder="Salaire" value="{{ old('salaire') }}">&emsp;<span>FCFA</span>
                @error('salaire')
                    <div class="invalid-feedback">Veuillez bien remplir ce champs</div>
                @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-primary mx-4">Publier</button>
    </form>
@endsection
