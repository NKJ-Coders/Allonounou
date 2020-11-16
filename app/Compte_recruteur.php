<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte_recruteur extends Model
{
    public function annonce_demandeurs()
    {

        return $this->belongsToMany('App\Annonce_demandeur');
    }

    public function annone_recruteurs()
    {

        return $this->hasMany('App\Annone_recruteur');
    }

    public function abonnement()
    {

        return $this->hasMany('App\Abonnement');
    }
}
