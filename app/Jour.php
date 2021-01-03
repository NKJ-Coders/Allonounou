<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    public function annonce_recruteurs()
    {
        return $this->belongsToMany('App\Annone_recruteur')->withPivot('heure_debut', 'heure_fin');
    }
}
