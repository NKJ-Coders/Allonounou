<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Compte_demandeur extends Model
{
    public function profil()
    {

        return $this->hasOne('App\Profil');
    }

    public function annonce_demandeurs()
    {

        return $this->belongsToMany('App\Annonce_demandeur');
    }

    public function localisation()
    {
        return $this->belongsTo('App\Localisation');
    }
}
