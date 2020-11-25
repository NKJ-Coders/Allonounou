<form method="POST" action="{{ route('registration.recruteur') }}">
    @csrf
    <input type="hidden" name="type_compte" value="recruteur">
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
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
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
            <input id="telephone3" type="text" class="form-control @error('telephone3') is-invalid @enderror" name="telephone3" value="{{ old('telephone3') }}" required autocomplete="telephone3" autofocus>

            @error('telephone3')
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

