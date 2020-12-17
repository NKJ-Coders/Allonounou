<div class="modal fade" id="candidatureModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="signalerModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title"><i class="fa fa-comment"></i> Signaler</h5> --}}
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <?php if(!empty($myAnnonce->profils)) { ?>
                        @foreach($myAnnonce->profils as $key => $profil)
                            {{-- @if(!empty($profil)) --}}
                                <div class="form-group">
                                    <div style="display: flex; justify-content: left">
                                        <label class="switch">
                                            <input type="checkbox" id="yes">
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="yes" class="textInput">
                                            <div class="user-image-label">
                                                <a href="#" title="{{ $profil->compte_demandeur->nom}}"><img src="<?= (!empty($profil->photo)) ? asset($profil->photo) : "https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" ; ?>" class="rounded-circle" alt="{{ $profil->compte_demandeur->nom}}"></a>
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                <br>

                                <div class="text-center">
                                    {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button> --}}
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Programmer une interview</button>
                                </div>
                            {{-- @else

                            @endif --}}
                        @endforeach
                    <?php } else { ?>
                        <p>Vous n'avez aucune candidature pour ce post</p>
                    <?php } ?>

                </form>
            </div>
        </div>
    </div>
</div>
