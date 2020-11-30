@extends('layouts.app');

@section('content')
    <h1 class="my-3">Mes annonces:</h1>

    <a class="btn btn-outline-primary my-2" href="{{ route('annonce-recruteur.create') }}"><span class="fa fa-plus"></span> Publier</a>

    @foreach($myAnnonces as $key => $myAnnonce)
        <div>
            <p><span class="text-bold">Je recherche une: </span>{{ $myAnnonce->poste->nom }} @if($myAnnonce->residente == 1) , résidente @endif</p>
            <p><span class="text-bold">Dans la ville de: </span></p>
            <p><span class="text-bold">Urgent: </span> {{ $myAnnonce->urgent ? 'Oui' : 'Non' }}</p>
            <p><span class="text-bold">heure debut: </span>{{ $myAnnonce->heure_debut }}, <span class="text-bold">heure de fin: </span>{{ $myAnnonce->heure_fin }}</p>
            <p><span class="text-bold">Salaire: </span>{{ $myAnnonce->salaire }}</p>
            <p>Publié par: {{ $myAnnonce->compte_recruteur->nom }}, le {{ $myAnnonce->created_at }}</p>
            <div class="text-right">
                <a href="{{ route('annonce-recruteur.edit', ['annonce_recruteur' => $myAnnonce->id]) }}">Modifier</a>
                <form action="{{ route('annonce-recruteur.destroy', ['annonce_recruteur' => $myAnnonce->id]) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Supprimer</button>
                </form>
                <a href="">Candidature(s)</a>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row d-flex justify-content">
        {{ $myAnnonces->links() }}
    </div>
@endsection
