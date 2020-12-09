<div class="account-container register">

	<div class="content clearfix">

		<form id="form" action="{{ route('registration.recruteur') }}" method="post">
			@csrf

            <h1>Inscription</h1>

			<div class="login-fields">

				<p>Créer votre compte en tant que recruteur:</p>

				<div class="field">
					<label for="firstname">Nom:</label>
					<input type="text" id="firstname" name="nom" placeholder="Nom*" class="login @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required autocomplete="nom" autofocus />

					@error('nom')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div> <!-- /field -->

                <input type="hidden" name="type_compte" value="recruteur">

				<div class="field">
					<label for="telephone1">Telephone 1:</label>
					<input type="text" id="lastname" placeholder="Telephone 1*" class="login @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ old('telephone1') }}" required autocomplete="telephone1" autofocus />
					<small></small>
					@error('telephone1')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="lastname">Telephone 1:</label>
					<input type="text" id="lastname" placeholder="Telephone 2* (whatsapp)" class="login @error('telephone2') is-invalid @enderror" name="telephone2" value="{{ old('telephone2') }}" required autocomplete="telephone2" autofocus />
					<small></small>
					@error('telephone2')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="lastname">Telephone 3:</label>
					<input type="text" id="lastname" placeholder="Telephone 3" class="login @error('telephone3') is-invalid @enderror" nname="telephone3" value="{{ old('telephone3') }}" autocomplete="telephone3" autofocus />
					<small></small>
					@error('telephone3')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div> <!-- /field -->


				<div class="field">
					<label for="email">Adresse Email:</label>
					<input type="email" id="email" name="email" placeholder="Email*" class="login @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    <small></small>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Mot de passe:</label>
					<input type="password" id="password" name="password" value="" placeholder="Mot de passe*" class="login @error('password') is-invalid @enderror" required autocomplete="new-password"/>
					<small></small>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" value="" placeholder="Confirmer mot de passe*" class="login" name="password_confirmation" required autocomplete="new-password"/>
                    <small></small>
				</div> <!-- /field -->

            </div> <!-- /login-fields -->

            <div class="text-danger text-italic">Les champs avec (*) sont obligatoires.</div>

			<div class="login-actions">

				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">J'accepte les <a href="#">termes et conditions de confidentialité.</a></label>
				</span>

				<button id="btnForm" class="button btn btn-primary btn-large">{{ __('S\'inscrire	') }}</button>

			</div> <!-- .actions -->

		</form>

	</div> <!-- /content -->

</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Vous avez déjà un compte? <a href="{{ route('login') }}">Connectez-vous à votre compte</a>
</div> <!-- /login-extra -->

