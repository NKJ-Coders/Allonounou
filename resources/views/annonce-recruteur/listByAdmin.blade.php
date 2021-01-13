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
                    <th scope="col">Recruteur</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Salaire</th>
                    <th scope="col">Type maison</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offres as $key => $offre)
                    <?php //$getoffre = App\offre::where('compte_demandeur_id', $compte->id)->first(); ?>
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $offre->compte_recruteur->nom }}</td>
                        <td>{{ $offre->poste->nom }}</a></td>
                        <td>{{ $offre->localisation->designation }}</td>
                        <td>{{ $offre->salaire }}</td>
                        <td>{{ $offre->type_maison }}</td>
                        <td><?php if($offre->online == 1) { ?><span class="label label-success">Validé</span><?php } elseif ($offre->online == 0) { ?><span class="label label-warning">En attente</span><?php } else { ?> <span class="label label-danger">Rejeté</span><?php } ?></td>
                        <td>
                             <div class="controls">
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="#"><i class="icon-eye-open icon-white"></i> Statut</a>
                                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php if($offre->online == 0 || $offre->online == -1) : ?>
                                                <li><a href="{{ route('changeStatus', ['offre' => $offre->id, 'statut' => 1]) }}"> Publier</a></li>
                                            <?php endif; ?>
                                            <?php if($offre->online == 1) : ?>
                                                <li><a href="{{ route('changeStatus', ['offre' => $offre->id, 'statut' => 0]) }}"> Dépublier</a></li>
                                            <?php endif; ?>
                                            <?php if($offre->online == 0 || $offre->online == 1) : ?>
                                                <li><a href="{{ route('changeStatus', ['offre' => $offre->id, 'statut' => -1]) }}"> Rejeter</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>	<!-- /controls -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">{{ $offres->links() }}</div>
@endsection
