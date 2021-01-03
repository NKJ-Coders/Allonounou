<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce_demandeur extends Model
{
    protected $guarded = [];

    public function profil()
    {

        return $this->belongsTo('App\Profil');
    }

    public function poste()
    {
        return $this->belongsTo('App\Poste');
    }

    public function compte_demandeurs()
    {

        return $this->belongsToMany('App\Compte_demandeur');
    }

    public function likers()
    {

        return $this->belongsToMany('App\Compte_recruteur', 'liker_demande');
    }

    public function interviews()
    {

        return $this->hasMany('App\Interview');
    }

    public function signalers()
    {

        return $this->belongsToMany('App\Compte_recruteur', 'signaler_demande')->withPivot('titre', 'contenu');
    }

    public function select_candidates()
    {

        return $this->belongsToMany('App\Compte_recruteur', 'selectionner_profil');
    }

    public function jours()
    {
        return $this->belongsToMany('App\Jour')->withPivot('heure_debut', 'heure_fin');
    }
}
