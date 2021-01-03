<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $guarded = [];

    public function annonce_recruteur()
    {
        return $this->belongsTo('App\Annone_recruteur');
    }
}
