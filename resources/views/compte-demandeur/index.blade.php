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
                <?php $getProfile = App\Compte_demandeur::where('statut', 1)->first(); ?>
                @if (empty($getProfile))
                    @foreach ($comptes as $key => $compte)
                        <tr>

                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $compte->nom }}</a></td>
                            <td>{{ $compte->telephone1 }}</td>
                            <td>{{ $compte->telephone2 }}</td>
                            <td>{{ $compte->metier }}</td>
                            <td>{{ $compte->age }} ans</td>
                            <td>
                                <div class="row flex-contain">
                                    <a href="{{ route('profil.create', ['compte' => $compte->id]) }}" class="btn btn-warning">Creer profil</a>
                                    {{-- <a href="{{ route('profil.create', ['compte' => $compte->id]) }}" class="btn btn-warning">Ajouter une photo de profil</a> --}}

                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="7"><div class="text-center">Aucune demande de profil</div></td></tr>
                @endif

            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">{{ $comptes->links() }}</div>


@endsection
