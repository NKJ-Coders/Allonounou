<div class="modal fade" id="selectJourModal" tabindex="-1" role="dialog" aria-labelledby="selectJourModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir...</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @foreach($jours as $key => $jour)
                    <div>
                        <input class="dayInput checkbox-{{ $jour->nom }}" type="checkbox" value="{{ $jour->id }}" id="{{ $jour->nom }}" name="jour[]" />
                        <label for="{{ $jour->nom }}">{{ $jour->nom }}</label>
                    </div>
                    <div class="modal-body-content hours-content {{ $jour->nom }}">
                        <div>heure debut: <input type="time" class="input-time heure-debut-{{ $jour->nom }}" name="" id="{{ $jour->nom }}"></div>
                        <div>heure fin: <input type="time" name="" class="input-time heure-fin-{{ $jour->nom }}" id="{{ $jour->nom }}"></div>
                    </div>
                @endforeach
                <div class="my-4 modal-body-content">
                    <div class="allSelect">
                        <input type="checkbox" id="allSelect" />
                        <label for="allSelect">Tout cocher</label>
                    </div>
                    <div class="allUnSelect">
                        <input type="checkbox" id="allUnSelect" />
                        <label for="allUnSelect">Tout décocher</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
