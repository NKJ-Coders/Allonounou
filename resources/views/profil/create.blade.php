@extends('layouts.app')

@section('content')
    @if(session()->has('confirmMsg'))
        <div class="alert alert-success my-3">{{ session()->get('confirmMsg') }}</div>
    @endif
    <div class="mx-auto" style="width: 700px">
        <form class="my-4" action="/profil" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="photo" id="validateCustomFile" class="custom-file-input @error('photo') is-invalid @enderror" accept=".png, .jpg, .jpeg">
                    <label class="custom-file-label" for="validateCustomFile">Choisir votre photo...</label>
                    @error('photo')
                        <div class="invalid-feedback">Veuillez selectionner une photo</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="custom-file corm-group">
                    <input type="file" name="cni" id="validateCustomFile" class="custom-file-input @error('cni') is-invalid @enderror" accept=".pdf">
                    <label class="custom-file-label" for="validateCustomFile">Choisir votre cni...</label>
                    @error('cni')
                        <div class="invalid-feedback">Veuillez selectionner votre cni</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="plan_localisation" id="validateCustomFile" class="custom-file-input @error('plan_localisation') is-invalid @enderror" accept=".pdf">
                    <label class="custom-file-label" for="validateCustomFile">Choisir votre plan de localisation...</label>
                    @error('plan_localisation')
                        <div class="invalid-feedback">Veuillez selectionner votre plan de localisation</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="certificat_medical" id="validateCustomFile" class="custom-file-input @error('certificat_medical') is-invalid @enderror" accept=".pdf">
                    <label class="custom-file-label" for="validateCustomFile">Choisir votre certificat medical...</label>
                    @error('certificat_medical')
                        <div class="invalid-feedback">Veuillez selectionner votre certificat medical</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="casier_judiciaire" id="validateCustomFile" class="custom-file-input @error('casier_judiciaire') is-invalid @enderror" accept=".pdf">
                    <label class="custom-file-label" for="validateCustomFile">Choisir votre casier judiciaire...</label>
                    @error('casier_judiciaire')
                        <div class="invalid-feedback">Veuillez selectionner votre casier judiciaire</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="nom_pere" class="form-control @error('nom_pere') is-invalid @enderror" placeholder="Nom du pere">
                @error('nom_pere')
                    <div class="invalid-feedback">Veuillez entrer le nom du pere</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="nom_mere" class="form-control @error('nom_mere') is-invalid @enderror" placeholder="Nom de la mere">
                @error('nom_mere')
                    <div class="invalid-feedback">Veuillez entrer le nom de la mere</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_nais">Date de naissance:</label>
                <input type="date" name="date_nais" class="form-control @error('date_nais') is-invalid @enderror">
                @error('date_nais')
                    <div class="invalid-feedback">Veuillez entrer le nom de la mere</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="lieu_nais" class="form-control @error('lieu_nais') is-invalid @enderror" placeholder="Lieu de naissance">
                @error('lieu_nais')
                    <div class="invalid-feedback">Veuillez entrer votre lieu de naissance</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nbre_enfant">Nombre d'enfant:</label>
                <input type="number" name="nbre_enfant" class="form-control col-md-5 @error('nbre_enfant') is-invalid @enderror" min="0">
                @error('nbre_enfant')
                    <div class="invalid-feedback">Preciser le nombre d'enfant</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="personne_proche1" class="form-control @error('personne_proche1') is-invalid @enderror" placeholder="Nom d'une personne proche">
                @error('personne_proche1')
                    <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="personne_proche2" class="form-control @error('personne_proche2') is-invalid @enderror" placeholder="Nom d'une deuxieme personne proche">
                @error('personne_proche2')
                    <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="personne_proche3" class="form-control @error('personne_proche3') is-invalid @enderror" placeholder="Nom d'une troisieme personne proche">
                @error('personne_proche3')
                    <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="personne_proche4" class="form-control @error('personne_proche4') is-invalid @enderror" placeholder="Nom d'une autre personne proche">
                @error('personne_proche4')
                    <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="telephone_personne_proche1" class="form-control @error('telephone_personne_proche1') is-invalid @enderror" placeholder="Numero d'une personne proche">
                @error('telephone_personne_proche1')
                    <div class="invalid-feedback">Veuillez entrer le numero valable d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="telephone_personne_proche2" class="form-control @error('telephone_personne_proche2') is-invalid @enderror" placeholder="Numero d'une autre personne proche">
                @error('telephone_personne_proche2')
                    <div class="invalid-feedback">Veuillez entrer le numero valable d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="telephone_personne_proche3" class="form-control @error('telephone_personne_proche3') is-invalid @enderror" placeholder="Numero d'une autre personne proche">
                @error('telephone_personne_proche3')
                    <div class="invalid-feedback">Veuillez entrer le numero valable d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="telephone_personne_proche4" class="form-control @error('telephone_personne_proche4') is-invalid @enderror" placeholder="Numero d'une autre personne proche">
                @error('telephone_personne_proche4')
                    <div class="invalid-feedback">Veuillez entrer le numero valable d'une personne proche</div>
                @enderror
            </div>

            <div class="form-group">
                Handicape moteur ?
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_moteur" id="handicape_moteur1" class="custom-control-input" value="1">
                    <label for="handicape_moteur1" class="custom-control-label">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_moteur" id="handicape_moteur2" class="custom-control-input" value="0" checked>
                    <label for="handicape_moteur2" class="custom-control-label">Non</label>
                </div>
            </div>

            <div class="form-group">
                Handicape visuel ?
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_visuel" id="handicape_visuel1" class="custom-control-input" value="1">
                    <label for="handicape_visuel1" class="custom-control-label">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_visuel" id="handicape_visuel2" class="custom-control-input" value="0" checked>
                    <label for="handicape_visuel2" class="custom-control-label">Non</label>
                </div>
            </div>

            <div class="form-group">
                Handicape des mains ?
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_des_mains" id="handicape_des_mains1" class="custom-control-input" value="1">
                    <label for="handicape_des_mains1" class="custom-control-label">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="handicape_des_mains" id="handicape_des_mains2" class="custom-control-input" value="0" checked>
                    <label for="handicape_des_mains2" class="custom-control-label">Non</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
        </form>
    </div>
@endsection
