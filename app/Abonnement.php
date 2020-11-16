<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{

    public function compte_recruteur()
    {

        return $this->belongsTo('App\Compte_recruteur');
    }

    public function interviews()
    {

        return $this->hasMany('App\Interview');
    }
}
