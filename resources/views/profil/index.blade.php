@extends('layouts.appAdmin')

@section('contenu')
    <h4 class="my-3">Liste des demandeurs</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="thead-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Telephone 1</th>
                    <th scope="col">Telephone 2 (whatsapp)</th>
                    <th scope="col">Metier</th>
                    <th scope="col">Age</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profils as $key => $profil)
                    <?php //$getProfil = App\Profil::where('compte_demandeur_id', $compte->id)->first(); ?>
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td><img src="{{ asset($profil->photo) }}" alt=""></a></td>
                        <td>{{ $profil->compte_demandeur->nom }}</a></td>
                        <td>{{ $profil->compte_demandeur->telephone1 }}</td>
                        <td>{{ $profil->compte_demandeur->telephone2 }}</td>
                        <td>{{ $profil->compte_demandeur->metier }}</td>
                        <td>{{ $profil->compte_demandeur->age }}</td>
                        <td>
                            <div class="row flex-contain">
                                <a href="{{ route('profil.create', ['profil' => $profil->id]) }}" title="Modifier" class="btn btn-small btn-success"><i class="icon-edit"></i></a>
                                {{-- <a href="{{ route('profil.create', ['compte' => $compte->id]) }}" class="btn btn-warning">Ajouter une photo de profil</a> --}}
                                <a href="{{ route('profil.delete', ['id' => $profil->id]) }}" class="btn btn-small btn-danger" title="Supprimer"><i class="icon-trash"></i> </a>
                                <div class="controls">
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="#"><i class="icon-eye-open icon-white"></i> Statut</a>
                                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('profil.statut', ['id' => $profil->id, 'statut' => 1]) }}"> Activer</a></li>
                                            <li><a href="{{ route('profil.statut', ['id' => $profil->id, 'statut' => 0]) }}"> En attente</a></li>
                                            <li><a href="#"> Malade</a></li>
                                            <li><a href="{{ route('profil.statut', ['id' => $profil->id, 'statut' => -1]) }}"> Rejeter</a></li>
                                            <li class="divider"></li>
                                            {{-- <li><a href="#"><i class="i"></i> Make admin</a></li> --}}
                                        </ul>
                                    </div>
                                </div>	<!-- /controls -->
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">{{ $profils->links() }}</div>
@endsection
