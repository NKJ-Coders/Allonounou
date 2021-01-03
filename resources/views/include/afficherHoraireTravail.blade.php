<div class="row">
    @if(Session::has('lundi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Lundi: {{ Session::get('heure_debut_lundi') }} - {{ Session::get('heure_fin_lundi') }}</div>
    @endif
    @if(Session::has('mardi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Mardi: {{ Session::get('heure_debut_mardi') }} - {{ Session::get('heure_fin_mardi') }}</div>
    @endif
    @if(Session::has('mercredi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Mercredi: {{ Session::get('heure_debut_mercredi') }} - {{ Session::get('heure_fin_mercredi') }}</div>
    @endif
    @if(Session::has('jeudi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Jeudi: {{ Session::get('heure_debut_jeudi') }} - {{ Session::get('heure_fin_jeudi') }}</div>
    @endif
    @if(Session::has('vendredi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Vendredi: {{ Session::get('heure_debut_vendredi') }} - {{ Session::get('heure_fin_vendredi') }}</div>
    @endif
    @if(Session::has('samedi'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Samedi: {{ Session::get('heure_debut_samedi') }} - {{ Session::get('heure_fin_samedi') }}</div>
    @endif
    @if(Session::has('dimanche'))
        <div class="col-xs-3 offset-xs-1 col-md-4">Dimanche: {{ Session::get('heure_debut_dimanche') }} - {{ Session::get('heure_fin_dimanche') }}</div>
    @endif
</div>
