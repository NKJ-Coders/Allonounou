@extends('layouts.app');

@section('content')
    <h1 class="my-3">Liste des offres:</h1>

    @foreach($allAnnonces as $key => $allAnnonce)
        <div>
            <p><span class="text-bold">Je recherche une: </span>{{ $allAnnonce->poste->nom }} @if($allAnnonce->residente == 1) , résidente @endif</p>
            <p><span class="text-bold">Dans la ville de: </span></p>
            <p><span class="text-bold">Urgent: </span> {{ $allAnnonce->urgent ? 'Oui' : 'Non' }}</p>
            <p><span class="text-bold">heure debut: </span>{{ $allAnnonce->heure_debut }}, <span class="text-bold">heure de fin: </span>{{ $allAnnonce->heure_fin }}</p>
            <p><span class="text-bold">Salaire: </span>{{ $allAnnonce->salaire }}</p>
            <p>Publié par: {{ $allAnnonce->compte_recruteur->nom }}, le {{ $allAnnonce->created_at }}</p>
            <div class="text-right" id="btnPostuler">
                <a href="{{ route('annonce-recruteur.postuler', ['id_annonce' => $allAnnonce->id]) }}" id="post">Postuler</a>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row d-flex justify-content">
        {{ $allAnnonces->links() }}
    </div>
@endsection
