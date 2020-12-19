<div class="account-container register">

    <div class="content clearfix">
        <h1>Inscription</h1>

            <p>Créer votre compte en tant que demandeur:</p>

            <div class="login-field">
                <div id="register1" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form1" class="form-horizontal profil-form1"  method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input id="password" value="wertyuiop12A" type="hidden"  name="password" required autocomplete="new-password">
                        <input type="hidden" name="type_compte" value="demandeur">
                        <div class="field">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom*') }}</label>
                            <input id="nom" type="text" class="login @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom*') }}</label>
                            <input id="prenom" type="text" class="login @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="telephone1" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 1*') }}</label>
                            <input id="telephone1" type="text" class="login @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ old('telephone1') }}" required autocomplete="telephone1" autofocus>
                        {{-- <span id="valid-msg" class="text-success hide"><i class="icon-ok"></i> </span>
                        <span id="error-msg" class="text-danger hide"><i class="icon-remove"></i></span> --}}
                            <small></small>

                            @error('telephone1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn2">
                                        Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="register2" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form2" class="form-horizontal"  method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="field">
                            <label for="telephone2" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 2* (Whatsapp)') }}</label>

                            <input id="telephone2" type="text" class="login @error('telephone2') is-invalid @enderror" name="telephone2" value="{{ old('telephone2') }}" required autocomplete="telephone2" autofocus>
                            <small></small>
                            @error('telephone2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="telephone3" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 3') }}</label>

                            <input id="telephone3" type="text" class="login phone3 @error('telephone3') is-invalid @enderror" name="telephone3" value="{{ old('telephone3') }}" autocomplete="telephone3" autofocus>
                            <small></small>
                            @error('telephone3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance*') }}</label>

                            {{-- <input id="age" type="date" class="login @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus> --}}
                                <div class="flex-contain">
                                    <input type="number" placeholder="Jour" min="01" max="31" style="width: 70px" value="{{ old('jour') }}" required  class="login" name="jour" id="jour">
                                    <select name="mois" id="mois" class="login col-md-4 custom-select" required>
                                        <option value="">Mois</option>
                                        @foreach($tab_mois as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <select name="annee" id="annee" class="login col-md-4 custom-select" required>
                                        <option value="">Annee</option>
                                        @for($i = 1970; $i <= 2040; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                            {{-- @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>

                        <div class="field">
                            <label for="situation_matrimoniale" class="col-md-4 col-form-label text-md-right">{{ __('Situation matrimoniale*') }}</label>

                            <select required name="situation_matrimoniale" id="situation_matrimoniale" class="custom-select">
                                <option value="celibataire">Celibataire</option>
                                <option value="marié">Marié</option>
                            </select>

                            @error('situation_matrimoniale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="age_dernier_enfant" class="col-md-4 col-form-label text-md-right">{{ __('Age dernier enfant') }}</label>

                            {{-- <input id="age_dernier_enfant" type="date" class="login @error('age_dernier_enfant') is-invalid @enderror" name="age_dernier_enfant" value="{{ old('age_dernier_enfant') }}" autocomplete="age_dernier_enfant" autofocus> --}}
                            <div class="flex-contain">
                                <input type="number" placeholder="Jour" min="01" max="31" style="width: 70px" value="{{ old('jour_enfant') }}"  class="login" name="jour_enfant" id="jour">
                                <select name="mois_enfant" id="mois" class="login col-md-4 custom-select">
                                    <option value="">Mois</option>
                                    @foreach($tab_mois as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <select name="annee_enfant" id="annee" class="login col-md-4 custom-select">
                                    <option value="">Annee</option>
                                    @for($i = 1970; $i <= 2040; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            @error('age_dernier_enfant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button  type="submit" class="btn btn-md btn-outline-primary" id="val2">
                                        Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="register3" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form3" class="form-horizontal profil-form1"  method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label for="metier" class="col-md-4 col-form-label text-md-right">{{ __('Métier*') }}</label>

                            {{-- <input id="metier" type="text" class="login @error('metier') is-invalid @enderror" name="metier" value="{{ old('metier') }}" required autocomplete="metier" autofocus> --}}
                            <select required name="metier" id="metier" class="custom-select">
                                @foreach($metiers as $metier)
                                    <option value="{{ $metier }}">{{ $metier }}</option>
                                @endforeach
                            </select>

                            @error('metier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="date_arret_dernier_metier" class="col-md-4 col-form-label text-md-right">{{ __('date d\'arret du dernier metier') }}</label>

                            {{-- <input id="date_arret_dernier_metier" type="date" class="login @error('date_arret_dernier_metier') is-invalid @enderror" name="date_arret_dernier_metier" value="{{ old('date_arret_dernier_metier') }}" autocomplete="date_arret_dernier_metier" autofocus> --}}
                            <div class="flex-contain">
                                <input type="number" placeholder="Jour" min="01" max="31" style="width: 70px" value="{{ old('jour_metier') }}"  class="login" name="jour_metier" id="jour">
                                <select name="mois_metier" id="mois" class="login col-md-4 custom-select">
                                    <option value="">Mois</option>
                                    @foreach($tab_mois as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <select name="annee_metier" id="annee" class="login col-md-4 custom-select">
                                    <option value="">Annee</option>
                                    @for($i = 1970; $i <= 2040; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            @error('date_arret_dernier_metier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="niveau_etude" class="col-md-4 col-form-label text-md-right">{{ __('Niveau d\'étude*') }}</label>

                            <select name="niveau_etude" id="niveau_etude" class="custom-select">
                                <option value="Pas de diplome">Pas de diplôme</option>
                                <option value="Licence">Licence</option>
                                <option value="Niveau II">Niveau II</option>
                                <option value="Niveau I">Niveau I</option>
                                <option value="Baccalaureat">Baccalaureat</option>
                                <option value="Niveau Terminale">Niveau Terminale</option>
                                <option value="Probatoire">Probatoire</option>
                                <option value="Niveau première">Niveau première</option>
                                <option value="BEPC">BEPC</option>
                                <option value="Niveau 3ième">Niveau 3ième</option>
                                <option value="CEP">CEP</option>
                            </select>

                            @error('niveau_etude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="langue" class="col-md-4 col-form-label text-md-right">{{ __('langue*') }}</label>

                            <select name="langue" id="langue" class="custom-select">
                                <option value="Anglais">Anglais</option>
                                <option value="Francais">Francais</option>
                            </select>

                            @error('langue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button  type="submit" class="btn btn-md btn-outline-primary" id="val3">
                                        Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="register4" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form  id="demandeur-form4" class="form-horizontal profil-form1"  method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="field">
                            <label for="">Pays:</label>
                            <input type="text" name="" class="login" placeholder="Dans quel pays êtes-vous?" id="pays" list="search_pays">
                            <datalist id="search_pays">
                                @foreach($localisations as $localisation)
                                    <option value="{{ $localisation->designation }}" label="{{ $localisation->id }}">{{ $localisation->id }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="field">
                            <label for="">Region:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle region êtes-vous?" id="region" list="search_region">
                            <datalist id="search_region"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Ville:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle ville êtes-vous?" id="ville" list="search_ville">
                            <datalist id="search_ville"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Arrondissement:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle ville êtes-vous?" id="arr" list="search_arr">
                            <datalist id="search_arr"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Quartier:</label>
                            <input type="text" name="" class="login" placeholder="Dans quel quartier êtes-vous?" id="quartier" list="search_quartier">
                            <datalist id="search_quartier"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Zone:</label>
                            <input required type="text" name="localisation" class="login @error('localisation_id') is-invalid @enderror" value="{{ old('localisation_id') }}" placeholder="Dans quelle zone êtes-vous?" id="zone" list="search_zone">
                            <datalist id="search_zone"></datalist>

                            @error('localisation_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button  type="submit" class="btn btn-md btn-outline-primary" id="val4">
                                        Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="register5" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form5" method="POST" action="{{ route('registration.demandeur') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mask_pass" value="accepter">
                        <div class="field">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
                            <input id="password" type="password" class="login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <small></small>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                            <small></small>
                            <input id="password-confirm" type="password" class="login" name="password_confirmation" required autocomplete="new-password">
                            <small></small>
                        </div>
                        <div class="text-danger text-italic">Les champs avec (*) sont obligatoires.</div>

                        <div class="login-actions">

                            <span class="login-checkbox">
                                <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                                <label class="choice" for="Field">J'accepte les <a href="#">termes et conditions de confidentialité.</a></label>
                            </span>

                            <button id="btnForm" class="button btn btn-primary btn-large">{{ __('S\'inscrire	') }}</button>

                        </div> <!-- .actions -->
                    </form>
                </div>
            </div>
    </div>
</div>


<!-- Text Under Box -->
<div class="login-extra">
	Vous avez déjà un compte? <a href="{{ route('login') }}">Connectez-vous à votre compte</a>
</div> <!-- /login-extra -->
