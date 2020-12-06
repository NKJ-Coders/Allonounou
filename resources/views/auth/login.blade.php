@extends('layouts.appAuth')

@section('card')
<div class="account-container">

	<div class="content clearfix">

		<form action="{{ route('login') }}" method="post">
			@csrf

			<h1>Connectez-vous</h1>

			@if (Session::has('message'))
				<div class="alert alert-success"><span class="fa fa-check"></span> {{ Session::get('message') }}</div>
			@endif

			<div class="login-fields">

				<p>Veuillez renseigner vos informations de connexion !</p>

				<div class="field">
					<label for="telephone1">Username</label>
					<input type="text" id="telephone1" name="telephone1" placeholder="Telephone" class="login username-field @error('telephone1') is-invalid @enderror" value="{{ old('telephone1') }}" required autocomplete="telephone1" autofocus />

					@error('telephone1')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Mote de passe" class="login password-field @error('password') is-invalid @enderror" required autocomplete="current-password"/>

					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /password -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<span class="login-checkbox">
					<input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="remember">Se souvenir de moi</label>
				</span>

				<button class="button btn btn-success btn-large">Se connecter</button>

			</div> <!-- .actions -->



		</form>

	</div> <!-- /content -->

</div> <!-- /account-container -->



<div class="login-extra">
	@if (Route::has('password.request'))
		<a href="{{ route('password.request') }}">
			{{ __('Mot de passe oublié?') }}
		</a>
	@endif
</div> <!-- /login-extra -->

{{-- <script>
    $(document).ready(function() {
        alert('ok');
    });
</script> --}}
@endsection
