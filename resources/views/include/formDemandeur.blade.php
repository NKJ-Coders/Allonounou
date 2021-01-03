
<div class="account-container register">

    <div class="content clearfix">
        <h1>Inscription</h1>

        <a href="{{ route('home') }}"><button style="float: right ; margin-bottom: 50px" type="button" class=" close_editor1 btn btn-md btn-outline-dark" id="ts-dark">
            Quitter
        </button></a>
            <p>Créer votre compte en tant que demandeur:</p>

            <div class="login-field">
                <?php if ((isset($test)) ) { ?>
                <div id="register1" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form1" class="form-horizontal profil-form1"  method="POST" action="{{ route('registration.demandeur') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type_compte" value="demandeur">
                        <div class="field">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom*') }}</label>
                            <input id="nom" type="text" class="login @error('nom') is-invalid @enderror" name="nom" value="<?= (!empty($_SESSION['nom'])) ? $_SESSION['nom'] : old('nom') ; ?>" required autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom*') }}</label>
                            <input id="prenom" type="text" class="login @error('prenom') is-invalid @enderror" name="prenom" value="<?= (!empty($_SESSION['prenom'])) ? $_SESSION['prenom'] : old('prenom') ; ?>" required autocomplete="prenom" autofocus>

                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="telephone1">Telephone 1:</label>
                            <input type="tel" id="Telephone1" placeholder="Telephone 1*" class="login @error('telephone1') is-invalid @enderror" name="telephone1" value="<?= (!empty($_SESSION['telephone1'])) ? $_SESSION['telephone1'] : old('telephone1') ; ?>" required autocomplete="telephone1" autofocus />
                            <span id="valid-msg11" class="text-success hide"><i class="icon-ok"></i> </span>
                            <span id="error-msg11" class="text-danger hide"><i class="icon-remove"></i></span>
                            {{-- <small></small> --}}
                            @error('telephone1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <a href="{{ route('home') }}"><button style="margin-right: 70px" type="button" class=" close_editor1 btn btn-md btn-outline-dark" id="ts-dark">
                                    <span class="fa fa-chevron-left"></span> précedent
                                </button></a>
                                <button  type="submit" class="btn btn-md btn-primary" id="closeModalBtn2">
                                        Suivant <span class="fa fa-chevron-right"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
                <?php if ((isset($check)) ) { ?>
                <div id="register2" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form2" class="form-horizontal"  method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input id="type_compte" value="{{ $type_compte }}" type="hidden"  name="type_compte" >
                        <div class="field">
                            <label for="telephone2">Telephone 2:</label>
                            <input type="tel" id="telephone2" placeholder="Telephone 2* (whatsapp)" class="login @error('telephone2') is-invalid @enderror" name="telephone2" value="<?= (!empty($_SESSION['telephone2'])) ? $_SESSION['telephone2'] : old('telephone2') ; ?>" required autocomplete="telephone2" autofocus />
                            <span id="valid-msg21" class="text-success hide"><i class="icon-ok"></i> </span>
                            <span id="error-msg21" class="text-danger hide"><i class="icon-remove"></i></span>
                            {{-- <small></small> --}}
                            @error('telephone2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="telephone3">Telephone 3:</label>
                            <input type="text" id="telephone3" placeholder="Telephone 3" class="login phone3 @error('telephone3') is-invalid @enderror" name="telephone3" value="<?= (!empty($_SESSION['telephone3'])) ? $_SESSION['telephone3'] : old('telephone3') ; ?>" autocomplete="telephone3" autofocus />
                            <span id="valid-msg31" class="text-success hide"><i class="icon-ok"></i> </span>
                            <span id="error-msg31" class="text-danger hide"><i class="icon-remove"></i></span>
                            {{-- <small></small> --}}
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
                                    <input type="number" placeholder="Jour" min="01" max="31" style="width: 70px" value="<?= (!empty($_SESSION['jour'])) ? $_SESSION['jour'] : old('jour') ; ?>" required  class="login" name="jour" id="jour">
                                    <select name="mois" id="mois" class="login col-md-4 custom-select" required>
                                        <option value="<?= (!empty($_SESSION['mois'])) ? $_SESSION['mois'] : "" ; ?>"><?= (!empty($_SESSION['mois'])) ? $_SESSION['mois'] : "Mois" ; ?></option>
                                        @foreach($tab_mois as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <select name="annee" id="annee" class="login col-md-4 custom-select" required>
                                        <option value="<?= (!empty($_SESSION['annee'])) ? $_SESSION['annee'] : "" ; ?>"><?= (!empty($_SESSION['annee'])) ? $_SESSION['annee'] : "Annee" ; ?></option>
                                        @for($i = (date("Y") - 60); $i <= (date("Y") - 17) ; $i++)
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
                                <option value="celibataire" <?= (!empty($_SESSION['situation_matrimoniale'])) ? (($_SESSION['situation_matrimoniale'] == "celibataire") ? "selected" : "" ) : "" ; ?> >Celibataire</option>
                                <option value="marié" <?= (!empty($_SESSION['situation_matrimoniale'])) ? (($_SESSION['situation_matrimoniale'] == "marié") ? "selected" : "" ) : "" ; ?> >Marié</option>
                                <option value="divorcé" <?= (!empty($_SESSION['situation_matrimoniale'])) ? (($_SESSION['situation_matrimoniale'] == "divorcé") ? "selected" : "" ) : "" ; ?> >Divorcé</option>
                                <option value="voeuve" <?= (!empty($_SESSION['situation_matrimoniale'])) ? (($_SESSION['situation_matrimoniale'] == "voeuve") ? "selected" : "" ) : "" ; ?> >Voeuve</option>
                            </select>

                            @error('situation_matrimoniale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="age_dernier_enfant" class="col-md-4 col-form-label text-md-right">{{ __('Age dernier enfant') }}</label>

                            <input id="age_dernier_enfant" type="text" class="login @error('age_dernier_enfant') is-invalid @enderror" name="age_dernier_enfant" value="<?= (!empty($_SESSION['age_dernier_enfant'])) ? $_SESSION['age_dernier_enfant'] : old('age_dernier_enfant') ; ?>" autocomplete="age_dernier_enfant" autofocus>

                            @error('age_dernier_enfant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-12 text-right">
                                <a href="{{ route('registration', ['type_compte' => 'demandeur']) }}"><button style="margin-right: 70px" type="button" class=" close_editor2 btn btn-xs btn-outline-dark btn-xl" id="ts-dark">
                                    <span class="fa fa-chevron-left"></span> précedent
                                </button></a>
                                <button  type="submit" class="btn btn-md btn-primary" id="val2">
                                        Suivant <span class="fa fa-chevron-right"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
                <div id="register3" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                    <form id="demandeur-form3" class="form-horizontal profil-form1"  method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label for="metier" class="col-md-4 col-form-label text-md-right">{{ __('Métier*') }}</label>

                            {{-- <input id="metier" type="text" class="login @error('metier') is-invalid @enderror" name="metier" value="{{ old('metier') }}" required autocomplete="metier" autofocus> --}}
                            <select required name="metier" id="metier" class="custom-select">
                                @foreach($metiers as $metier)
                                    <option value="{{ $metier }}" <?= (!empty($_SESSION['$metier'])) ? (($_SESSION['$metier'] == $metier) ? "selected" : "" ) : "" ; ?> >{{ $metier }}</option>
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
                                <input type="number" min="01" max="31" style="width: 70px" value="<?= (!empty($_SESSION['jour_metier'])) ? $_SESSION['jour_metier'] : old('jour_metier') ; ?>"  class="login" name="jour_metier" id="jour">
                                <select name="mois_metier" id="mois" class="login col-md-4 custom-select">
                                    <option value="<?= (!empty($_SESSION['mois_metier'])) ? $_SESSION['mois_metier'] : "" ; ?>"><?= (!empty($_SESSION['mois_metier'])) ? $_SESSION['mois_metier'] : "Mois" ; ?></option>
                                    @foreach($tab_mois as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <select name="annee_metier" id="annee" class="login col-md-4 custom-select">
                                    <option value="<?= (!empty($_SESSION['annee_metier'])) ? $_SESSION['annee_metier'] : "" ; ?>"><?= (!empty($_SESSION['annee_metier'])) ? $_SESSION['annee_metier'] : "Annee" ; ?></option>
                                    @for($i = (date("Y") - 50) ; $i <= date("Y"); $i++)
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
                                <option value="Pas de diplome" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Pas de diplome") ? "selected" : "" ) : "" ; ?>>Pas de diplôme</option>
                                <option value="Licence" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Licence") ? "selected" : "" ) : "" ; ?>>Licence</option>
                                <option value="Niveau II" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Niveau II") ? "selected" : "" ) : "" ; ?>>Niveau II</option>
                                <option value="Niveau I" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Niveau I") ? "selected" : "" ) : "" ; ?>>Niveau I</option>
                                <option value="Baccalaureat" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Baccalaureat") ? "selected" : "" ) : "" ; ?>>Baccalaureat</option>
                                <option value="Niveau Terminale" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Niveau Terminale") ? "selected" : "" ) : "" ; ?>>Niveau Terminale</option>
                                <option value="Probatoire" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Probatoire") ? "selected" : "" ) : "" ; ?>>Probatoire</option>
                                <option value="Niveau première" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Niveau première") ? "selected" : "" ) : "" ; ?>>Niveau première</option>
                                <option value="BEPC" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "BEPC") ? "selected" : "" ) : "" ; ?>>BEPC</option>
                                <option value="Niveau 3ième" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "Niveau 3ième") ? "selected" : "" ) : "" ; ?>>Niveau 3ième</option>
                                <option value="CEP" <?= (!empty($_SESSION['niveau_etude'])) ? (($_SESSION['niveau_etude'] == "CEP") ? "selected" : "" ) : "" ; ?>>CEP</option>
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
                                <option value="Anglais" <?= (!empty($_SESSION['langue'])) ? (($_SESSION['langue'] == "Anglais") ? "selected" : "" ) : "" ; ?>>Anglais</option>
                                <option value="Francais" <?= (!empty($_SESSION['langue'])) ? (($_SESSION['langue'] == "Francais") ? "selected" : "" ) : "" ; ?>>Francais</option>
                            </select>

                            @error('langue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button style="margin-right: 70px" type="button" class=" close_editor3 btn btn-md btn-outline-dark" id="ts-dark">
                                    <span class="fa fa-chevron-left"></span> précedent
                                </button>
                                <button  type="submit" class="btn btn-md btn-primary" id="val3">
                                        Suivant <span class="fa fa-chevron-right"></span>
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
                            <input type="text" name="" class="login" placeholder="Dans quel pays êtes-vous?" value="<?= (!empty($_SESSION['pays'])) ? $_SESSION['pays'] : old('pays') ; ?>" id="pays" list="search_pays">
                            <datalist id="search_pays">
                                @foreach($localisations as $localisation)
                                    <option value="{{ $localisation->designation }}" label="{{ $localisation->id }}">{{ $localisation->id }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="field">
                            <label for="">Region:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle region êtes-vous?" value="<?= (!empty($_SESSION['region'])) ? $_SESSION['region'] : old('region') ; ?>" id="region" list="search_region">
                            <datalist id="search_region"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Ville:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle ville êtes-vous?" value="<?= (!empty($_SESSION['ville'])) ? $_SESSION['ville'] : old('ville') ; ?>" id="ville" list="search_ville">
                            <datalist id="search_ville"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Arrondissement:</label>
                            <input type="text" name="" class="login" placeholder="Dans quelle ville êtes-vous?" value="<?= (!empty($_SESSION['arrondissement'])) ? $_SESSION['arrondissement'] : old('arrondissement') ; ?>" id="arr" list="search_arr">
                            <datalist id="search_arr"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Quartier:</label>
                            <input type="text" name="" class="login" placeholder="Dans quel quartier êtes-vous?" value="<?= (!empty($_SESSION['quartier'])) ? $_SESSION['quartier'] : old('quartier') ; ?>" id="quartier" list="search_quartier">
                            <datalist id="search_quartier"></datalist>
                        </div>

                        <div class="field">
                            <label for="">Zone:</label>
                            <input required type="text" value="<?= (!empty($_SESSION['zone'])) ? $_SESSION['zone'] : old('zone') ; ?>" name="localisation" class="login @error('localisation_id') is-invalid @enderror"  placeholder="Dans quelle zone êtes-vous?" id="zone" list="search_zone">
                            <datalist id="search_zone"></datalist>

                            @error('localisation_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12" style="margin-top: 20px" >
                            <div class="col-md-8 text-right">
                                <button style="margin-right: 70px" type="button" class=" close_editor4 btn btn-md btn-outline-dark" id="ts-dark">
                                    <span class="fa fa-chevron-left"></span> précedent
                                </button>
                                <button  type="submit" class="btn btn-md btn-primary" id="val4">
                                        Suivant <span class="fa fa-chevron-right"></span>
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
                        {{-- <div class="text-danger text-italic">Les champs avec (*) sont obligatoires.</div> --}}

                        <div class="login-actions">

                            {{-- <span class="login-checkbox">
                                <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                                <label class="choice" for="Field">J'accepte les <a href="#">termes et conditions de confidentialité.</a></label>
                            </span> --}}
                            <button style="margin: 20px 0px 0px 0px;" type="button" class=" close_editor5 btn btn-md btn-outline-dark" id="ts-dark">
                                <span class="fa fa-chevron-left"></span> précedent
                            </button>

                            <button id="btnForm" style="margin-right: 20px" class="button btn btn-primary btn-large">{{ __('S\'uivant	') }} <span class="fa fa-chevron-right"></span></button>

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
