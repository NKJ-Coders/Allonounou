@extends('layouts.app')

@section('content')
    <h1 class="my-3">Publier une annonce:</h1>

    <form id="publier" action="{{ route('annonce-recruteur.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-container">
            <div class="content">
                <!-- SIXIEME ETAPE -->
                <div>
                    <div class="row">
                        @if(Session::has('id_poste') )

                            <div class="col-xs-4 col-md-5"><strong>Poste:</strong> {{ $poste->nom }}</div>
                            <div class="col-xs-8 col-md-7"><strong>Localisation:</strong> {{ $ville->designation }} - {{ $quartier->designation }}({{ $zone->designation }})</div>

                            <div class="col-xs-6 col-md-6">
                                <strong>Les differentes taches sont:</strong>
                                <ul>
                                    <?php $taches = []; ?>
                                    @foreach(Session::get('id_taches') as $key => $value)
                                        <?php $taches = App\Tache::find($value); ?>
                                    @endforeach
                                    @foreach($taches as $tache)
                                        <li>{{ $tache->nom }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <strong>Description:</strong>
                                @if(empty(Session::get('description')))
                                    <small>( Aucune description )</small>
                                @else
                                    {{ Session::get('description') }}
                                @endif
                            </div><br>

                            <div class="col-xs-4 col-md-4"><strong>Type de maison:</strong> {{ Session::get('type_maison') }}</div>
                            <div class="col-xs-4 col-md-4"><strong>Nombre de pieces:</strong> {{ Session::get('piece') }}</div>
                            <div class="col-xs-4 col-md-4"><strong>Taille de la maison:</strong> {{ Session::get('taille_maison') }}</div>
                            <br>
                            <div class="col-xs-6 col-md-8"><strong>Y'a-t-il des personnes agées en prendre charge?</strong> <?= (Session::get('enCharge') == 1) ? 'Oui' : 'Non' ?></div>
                            <div class="col-xs-6 col-md-4"><strong>Nombre d'enfant:</strong> {{ Session::get('nbre_enfant') }}</div>
                            <br>
                            <div class="col-xs-12 col-md-12">
                                @if(Session::has('age_enfant'))
                                    <ul>
                                        <?php $ages = Session::get('age_enfant'); ?>
                                        @foreach($ages[0] as $key => $value)
                                            <li><strong>Age des enfants {{ $key+1 }}: </strong>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <br>
                            <div class="col-xs-6 col-md-6"><strong>Urgent?</strong> <?= (Session::get('urgent') == 1) ? 'Oui' : 'Non' ?></div>
                            <div class="col-xs-6 col-md-6"><strong>Residente?</strong> <?= (Session::get('residente') == 1) ? 'Oui' : 'Non' ?></div>
                        @endif
                    </div><br>
                    @include('include/afficherHoraireTravail')
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label for="salaire">Proposez un Salaire: </label>
                            <input type="text" id="salaire" name="salaire" > 40 000 F CFA
                            <br><small id="checkPrix"></small>
                        </div>
                    </div>
                    <div class="button-group">
                        <a href="" class="btn btn-outline-secondary" id="back5"><span class="fa fa-chevron-left"></span> Précédent</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Quitter</a>
                        <button type="submit" class="btn btn-primary" id="final">Publier</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
