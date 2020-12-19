<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte_recruteur extends Model
{
    protected $fillable = ['nom', 'email', 'telephone1', 'telephone2', 'telephone3'];

    public function likes()
    {

        return $this->belongsToMany('App\Annonce_demandeur', 'liker_demande');
    }

    public function annone_recruteurs()
    {

        return $this->hasMany('App\Annone_recruteur');
    }

    public function abonnement()
    {

        return $this->hasMany('App\Abonnement');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function signaler_demandes()
    {

        return $this->belongsToMany('App\Annonce_demandeur', 'signaler_demande')->withPivot('titre', 'contenu')->withTimestamps();
    }

    public function validate_candidates()
    {

        return $this->belongsToMany('App\Annonce_demandeur', 'selectionner_profil')->withTimestamps();
    }
}
