@extends('layouts.appAdmin')

@section('contenu')

    @if(Session::has('onlineMSg'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('onlineMSg') }}
        </div>
    @endif

    @if(Session::has('offlineMsg'))
        <div class="control-group">
            <div class="controls">
                    <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> {{ Session::get('offlineMsg') }}
        </div>
    @endif

    @if(Session::has('rejetMsg'))
        <div class="control-group">
            <div class="controls">
                <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> {{ Session::get('rejetMsg') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="thead-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($annonces) > 0)
                    @foreach ($annonces as $key => $annonce)
                        <?php //$getannonce = App\annonce::where('compte_demandeur_id', $compte->id)->first(); ?>
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td><img style="height: 40%" src="{{ asset($annonce->profil->photo) }}" alt="{{ $annonce->profil->compte_demandeur->nom }}"></td>
                            <td>{{ $annonce->profil->compte_demandeur->nom }} {{ $annonce->profil->compte_demandeur->prenom }}</td>
                            <td>{{ $annonce->poste->nom }}</a></td>
                            <td><?php if($annonce->online == 1) { ?><span class="label label-success">Validé</span><?php } elseif ($annonce->online == 0) { ?><span class="label label-warning">En attente</span><?php } else { ?> <span class="label label-danger">Rejeté</span><?php } ?></td>
                            <td>
                                <div class="controls">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="#"><i class="icon-eye-open icon-white"></i> Statut</a>
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <?php if($annonce->online == 0 || $annonce->online == -1) : ?>
                                                    <li><a href="{{ route('changeStatus', ['annonce' => $annonce->id, 'statut' => 1]) }}"> Publier</a></li>
                                                <?php endif; ?>
                                                <?php if($annonce->online == 1) : ?>
                                                    <li><a href="{{ route('changeStatus', ['annonce' => $annonce->id, 'statut' => 0]) }}"> Dépublier</a></li>
                                                <?php endif; ?>
                                                <?php if($annonce->online == 0 || $annonce->online == 1) : ?>
                                                    <li><a href="{{ route('changeStatus', ['annonce' => $annonce->id, 'statut' => -1]) }}"> Rejeter</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>	<!-- /controls -->
                            </td>
                        </tr>
                    @endforeach
                @else
                        <tr><td colspan="6"><div class="text-center">Aucune annonce disponible</div></td></tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">{{ $annonces->links() }}</div>
@endsection
