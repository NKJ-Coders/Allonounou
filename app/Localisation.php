<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    protected $guarded = [];

    public function scopeGetByIdParent($query)
    {
        return $query->where('id_parent', '!=', 0)->get();
    }

    public function annone_recruteurs()
    {

        return $this->hasMany('App\Annone_recruteur');
    }

    public function compte_demandeurs()
    {

        return $this->hasMany('App\Compte_demandeur');
    }
}
