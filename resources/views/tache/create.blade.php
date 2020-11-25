@extends('layouts.app')

@section('content')
    @if(session()->has('confirmMsg'))
        <div class="alert alert-success my-3">{{ session()->get('confirmMsg') }}</div>
    @endif
    <form action="/tache/store" method="GET">
        <div class="form-group">
            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Entrez une tache">
            @error('nom')
                <div class="invalid-feedback">Veuillez entrez une tache</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary btn-lg">Valider</button>
    </form>
@endsection
