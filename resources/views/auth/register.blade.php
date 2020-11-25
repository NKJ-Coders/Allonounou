@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Formulaire d\'enregistrement') }}</h4></div>

                <div class="card-body">

                        @if ($type_compte == 'demandeur')
                            @include('include.formDemandeur')
                        @endif

                        @if ($type_compte == 'recruteur')
                            @include('include.formRecruteur')
                        @endif

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
