@extends('layouts.app')

@section('content')
    <body>
        <div class="container main-secction">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                    <img src="{{ asset('img/photo-couverture-facebook-.png') }}" defer>
                </div>
                <div class="row user-left-part">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                        <div class="row ">
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                <a id="btn-contact" class="btn btn-success btn-block follow" href="{{ route('compte.modify',['compte_di'=>$compte_demandeur->id]) }}" >Modifier le profil</a>
                            </div>
                            <div class="row user-detail-row">
                                <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                    <div class="border"></div>
                                    <p>FOLLOWER</p>
                                    <span>Allonounou</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                        <h1> {{ $compte_demandeur->nom }}</h1>
                                        <h5>{{ $compte_demandeur->metier }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                            <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Profil Professionnel</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Information détaillé</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                            <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>telephone</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->telephone1 }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>Nom</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->nom }} {{ $compte_demandeur->prenom }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>date Naissance</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->date_nais }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>Situation</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->situation_matrimoniale }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>Profesion</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->metier }}</p>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone 2</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->telephone2 }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone 3</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->telephone3 }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Date d'arret du dernier metier</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->date_arret_dernier_metier }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Age du dernier enfant</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->age_dernier_enfant }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Niveau d'etude</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->niveau_etude }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Langue</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->langue }}</p>
                                                                    </div>
                                                                </div>
                                                    </div>

                                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
