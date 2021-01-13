@extends('layouts.app')

@section('content')

    <div class="text-center">
        <div class="form-group col-md-4">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" id="search_poste" placeholder="Entrez un poste" />
                    <span class="input-group-btn">
                        <a class="btn btn-info btn-lg">
                            <i class="fa fa-search"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <h1 class="my-3">Liste des offres:</h1>

    @foreach($allAnnonces as $key => $allAnnonce)
    <?php
        $quartier = App\Localisation::find($allAnnonce->localisation->id_parent);
        $arr = App\Localisation::find($quartier->id_parent);
        $ville = App\Localisation::find($arr->id_parent);
    ?>
        <div class="template_offre">
            <p><span class="text-bold">Salut, Je recherche une </span>{{ $allAnnonce->poste->nom }} @if($allAnnonce->residente == 1) , résidente @endif . Dans la ville de {{ $ville->designation }}, plus précisement à {{ $quartier->designation }} - {{ $allAnnonce->localisation->designation }}</p>
            <p><span class="text-bold">Urgent: </span> {{ $allAnnonce->urgent ? 'Oui' : 'Non' }}</p>
            <p>
                <span class="text-bold">Horaires de travail: </span>
                <ul>
                @foreach($allAnnonce->jours as $jour)
                    <li>{{ $jour->nom }}: de {{ $jour->pivot->heure_debut }} à {{ $jour->pivot->heure_fin }}</li>
                @endforeach
                </ul>

            </p>
            <p>
                <span class="text-bold">Elle aura comme tache(s): </span>
                <ul>
                    @foreach($allAnnonce->taches as $tache)
                        <li>{{ $tache->nom }}</li>
                    @endforeach
                </ul>
            </p>
            <p><span class="text-bold">Salaire: </span>{{ number_format($allAnnonce->salaire,0,"."," ") }} FCFA</p>
            <?php $timeStamp = explode(' ', $allAnnonce->created_at) ?>
            <p class="text-muted">Publié par: <span class="text-bold">{{ $allAnnonce->compte_recruteur->prenom }}</span>, le {{ $allAnnonce->parseDate($timeStamp[0]) }} à {{ $timeStamp[1] }}</p>
            <div class="text-right" id="btnPostuler">
                @can('liker', App\Annone_recruteur::class)
                    <?php
                        $compte = App\Compte_demandeur::find(Auth::user()->id_compte);
                        $hashAnnonce = $compte->annone_recruteurs()->where('annone_recruteur_id', $allAnnonce->id)->exists();
                    ?>
                    <a class="liker" id="{{ $allAnnonce->id }}" href="" style="text-decoration: none" class="mx-2"> <?php if($hashAnnonce){ ?> <i class="text-danger fa fa-heart"></i> <?php } else { ?> <i class="fa fa-heart"></i> <?php } ?></a>
                @endcan

                <?php
                $compte =[];
                    if(Auth::check()){
                        $compte = App\Compte_demandeur::find(Auth::user()->id_compte);
                        $profil = App\Profil::where('compte_demandeur_id', $compte->id)->first();

                    } else {
                        $profil = [];
                    }
                ?>
                @if(!empty($profil))
                    <?php $test = $profil->annone_recruteurs()->where('annone_recruteur_id', $allAnnonce->id)->exists() ?>
                    <a class="candidater" id="{{ $allAnnonce->id }}" href=""> <?php if($test){ ?>Je ne suis plus intéressé(e) <?php } else { ?> Je suis intéressé(e)  <?php } ?></a>
                @endif
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
