
<div class="modal fade" id="tel2" role="dialog" aria-labelledby="image" aria-hidden="true">
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
                <form class="form-horizontal demandeur-form6"  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Create the editor container -->
                    <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                        <label for="nom" style="margin-bottom: 10px" class="col-form-label text-md-right">{{ __('telephone2*') }}</label>
                        <input type="text" name="compte_di" class="form-control" value="{{ $compte_demandeur->id }}" hidden>
                        <br>
                        <input type="tel" id="telephone2" placeholder="Telephone 2* (whatsapp)" class="login @error('telephone2') is-invalid @enderror" name="telephone2" value="<?= (!empty($compte_demandeur->telephone2)) ? $compte_demandeur->telephone2 : old('telephone2') ; ?>" autocomplete="telephone2" autofocus />
                        <span id="valid-msg21" class="text-success hide"><i class="icon-ok"></i> </span>
                        <span id="error-msg21" class="text-danger hide"><i class="icon-remove"></i></span>
                        {{-- <small></small> --}}
                        @error('telephone2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
