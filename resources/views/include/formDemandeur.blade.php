<div class="account-container register">

	<div class="content clearfix">
<form method="POST" action="{{ route('registration.demandeur') }}">
    @csrf
    <input type="hidden" name="type_compte" value="demandeur">
    <div class="form-group row">
        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

        <div class="col-md-6">
            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

            @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="telephone1" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 1') }}</label>

        <div class="col-md-6">
            <input id="telephone1" type="text" class="form-control @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ old('telephone1') }}" required autocomplete="telephone1" autofocus>

            @error('telephone1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="telephone2" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 2 (Whatsapp)') }}</label>

        <div class="col-md-6">
            <input id="telephone2" type="text" class="form-control @error('telephone2') is-invalid @enderror" name="telephone2" value="{{ old('telephone2') }}" required autocomplete="telephone2" autofocus>

            @error('telephone2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="telephone3" class="col-md-4 col-form-label text-md-right">{{ __('Telephone 3') }}</label>

        <div class="col-md-6">
            <input id="telephone3" type="text" class="form-control @error('telephone3') is-invalid @enderror" name="telephone3" value="{{ old('telephone3') }}" autocomplete="telephone3" autofocus>

            @error('telephone3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

        <div class="col-md-6">
            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="situation_matrimoniale" class="col-md-4 col-form-label text-md-right">{{ __('Situation matrimoniale') }}</label>

        <div class="col-md-6">
            <select name="situation_matrimoniale" id="situation_matrimoniale" class="custom-select">
                <option value="celibataire">Celibataire</option>
                <option value="marié">Marié</option>
            </select>

            @error('situation_matrimoniale')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="age_dernier_enfant" class="col-md-4 col-form-label text-md-right">{{ __('Age dernier enfant') }}</label>

        <div class="col-md-6">
            <input id="age_dernier_enfant" type="number" class="form-control @error('age_dernier_enfant') is-invalid @enderror" name="age_dernier_enfant" value="{{ old('age_dernier_enfant') }}" required autocomplete="age_dernier_enfant" autofocus>

            @error('age_dernier_enfant')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="metier" class="col-md-4 col-form-label text-md-right">{{ __('Métier') }}</label>

        <div class="col-md-6">
            <input id="metier" type="text" class="form-control @error('metier') is-invalid @enderror" name="metier" value="{{ old('metier') }}" required autocomplete="metier" autofocus>

            @error('metier')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="date_arret_dernier_metier" class="col-md-4 col-form-label text-md-right">{{ __('date d\'arret du dernier metier') }}</label>

        <div class="col-md-6">
            <input id="date_arret_dernier_metier" type="date" class="form-control @error('date_arret_dernier_metier') is-invalid @enderror" name="date_arret_dernier_metier" value="{{ old('date_arret_dernier_metier') }}" required autocomplete="date_arret_dernier_metier" autofocus>

            @error('date_arret_dernier_metier')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="niveau_etude" class="col-md-4 col-form-label text-md-right">{{ __('Niveau etude') }}</label>

        <div class="col-md-6">
            <select name="niveau_etude" id="niveau_etude" class="custom-select">
                <option value="Pas de diplome">Pas de diplôme</option>
                <option value="Licence">Licence</option>
                <option value="Baccalaureat">Baccalaureat</option>
                <option value="Probatoire">Probatoire</option>
                <option value="BEPC">BEPC</option>
                <option value="CEP">CEP</option>
            </select>

            @error('niveau_etude')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="langue" class="col-md-4 col-form-label text-md-right">{{ __('langue') }}</label>

        <div class="col-md-6">
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
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
    </div>
</div>
