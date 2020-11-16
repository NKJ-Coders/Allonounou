<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $guarded = [];

    public function experiences() {

        return $this->hasMany('App\Experience');
    }

    public function taches() {

        return $this->belongsToMany('App\Tache')->withTimestamps();
    }

    public function annone_recruteurs() {

        return $this->belongsToMany('App\Annone_recruteur')->withTimestamps();
    }

    public function annonce_demandeur() {

        return $this->hasOne('App\Annonce_demandeur');
    }

    public function compte_demandeur() {

        return $this->belongsTo('App\Compte_demandeur');
    }
}
