<div class="modal fade" id="signalerModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="signalerModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-comment"></i> Signaler</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('offre.signaler') }}" method="POST">
                    @csrf
                    {{-- <div class="row"> --}}
                        <input type="hidden" name="annone_recruteur_id" value="{{ $allAnnonce->id }}">
                        <div class="form-group">
                                <input type="text" required class="form-control @error('titre') is-invalid @enderror" name="titre" placeholder="Donnez un titre" value="{{ old('titre') }}">

                                @error('titre')
                                    <div class="is-invalid">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <textarea required name="contenu" id="" cols="20" rows="6" class="form-control @error('contenu') is-invalid @enderror" value="{{ old('contenu') }}" placeholder="Contenu"></textarea>
                                @error('contenu')
                                    <div class="is-invalid">{{ $message }}</div>
                                @enderror
                        </div>

                    <br>
                    <div class="text-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary" type="submit">Signaler</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
