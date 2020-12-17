@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
@csrf
@method('PUT')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>Sur Allonounou.cm, trouvez rapidement et en toute securité!</p>
            <input style="text-align: center" name="" value="Allonounou"/><br/>
        </div>

            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Professionnel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Détaillé</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Modifiez vos informations</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone1" class="col-form-label">Telephone1</label>
                                        <input  class="form-control" value="{{ $compte_demandeur->telephone1 }}" type="text" name="telephone1">
                                    </div>
                                    <div class="form-group">
                                        <label for="nom" class="col-form-label">Nom</label>
                                        <input class="form-control" value="{{ $compte_demandeur->nom }}" type="text" name="nom">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="col-form-label">Prenom</label>
                                        <input class="form-control" value="{{ $compte_demandeur->prenom }}" type="text" name="prenom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_nais" class="col-form-label">date naissance</label>
                                        <input value="{{ $compte_demandeur->age }}" type="date" class="form-control" name="date_nais">
                                    </div>
                                    <div class="form-group">
                                        <label for="situation_matrimoniale" class="col-form-label">situation matrimoniale</label>
                                        <select name="situation_matrimoniale" id="situation_matrimoniale" class="custom-select">
                                            <option value="celibataire" <?php if($compte_demandeur->situation_matrimoniale == "celibataire"){ echo "selected"; } ?>  >Celibataire </option>
                                            <option value="marié" <?php if($compte_demandeur->situation_matrimoniale == "marié"){ echo "selected"; } ?> >Marié</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="metier" class="col-form-label">Metier</label>
                                        <input id="age" value="{{ $compte_demandeur->metier }}" type="text" class="form-control" name="metier">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3  class="register-heading">Modifiez vos informations</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone2" class="col-form-label">telephone2</label>
                                        <input id="telephone2" value="{{ $compte_demandeur->telephone2 }}" type="text" class="form-control" name="telephone2">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone3" class="col-form-label">telephone3</label>
                                        <input id="telephone3" value="{{ $compte_demandeur->telephone3 }}" type="text" class="form-control" name="telephone3">
                                    </div>
                                    <div class="form-group">
                                        <label for="age_dernier_enfant" class="col-form-label">Age du dernier enfant</label>
                                        <input value="{{ $compte_demandeur->age_dernier_enfant }}" type="date" class="form-control" name="age_dernier_enfant">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_arret_dernier_metier" class="col-form-label">date arret dernier metier</label>
                                        <input  value="{{ $compte_demandeur->date_arret_dernier_metier }}" type="date" class="form-control" name="date_arret_dernier_metier">
                                    </div>
                                    <div class="form-group">
                                        <label for="niveau_etude" class="col-form-label">Niveau d'etude</label>
                                        <select name="niveau_etude" id="niveau_etude" class="custom-select">
                                            <option value="Pas de diplome" <?php if($compte_demandeur->niveau_etude == "Pas de diplome"){ echo "selected"; } ?> >Pas de diplôme</option>
                                            <option value="Licence" <?php if($compte_demandeur->niveau_etude == "Licence"){ echo "selected"; } ?> >Licence</option>
                                            <option value="Baccalaureat" <?php if($compte_demandeur->niveau_etude == "Baccalaureat"){ echo "selected"; } ?> >Baccalaureat</option>
                                            <option value="Probatoire" <?php if($compte_demandeur->niveau_etude == "Probatoire"){ echo "selected"; } ?> >Probatoire</option>
                                            <option value="BEPC" <?php if($compte_demandeur->niveau_etude == "BEPC"){ echo "selected"; } ?> >BEPC</option>
                                            <option value="CEP" <?php if($compte_demandeur->niveau_etude == "CEP"){ echo "selected"; } ?> >CEP</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="langue" class="col-form-label">Langue</label>
                                        <select name="langue" id="langue" class="custom-select">
                                            <option value="Francais" <?php if($compte_demandeur->langue == "Francais"){ echo "selected"; } ?> >Francais</option>
                                            <option value="Anglais" <?php if($compte_demandeur->langue == "Anglais"){ echo "selected"; } ?> >Anglais</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-md" >Valider</button>
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Annuler</button>
                        </div>
                </div>
            </div>
    </div>
</div>
</form>
@endsection
