<div class="modal fade" id="selectCandidateModal" tabindex="-1" role="dialog" aria-labelledby="signalerModal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title"><i class="fa fa-comment"></i> Signaler</h5> --}}
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body toClear">

                <?php $tab = Session::get('id_profil'); ?>
                @if(!empty($tab))
                    @foreach($tab as $key => $value)
                        <?php $profil = App\Profil::find($value); ?>

                        <div class="form-group">
                            <div style="display: flex; justify-content: left" class="toAdd">
                                <div class="user-image-label">
                                    <a href="#" title="{{ $profil->compte_demandeur->nom }}"><img src="<?= (!empty($profil->photo)) ? asset($profil->photo) : "https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" ; ?>" class="rounded-circle" alt="{{ $profil->compte_demandeur->nom}}"></a>
                                </div>
                                <label for="yes" class="textInput">
                                    {{ $profil->compte_demandeur->nom }}
                                </label>

                                <a href="#" class="removeToSelection mx-4" style="font-size: 18px" id="{{ $profil->id }}" title="Supprimer de la liste"><span class="text-danger fa fa-trash"></span></a>

                            </div>
                        </div>
                    @endforeach
                    <br>

                    <div class="text-center">
                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button> --}}
                        <button class="btn btn-success btn-lg btn-block" id="insert"><i class="fa fa-plus"></i> </button>
                    </div>
                @else
                    <h5 class="text-center text-warning"><span class="fa fa-stop-circle"></span> Aunce annonce sélectionnée!</h5>
                @endif

            </div>
        </div>
    </div>
</div>
