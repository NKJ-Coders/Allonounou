
<div class="modal fade" id="datemetier" role="dialog" aria-labelledby="image" aria-hidden="true">
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
                <form class="form-horizontal demandeur-form8"  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Create the editor container -->
                    <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                        <label for="detail"><strong>Modifier la date</strong></label>
                        <input type="text" name="compte_di" class="form-control" value="{{ $compte_demandeur->id }}" hidden>
                        <br>
                        <input type="number" min="01" max="31" style="width: 70px"  value="01"  class="login" name="jour_metier" id="jour">
                        <select name="mois_metier" id="mois" class="login col-md-4 custom-select">
                            {{-- <option>Mois</option> --}}
                            @foreach($tab_mois as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <select name="annee_metier" id="annee" class="login col-md-4 custom-select">
                            {{-- <option>Annee</option> --}}
                            @for($i = (date("Y") - 50) ; $i <= date("Y"); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
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
