
<div class="modal fade" id="niveau_etude" role="dialog" aria-labelledby="image" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Modifier vos informations
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                <form class="form-horizontal demandeur-form10"  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Create the editor container -->
                    <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                        <label for="niveau_etude" class="col-form-label text-md-right">{{ __('Niveau d\'étude*') }}</label>

                        <select name="niveau_etude" id="niveau_etude" class="custom-select">
                            <option value="Pas de diplome" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Pas de diplome") ? "selected" : "" ) : "" ; ?>>Pas de diplôme</option>
                            <option value="Licence" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Licence") ? "selected" : "" ) : "" ; ?>>Licence</option>
                            <option value="Niveau II" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Niveau II") ? "selected" : "" ) : "" ; ?>>Niveau II</option>
                            <option value="Niveau I" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Niveau I") ? "selected" : "" ) : "" ; ?>>Niveau I</option>
                            <option value="Baccalaureat" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Baccalaureat") ? "selected" : "" ) : "" ; ?>>Baccalaureat</option>
                            <option value="Niveau Terminale" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Niveau Terminale") ? "selected" : "" ) : "" ; ?>>Niveau Terminale</option>
                            <option value="Probatoire" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Probatoire") ? "selected" : "" ) : "" ; ?>>Probatoire</option>
                            <option value="Niveau première" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Niveau première") ? "selected" : "" ) : "" ; ?>>Niveau première</option>
                            <option value="BEPC" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "BEPC") ? "selected" : "" ) : "" ; ?>>BEPC</option>
                            <option value="Niveau 3ième" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "Niveau 3ième") ? "selected" : "" ) : "" ; ?>>Niveau 3ième</option>
                            <option value="CEP" <?= (!empty($compte_demandeur->niveau_etude)) ? (($compte_demandeur->niveau_etude == "CEP") ? "selected" : "" ) : "" ; ?>>CEP</option>
                        </select>

                        @error('niveau_etude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="text" name="compte_di" class="form-control" value="{{ $compte_demandeur->id }}" hidden>
                    <hr>
                    <div class="form-group col-12" >
                        <div class="col-md-8 text-right">
                            <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn1">
                                    Valider
                            </button>
                            <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" >
                                Annuler
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
