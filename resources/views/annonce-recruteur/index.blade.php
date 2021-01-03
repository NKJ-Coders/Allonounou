@extends('layouts.app')

@section('content')
    <h1 class="my-3">Mes annonces:</h1>

    <a class="btn btn-outline-primary my-2" href="{{ route('annonce-recruteur.create') }}"><span class="fa fa-plus"></span> Publier</a>

    @foreach($myAnnonces as $key => $myAnnonce)
        <div>
            <p><span class="text-bold">Salut, Je recherche une </span>{{ $myAnnonce->poste->nom }} @if($myAnnonce->residente == 1) , résidente @endif . Dans la ville de {{ $myAnnonce->localisation->designation }}</p>
            <p><span class="text-bold">Urgent: </span> {{ $myAnnonce->urgent ? 'Oui' : 'Non' }}</p>
            <p>
                <span class="text-bold">Horaires de travail: </span>
                <ul>
                @foreach($myAnnonce->jours as $jour)
                    <li>{{ $jour->nom }}: de {{ $jour->pivot->heure_debut }} à {{ $jour->pivot->heure_fin }}</li>
                @endforeach
                </ul>

            </p>
            <p>
                <span class="text-bold">Elle aura comme tache(s): </span>
                <ul>
                    @foreach($myAnnonce->taches as $tache)
                        <li>{{ $tache->nom }}</li>
                    @endforeach
                </ul>
            </p>
            <p><span class="text-bold">Salaire: </span>{{ number_format($myAnnonce->salaire,0,"."," ") }} FCFA</p>
            <?php $timeStamp = explode(' ', $allAnnonce->created_at) ?>
            <p class="text-muted">Publié le {{ $myAnnonce->parseDate($timeStamp[0]) }} à {{ $timeStamp[1] }}</p>
            <div class="text-right">
                <a href="{{ route('annonce-recruteur.edit', ['annonce_recruteur' => $myAnnonce->id]) }}">Modifier</a>
                <form action="{{ route('annonce-recruteur.destroy', ['annonce_recruteur' => $myAnnonce->id]) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Supprimer</button>
                </form>
                <a href="#" class="mx-2" data-toggle="modal" data-target="#candidatureModal{{ $key }}">Candidature(s)</a>
            </div>
        </div>
        @include('include/candidatureModal')
        <hr>
    @endforeach
    <div class="row d-flex justify-content">
        {{ $myAnnonces->links() }}
    </div>
@endsection
