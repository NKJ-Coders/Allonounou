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

    public function compte_recruteurs()
    {

        return $this->belongsToMany('App\Compte_recruteur');
    }

    public function interviews()
    {

        return $this->hasMany('App\Interview');
    }
}
