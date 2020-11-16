@extends('layout')

@section('content')
    <h1 class="my-3">Modifier</h1>


    <form action="{{ route('annonce-recruteur.update', ['annonce_recruteur' => $annonce_recruteur->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- <div class="form-group">
            <input type="text" class="form-control col-md-8 @error('compte_recruteur_id') is-invalid @enderror" name="compte_recruteur_id" value="">
        </div> --}}

        <!-- <div class="form-group">
            <input type="email" name="email" id="email" class="form-control col-md-8 " placeholder="Email" value="">
        </div> -->

        <div class="form-group">
            <select name="poste_id" id="poste_id" class="custom-select col-md-8 @error('poste_id') is-invalid @enderror">
                <option value="">Selectionner le poste</option>
                @foreach($postes as $key => $poste)
                    <option value="{{ $poste->id }}" {{ $poste->id == $annonce_recruteur->poste_id ? 'selected' : '' }}>{{ $poste->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <select name="localisation_id" id="localisation_id" class="custom-select col-md-8 @error('localisation_id') is-invalid @enderror">
                <option value="">Selectionner une localisation</option>
                @foreach($localisations as $key => $localisation)
                    <option value="{{ $localisation->id }}" {{ $localisation->id == $annonce_recruteur->localisation_id ? 'selected' : '' }}>{{ $localisation->designation }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            Urgent?
            <select name="urgent" id="urgent" class="custom-select col-md-8 @error('urgent') is-invalid @enderror">
                @foreach($annonce_recruteur->getUrgentOptions() as $key => $value)
                    <option value="{{ $key }}" {{ $annonce_recruteur->urgent == $value ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            Residente?
            <select name="residente" id="residente" class="custom-select col-md-8 @error('residente') is-invalid @enderror">
                @foreach($annonce_recruteur->getResidenteOptions() as $key => $value)
                    <option value="{{ $key }}" {{ $annonce_recruteur->residente == $value ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="form-group">
            <select name="tache_id" id="tache_id" class="custom-select col-md-8 @error('tache_id') is-invalid @enderror">
                <option value="">Selectionner une tache</option>
            </select>
        </div> --}}

        <div class="form-group">
            <input type="text" name="salaire" id="salaire" class="form-control col-md-2 @error('salaire') is-invalid @enderror" placeholder="Salaire" value="{{ old('salaire') ?? $annonce_recruteur->salaire }}">F CFA
            @error('salaire')
                <div class="invalid-feedback">Veuillez bien remplir ce champs</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            Heure de debut:
            <input type="time" name="heure_debut" id="heure_debut" class="form-control col-md-8 @error('heure_debut') is-invalid @enderror" value="{{ old('heure_debut') ?? $annonce_recruteur->heure_debut }}">
            @error('salaire')
                <div class="invalid-feedback">Veuillez definir une heure de debut</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            Heure de fin:
            <input type="time" name="heure_fin" id="heure_fin" class="form-control col-md-8 @error('heure_fin') is-invalid @enderror" value="{{ old('heure_fin') ?? $annonce_recruteur->heure_fin }}">
            @error('salaire')
                <div class="invalid-feedback">Veuillez definir une heure de fin</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
@endsection
