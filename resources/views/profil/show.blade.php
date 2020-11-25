@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <img src="{{ asset('storage/'.$profil->photo) }}" alt="profil">
                <a href="" class="col-md-12">Modifier ma photo</a>
                <a href="" class="col-md-12">Modifier ma CNI</a>
                <a href="" class="col-md-12">Modifier mon certificat medical</a>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection
