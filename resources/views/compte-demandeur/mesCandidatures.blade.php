@extends('layouts.app')

@section('content')
    <h3 class="my-3">Annonces aux-quelles vous avez souscrits:</h3>
    @foreach ($profil[0]->annone_recruteurs as $value)
        <?php $annonce = App\Annone_recruteur::find($value->pivot->annone_recruteur_id) ?>
        <div>
            <p><span class="text-bold">Je recherche une: </span>{{ $annonce->poste->nom }} @if($annonce->residente == 1) , résidente @endif</p>
            <p><span class="text-bold">Dans la ville de: </span></p>
            <p><span class="text-bold">Urgent: </span> {{ $annonce->urgent ? 'Oui' : 'Non' }}</p>
            <p><span class="text-bold">heure debut: </span>{{ $annonce->heure_debut }}, <span class="text-bold">heure de fin: </span>{{ $annonce->heure_fin }}</p>
            <p><span class="text-bold">Salaire: </span>{{ $annonce->salaire }}</p>
            <p>Publié par: {{ $annonce->compte_recruteur->nom }}, le {{ $annonce->created_at }}</p>
        </div>
        <hr>
    @endforeach
@endsection
