@extends('layouts.app')

@section('content')

    <div class="card">
                <div class="card-header">Inserer une image pour ce profil <div id="text"></div></div>
                <div class="card-body">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <div class="row">
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

                            <div class="col-md-4" style="padding: 75px; background-color: #333">
                                <?php $profil = App\Profil::where('compte_demandeur_id', $compte->id)->first(); ?>
                                <div id="uploaded_image" align="center">
                                    @if(!empty($profil))
                                    <img src="/{{ $profil->photo }}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div id="confirmMsg"></div>
                </div>
            </div>
    <div id="accordion" class="my-4">

        <div class="card">
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">Documents Importants</a>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card-body mx-auto" style="width: 80%">
                    <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <input type="hidden" name="form1" value="form1">
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
                        <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">Informations personnelles</a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body mx-auto" style="width: 50%">
                    <form action="{{ route('profil.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <input type="hidden" name="form2" value="form2">
                        <div class="form-group">
                            <input type="text" name="nom_pere" class="form-control @error('nom_pere') is-invalid @enderror" placeholder="Nom du pere" value="{{ old('nom_pere') }}">
                            @error('nom_pere')
                                <div class="invalid-feedback">Veuillez entrer le nom du pere</div>
                            @enderror
                        </div>
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <div class="form-group">
                            <input type="text" name="nom_mere" class="form-control @error('nom_mere') is-invalid @enderror" value="{{ old('nom_mere') }}" placeholder="Nom de la mere">
                            @error('nom_mere')
                                <div class="invalid-feedback">Veuillez entrer le nom de la mere</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="lieu_nais" class="form-control @error('lieu_nais') is-invalid @enderror" value="{{ old('lieu_nais') }}" placeholder="Lieu de naissance">
                            @error('lieu_nais')
                                <div class="invalid-feedback">Veuillez entrer votre lieu de naissance</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nbre_enfant">Nombre d'enfant:</label>
                            <input type="number" name="nbre_enfant" class="form-control col-md-5 @error('nbre_enfant') is-invalid @enderror" value="{{ old('nbre_enfant') }}" min="0">
                            @error('nbre_enfant')
                                <div class="invalid-feedback">Preciser le nombre d'enfant</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="poste_id" id="poste_id" class="custom-select col-md-8 @error('poste_id') is-invalid @enderror" required>
                                <option value="">Selectionner le poste</option>
                                @foreach($postes as $key => $poste)
                                    <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">Personnes à contacter</a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body mx-auto" style="width: 50%">
                    <form action="{{ route('profil.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <input type="hidden" name="form3" value="form3">
                        <div class="form-group">
                            <input type="text" name="personne_proche1" class="form-control @error('personne_proche1') is-invalid @enderror" value="{{ old('personne_proche1') }}" placeholder="Nom d'une personne proche">
                            @error('personne_proche1')
                                <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="personne_proche2" class="form-control @error('personne_proche2') is-invalid @enderror" value="{{ old('personne_proche2') }}" placeholder="Nom d'une deuxieme personne proche">
                            @error('personne_proche2')
                                <div class="invalid-feedback">Veuillez entrer le nom d'une personne proche</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="telephone_personne_proche1" class="form-control @error('telephone_personne_proche1') is-invalid @enderror" value="{{ old('telephone_personne_proche1') }}" placeholder="Numero d'une personne proche">
                            @error('telephone_personne_proche1')
                                <div class="invalid-feedback">Veuillez entrer le numero valable du 1er proche</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="telephone_personne_proche2" class="form-control @error('telephone_personne_proche2') is-invalid @enderror" value="{{ old('telephone_personne_proche2') }}" placeholder="Numero d'une autre personne proche">
                            @error('telephone_personne_proche2')
                                <div class="invalid-feedback">Veuillez entrer le numero valable du second proche</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">Questions supplémentaires</a>
            </div>
            <div id="collapseFour" class="collapse" data-parent="#accordion">
                <div class="card-body mx-auto" style="width: 50%">
                    <form action="{{ route('profil.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="compte_demandeur_id" value="{{ $compte->id }}">
                        <input type="hidden" name="form4" value="form4">
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
            </div>
        </div>

    </div>
@endsection
