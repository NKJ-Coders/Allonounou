@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please verify Code') }}
                <a href="{{ route('home') }}"><button style="float: right ; margin-botton: 50px" type="button" class=" close_editor1 btn btn-md btn-outline-dark" id="ts-dark">
                    Quitter
                </button></a>
            </div>

                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf
                        {{-- <input id="compte_di" type="hidden" value="{{ $compte_di }}" name="compte_di"> --}}
                        <label>{{ $_SESSION['code'] }}</label>
                        <label>{{ $compte_di }}</label>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('registration', ['type_compte' => 'demandeur']) }}"><button style="margin-right: 70px" type="button" class=" close_editor2 btn btn-xs btn-outline-dark btn-xl" id="ts-dark">
                                    <span class="fa fa-chevron-left"></span> précedent
                                </button></a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('registration.resend') }}"> Resend code</a>
                    {{-- <a href="{{ route('reset',['telephone1'=>$telephone1]) }}"> Resend code</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
