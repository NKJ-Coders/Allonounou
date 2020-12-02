@extends('layouts.app')

@section('content')
    <div class="row">
        @if (!isset($profil))
            <div class="col-md-2">
                <div class="row">
                    <img src="{{ asset('storage/'.$profil[0]->photo) }}" alt="profil">
                </div>
            </div>
            <div class="col-md-10">
                <h3 class="my-3">Mon profils:</h3>

                <p>Nom: {{ $compte_demandeur->nom }}</p>
                <p>Age: {{ $compte_demandeur->age }}</p>
                <p>Situation matrimoniale: {{ $compte_demandeur->situation_matrimoniale }}</p>
                <p>Telephone: {{ $compte_demandeur->telephone1 }}</p>
                <p>Age: {{ $compte_demandeur->age }}</p>
            </div>
        @endif

        @if (isset($compte_demandeur))
        <div class="col-md-10">
            <h3 class="my-3">Informations du compte:</h3>
            <div  id="list_nom">
                <p>Nom: {{ $compte_demandeur->nom }}</p>
                <button  id="modify_nom" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_nom" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">editer le nom</label>
                    <div class="col-md-6">
                        <input id="nom" placeholder="{{ $compte_demandeur->nom }}" type="text" class="form-contro" name="nom">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div>
                <p id="list_telephone1">telephone1: {{ $compte_demandeur->telephone1 }}</p>
                <button id="modify_telephone1" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_telephone1" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="telephone1" class="col-md-4 col-form-label text-md-right">editer le telephone1</label>
                    <div class="col-md-6">
                        <input id="telephone1" placeholder="{{ $compte_demandeur->telephone1 }}" type="text" class="form-contro" name="telephone1">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_telephone2" >
                <p>telephone whatsapp: {{ $compte_demandeur->telephone2 }}</p>
                <button id="modify_telephone2" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_telephone2" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="telephone2" class="col-md-4 col-form-label text-md-right">editer le telephone whatsapp</label>
                    <div class="col-md-6">
                        <input id="telephone2" placeholder="{{ $compte_demandeur->telephone2 }}" type="text" class="form-contro" name="telephone2">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_telephone3" >
                <p>Telephone3: {{ $compte_demandeur->telephone3 }}</p>
                <button id="modify_telephone3" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_telephone3" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="telephone2" class="col-md-4 col-form-label text-md-right">editer le telephone3</label>
                    <div class="col-md-6">
                        <input id="telephone3" placeholder="{{ $compte_demandeur->telephone3 }}" type="text" class="form-contro" name="telephone3">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_age" >
                <p>Age: {{ $compte_demandeur->age }}</p>
                <button id="modify_age" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_age" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="age" class="col-md-4 col-form-label text-md-right">modifier votre age</label>
                    <div class="col-md-6">
                        <input id="age" placeholder="{{ $compte_demandeur->age }}" type="text" class="form-contro" name="age">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_age_enfant" >
                <p>Age dernier enfant: {{ $compte_demandeur->age_dernier_enfant }}</p>
                <button id="modify_age_enfant" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_age_enfant" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="age_dernier_enfant" class="col-md-4 col-form-label text-md-right">modifier l'age du dernier enfant</label>
                    <div class="col-md-6">
                        <input id="age" placeholder="{{ $compte_demandeur->age_dernier_enfant }}" type="text" class="form-contro" name="age_dernier_enfant">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_metier" >
                <p>Metier: {{ $compte_demandeur->metier }}</p>
                <button id="modify_metier" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_metier" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="metier" class="col-md-4 col-form-label text-md-right">modifier votre metier</label>
                    <div class="col-md-6">
                        <input id="age" placeholder="{{ $compte_demandeur->metier }}" type="text" class="form-contro" name="metier">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_age_metier" >
                <p>Age dernier metier: {{ $compte_demandeur->age_dernier_metier }}</p>
                <button id="modify_age_metier" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_dernier_metier" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="age_dernier_metier" class="col-md-4 col-form-label text-md-right">modifier l'age du dernier metier</label>
                    <div class="col-md-6">
                        <input id="age" placeholder="{{ $compte_demandeur->age_dernier_metier }}" type="text" class="form-contro" name="age_dernier_metier">
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_etude" >
                <p>Niveau d'etude: {{ $compte_demandeur->niveau_etude }}</p>
                <button id="modify_etude" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_etude" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="niveau_etude" class="col-md-4 col-form-label text-md-right">modifier votre niveau d'etude:</label>
                    <div class="col-md-6">
                            <select name="niveau_etude" id="niveau_etude" class="custom-select">
                                <option value="Pas de diplome" <?php if($compte_demandeur->niveau_etude == "Pas de diplome"){ echo "selected"; } ?> >Pas de diplôme</option>
                                <option value="Licence" <?php if($compte_demandeur->niveau_etude == "Licence"){ echo "selected"; } ?> >Licence</option>
                                <option value="Baccalaureat" <?php if($compte_demandeur->niveau_etude == "Baccalaureat"){ echo "selected"; } ?> >Baccalaureat</option>
                                <option value="Probatoire" <?php if($compte_demandeur->niveau_etude == "Probatoire"){ echo "selected"; } ?> >Probatoire</option>
                                <option value="BEPC" <?php if($compte_demandeur->niveau_etude == "BEPC"){ echo "selected"; } ?> >BEPC</option>
                                <option value="CEP" <?php if($compte_demandeur->niveau_etude == "CEP"){ echo "selected"; } ?> >CEP</option>
                            </select>
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_situation" >
                <p>Situation matrimoniale: {{ $compte_demandeur->situation_matrimoniale }}</p>
                <button id="modify_situaation" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_situation" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="situation_matrimoniale" class="col-md-4 col-form-label text-md-right">modifier votre situation maatrimoniale:</label>
                    <div class="col-md-6">
                        <select name="situation_matrimoniale" id="situation_matrimoniale" class="custom-select">
                            <option value="celibataire" <?php if($compte_demandeur->situation_matrimoniale == "celibataire"){ echo "selected"; } ?>  >Celibataire </option>
                            <option value="marié" <?php if($compte_demandeur->situation_matrimoniale == "marié"){ echo "selected"; } ?> >Marié</option>
                        </select>
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
            <div id="list_langue" >
                <p>langue: {{ $compte_demandeur->langue }}</p>
                <button id="modify_langue" type="button" class="  btn btn-md btn-outline-info" id="ts-success">
                    Modifier
                </button>
            </div>
            <form id="form_editor_langue" method="POST" action="{{ route('update',['compte_di'=>$compte_demandeur->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="langue" class="col-md-4 col-form-label text-md-right">modifier la langue</label>
                    <div class="col-md-6">
                        <select name="langue" id="langue" class="custom-select">
                            <option value="Francais" <?php if($compte_demandeur->langue == "Francais"){ echo "selected"; } ?> >Francais</option>
                            <option value="Anglais" <?php if($compte_demandeur->langue == "Anglais"){ echo "selected"; } ?> >Anglais</option>
                        </select>
                    </div>
                </div>
                <div class="col-12" style="text-align:center; margin-top:30px;">
                    <button  type="submit" class="btn btn-md btn-outline-primary" id="ts-success">
                            Valider
                    </button>
                    <button type="button" class=" close_editor btn btn-md btn-outline-dark" id="ts-dark">
                        Annuler
                    </button>

                </div>
            </form>
        </div>

        @endif
    </div>
@endsection
