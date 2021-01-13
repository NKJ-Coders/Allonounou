@extends('layouts.app');

@section('content')
    <div class="text-right">
        <a class="btn btn-default" style="background: #FD3F92" title="Filtrer les annonces" data-toggle="collapse" data-target="#demo"><i class="fa fa-filter"></i></a>
    </div>
    <div style="background: #FD6C9E; padding: 10px" id="demo" class="collapse">
        <div class="row">
            <div class="form-group col-md-4">
                <select class="custom-select" name="poste" id="poste">
                    <option value="tous">Tous les postes</option>
                    @foreach($postes as $poste)
                        <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <input type="range" class="range col-md-8" name="age" min="18" max="60" step="1" value="50"/>
                <output></output>
            </div>
            <div class="form-group col-md-4">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" id="localisation" placeholder="Douala" />
                        <span class="input-group-btn">
                            <a class="btn btn-info btn-lg">
                                <i class="fa fa-search"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="btn btn-outline-secondary">Annuler</a>
            <a href="" class="btn btn-primary" id="actualiser">Actualiser</a>
        </div>
    </div>
    <h1 class="my-3">Liste des demandes:</h1>
    @can('addList', App\Annonce_demandeur::class)
        <a href="" class="btn btn-warning my-3" data-toggle="modal" data-target="#selectCandidateModal">Valider les profils</a>
    @endcan

    @foreach($allAnnonces as $key => $allAnnonce)
        <div class="template">
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

                <a href="#" class="mx-3" data-toggle="modal" data-target="#signalerDemandeModal{{ $allAnnonce->id }}">Signaler</a>
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
