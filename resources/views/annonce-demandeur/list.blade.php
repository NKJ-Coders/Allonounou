@extends('layouts.app');

@section('content')
    <h1 class="my-3">Liste des demandes:</h1>
    @can('addList', App\Annonce_demandeur::class)
        <a href="" class="btn btn-warning my-3" data-toggle="modal" data-target="#selectCandidateModal">Valider les profils</a>
    @endcan

    @foreach($allAnnonces as $key => $allAnnonce)
        <div>
            <?php
                $zone = $allAnnonce->profil->compte_demandeur->localisation;
                $quartier = App\Localisation::find($zone->id_parent);
                $arr = App\Localisation::find($quartier->id_parent);
                $ville = App\Localisation::find($arr->id_parent);
            ?>
            <p><span class="text-bold">Salut, Je suis une </span>{{ $allAnnonce->poste->nom }}. Dans la ville de {{ $ville->designation }}</p>
            <p class="text-muted">Publié par: <span class="text-bold">{{ $allAnnonce->profil->compte_demandeur->prenom }}</span>, le {{ $allAnnonce->created_at }}</p>
            <div class="text-center" id="btnPostuler">
                @can('liker', App\Annonce_demandeur::class)
                    <?php
                        $compte = App\Compte_recruteur::find(Auth::user()->id_compte);
                        $hashAnnonce = $compte->likes()->where('annonce_demandeur_id', $allAnnonce->id)->exists();
                    ?>
                    <a class="liker" id="{{ $allAnnonce->id }}" href="" style="text-decoration: none" class="mx-4"> <?php if($hashAnnonce){ ?> <i class="text-danger fa fa-heart"></i> <?php } else { ?> <i class="fa fa-heart"></i> <?php } ?></a>
                @endcan

                <a href="" id="{{ $allAnnonce->id }}" class="addToSelection mx-3" style="text-decoration: none">Ajouter à la sélection</a>

                <a href="#" class="mx-3" data-toggle="modal" data-target="#signalerDemandeModal{{ $key }}">Signaler</a>
                <a href="#">Partager</a>
            </div>
        </div>

        @include('include/signalerDemandeModal')
        @include('include/selectCandidateModal')
        <hr>
    @endforeach
    <div class="row d-flex justify-content">
        {{ $allAnnonces->links() }}
    </div>
@endsection
