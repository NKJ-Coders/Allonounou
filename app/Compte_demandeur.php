<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Compte_demandeur extends Model
{
    protected $guarded = [];

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

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
