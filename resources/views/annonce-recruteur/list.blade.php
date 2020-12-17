@extends('layouts.app');

@section('content')
    <h1 class="my-3">Liste des offres:</h1>

    @foreach($allAnnonces as $key => $allAnnonce)
        <div>
            <p><span class="text-bold">Salut, Je recherche une </span>{{ $allAnnonce->poste->nom }} @if($allAnnonce->residente == 1) , résidente @endif . Dans la ville de {{ $allAnnonce->localisation->designation }}</p>
            <p><span class="text-bold">Urgent: </span> {{ $allAnnonce->urgent ? 'Oui' : 'Non' }}</p>
            <p><span class="text-bold">heure debut: </span>{{ $allAnnonce->heure_debut }}, <span class="text-bold">heure de fin: </span>{{ $allAnnonce->heure_fin }}</p>
            <p><span class="text-bold">Salaire: </span>{{ $allAnnonce->salaire }}</p>
            <p class="text-muted">Publié par: <span class="text-bold">{{ $allAnnonce->compte_recruteur->prenom }}</span>, le {{ $allAnnonce->created_at }}</p>
            <div class="text-right" id="btnPostuler">
                <?php
                    $compte = App\Compte_demandeur::find(Auth::user()->id_compte);
                    $hashAnnonce = $compte->annone_recruteurs()->where('annone_recruteur_id', $allAnnonce->id)->exists();
                ?>
                <a class="liker" id="{{ $allAnnonce->id }}" href="" style="text-decoration: none" class="mx-2"> <?php if($hashAnnonce){ ?> <i class="text-danger fa fa-heart"></i> <?php } else { ?> <i class="fa fa-heart"></i> <?php } ?></a>

                <?php
                    // $profil = App\Profil::where('compte_demandeur_id', $compte->id)->first();
                    // $test = $profil->annone_recruteurs()->where('annone_recruteur_id', $allAnnonce->id)->exists();
                ?>
                {{-- <a id="candidater" href=""> <?php //if($test){ ?>Je ne suis plus intéressé(e) <?php //} else { ?> Je suis intéressé(e)  <?php //} ?></a> --}}
                <a href="#" class="mx-2" data-toggle="modal" data-target="#signalerModal{{ $key }}">Signaler</a>
                <a href="#">Partager</a>
            </div>
        </div>

        @include('include/signalerModal')
        <hr>
    @endforeach
    <div class="row d-flex justify-content">
        {{ $allAnnonces->links() }}
    </div>
@endsection
