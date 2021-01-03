@extends('layouts.app')

@section('content')

<div class="container emp-profile">
    <form method="POST" action="{{ route('registration.demandeur') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-head">
                            <h5>
                                 <?= (!empty($_SESSION['nom'])) ? $_SESSION['nom'].' ' : '' ; ?><?= (!empty($_SESSION['prenom'])) ? $_SESSION['prenom'] : '' ; ?>
                            </h5>
                            <h6>
                                <?= (!empty($_SESSION['metier'])) ? $_SESSION['metier'] : '' ; ?>
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">info personnelle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                {{-- <a style="font-weight: bold" class="btn btn-primary btn-xl" href="{{ route('registration.demandeur',['insert'=>"true"]) }}">s'inscrire</a> --}}
                    <input id="insert" value="true" type="hidden"  name="insert" >
                    <a href="{{ route('registration', ['type_compte' => 'demandeur']) }}"><button style="margin-right: 94px" type="button" class=" close_editor2 btn btn-xs btn-outline-dark btn-xl" id="ts-dark">
                        <span class="fa fa-chevron-left"></span> précedent
                    </button></a>
                    <button style="font-weight: bold" type="submit" class="btn btn-primary btn-xl"> s'inscrire</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Allonounou</p>
                    <span>L’objectif principal de la  </span><br/>
                    <span>plate-forme allonounou est</span> <br>
                    <span>de mettre en relation les </span><br>
                    <span>demandeurs d’emplois de</span><br/>
                    <span>domicile et les familles</span><br/>
                    <span>à la recherche</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['nom'])) ? $_SESSION['nom'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>prenom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['prenom'])) ? $_SESSION['prenom'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>telephone1(login)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['telephone1'])) ? $_SESSION['telephone1'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>date de naissance</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['date_nais'])) ? $_SESSION['date_nais'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>situation matrimoniale</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['situation_matrimoniale'])) ? $_SESSION['situation_matrimoniale'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>age dernier enfant</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['age_dernier_enfant'])) ? $_SESSION['age_dernier_enfant'] : '' ; ?></p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>telephone2</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['telephone2'])) ? $_SESSION['telephone2'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>telephone3</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['telephone3'])) ? $_SESSION['telephone3'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>metier</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['metier'])) ? $_SESSION['metier'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>date arret metier</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['date_arret_dernier_metier'])) ? $_SESSION['date_arret_dernier_metier'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>niveau_etude</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['niveau_etude'])) ? $_SESSION['niveau_etude'] : '' ; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>langue</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= (!empty($_SESSION['langue'])) ? $_SESSION['langue'] : '' ; ?></p>
                                    </div>
                                </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
