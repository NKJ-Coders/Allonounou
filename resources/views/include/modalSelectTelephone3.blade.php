
<div class="modal fade" id="tel3" role="dialog" aria-labelledby="image" aria-hidden="true">
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
                <form class="form-horizontal demandeur-form7"  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Create the editor container -->
                    <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                        <label for="nom" style="margin-bottom: 10px" class="col-form-label text-md-right">{{ __('telephone3*') }}</label>
                        <input type="text" name="compte_di" class="form-control" value="{{ $compte_demandeur->id }}" hidden>
                        <br>
                        <input type="text" id="telephone3" placeholder="Telephone 3" class="login phone3 @error('telephone3') is-invalid @enderror" name="telephone3" value="<?= (!empty($compte_demandeur->telephone3)) ? $compte_demandeur->telephone3 : old('telephone3') ; ?>" autocomplete="telephone3" autofocus />
                        <span id="valid-msg31" class="text-success hide"><i class="icon-ok"></i> </span>
                        <span id="error-msg31" class="text-danger hide"><i class="icon-remove"></i></span>
                        {{-- <small></small> --}}
                        @error('telephone3')
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
