@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <img src="{{ asset('storage/'.$profil[0]->photo) }}" alt="profil">
            </div>
        </div>
        <div class="col-md-10">
            <h3 class="my-3">Mes Infos personnelles:</h3>

            <p>Nom: {{ $compte_demandeur->nom }}</p>
            <p>Age: {{ $compte_demandeur->age }}</p>
            <p>Situation matrimoniale: {{ $compte_demandeur->situation_matrimoniale }}</p>
            <p>Telephone: {{ $compte_demandeur->telephone1 }}</p>
            <p>Age: {{ $compte_demandeur->age }}</p>
        </div>
    </div>
@endsection
