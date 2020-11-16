<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{

    public function abonnement()
    {

        return $this->belongsTo('App\Abonnement');
    }

    public function annonce_demandeur()
    {

        return $this->belongsTo('App\Annonce_demandeur');
    }

    public function annone_recruteur()
    {

        return $this->belongsTo('App\Annone_recruteur');
    }
}
