<div class="modal fade" id="situation_matrimoniale" role="dialog" aria-labelledby="image" aria-hidden="true">
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
                <form class="form-horizontal demandeur-form4"  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Create the editor container -->
                    <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                        <label for="detail"><strong>Modifier de situation</strong></label>

                        <div class="field">
                            <select required name="situation_matrimoniale" id="situation_matrimoniale" class="custom-select">
                                <option value="celibataire" <?= (!empty($compte_demandeur->situation_matrimoniale)) ? (($compte_demandeur->situation_matrimoniale == "celibataire") ? "selected" : "" ) : "" ; ?> >Celibataire</option>
                                <option value="marié" <?= (!empty($compte_demandeur->situation_matrimoniale)) ? (($compte_demandeur->situation_matrimoniale == "marié") ? "selected" : "" ) : "" ; ?> >Marié</option>
                                <option value="divorcé" <?= (!empty($compte_demandeur->situation_matrimoniale)) ? (($compte_demandeur->situation_matrimoniale == "divorcé") ? "selected" : "" ) : "" ; ?> >Divorcé</option>
                                <option value="voeuve" <?= (!empty($compte_demandeur->situation_matrimoniale)) ? (($compte_demandeur->situation_matrimoniale == "voeuve") ? "selected" : "" ) : "" ; ?> >Voeuve</option>
                            </select>

                            @error('situation_matrimoniale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="text" name="compte_di" class="form-control" value="{{ $compte_demandeur->id }}" hidden>
                    </div>
                    <hr>
                    <div class="form-group col-12" >
                        <div class="col-md-8 text-right">
                            <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn2">
                                    Valider
                            </button>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="closeModalBtn btn btn-md btn-outline-dark" id="ts-dark">
                                Annuler
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
