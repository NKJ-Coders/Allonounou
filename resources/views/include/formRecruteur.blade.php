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

                <div class="field">
                    <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Nom*') }}</label>
                    <input id="prenom" type="text" class="login @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom*" required autocomplete="prenom" autofocus>

                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="hidden" name="type_compte" value="recruteur">

				<div class="field">
					<label for="telephone1">Telephone 1:</label>
                    <input type="tel" id="phone" placeholder="Telephone 1*" class="login @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ old('telephone1') }}" required autocomplete="telephone1" autofocus />
                    <span id="valid-msg" class="text-success hide"><i class="icon-ok"></i> </span>
                    <span id="error-msg" class="text-danger hide"><i class="icon-remove"></i></span>
					{{-- <small></small> --}}
					@error('telephone1')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="telephone2">Telephone 2:</label>
					<input type="tel" id="phone2" placeholder="Telephone 2* (whatsapp)" class="login @error('telephone2') is-invalid @enderror" name="telephone2" value="{{ old('telephone2') }}" required autocomplete="telephone2" autofocus />
                    <span id="valid-msg2" class="text-success hide"><i class="icon-ok"></i> </span>
                    <span id="error-msg2" class="text-danger hide"><i class="icon-remove"></i></span>
					{{-- <small></small> --}}
					@error('telephone2')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="lastname">Telephone 3:</label>
					<input type="text" id="phone3" placeholder="Telephone 3" class="login phone3 @error('telephone3') is-invalid @enderror" nname="telephone3" value="{{ old('telephone3') }}" autocomplete="telephone3" autofocus />
                    <span id="valid-msg3" class="text-success hide"><i class="icon-ok"></i> </span>
                    <span id="error-msg3" class="text-danger hide"><i class="icon-remove"></i></span>
					{{-- <small></small> --}}
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

