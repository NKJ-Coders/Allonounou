<div class="modal fade" id="cropImageModal" tabindex="-1" role="dialog" aria-labelledby="cropImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-comment"></i> Formulaire d'abonnement</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                     <div class="col-md-4" style="boder-right: 1px solid #ddd;">
                        <div id="image-preview"></div>
                    </div>
                    <div class="col-md-4" style="padding: 20px; border-right: 1px solid #ddd">
                        <div class="custom-file">
                            <input type="file" name="photo" id="photo" class="custom-file-input @error('photo') is-invalid @enderror" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="photo">Choisir une photo...</label>
                            @error('photo')
                                <div class="invalid-feedback">Veuillez selectionner une photo</div>
                            @enderror
                        </div>
                        <br><br>
                        <button class="btn btn-success crop_image">Recadrer et inserer l'image</button>
                    </div>
            </div>
        </div>
    </div>
</div>
