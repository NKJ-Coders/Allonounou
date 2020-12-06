@extends('layouts.appAdmin')

@section('contenu')

    @if(session()->has('confirmMsg'))
        <div class="alert alert-success text-center my-3">{{ session()->get('confirmMsg') }}</div>
    @endif

    <h4 class="my-3">Liste des demandeurs</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="thead-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Telephone 1</th>
                    <th scope="col">Telephone 2 (whatsapp)</th>
                    <th scope="col">Metier</th>
                    <th scope="col">Age</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comptes as $key => $compte)
                    <?php $getProfile = App\Profil::where('compte_demandeur_id', $compte->id)->first(); ?>


                    <tr>
                        @if (empty($getProfile))
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $compte->nom }}</a></td>
                        <td>{{ $compte->telephone1 }}</td>
                        <td>{{ $compte->telephone2 }}</td>
                        <td>{{ $compte->metier }}</td>
                        <td>{{ $compte->age }}</td>
                        <td>
                            <div class="row flex-contain">
                                <a href="{{ route('profil.create', ['compte' => $compte->id]) }}" class="btn btn-warning">Creer profil</a>
                                {{-- <a href="{{ route('profil.create', ['compte' => $compte->id]) }}" class="btn btn-warning">Ajouter une photo de profil</a> --}}

                            </div>
                        </td>
                        @else
                        <td>Aucune demande de profil</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">{{ $comptes->links() }}</div>


@endsection
