<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annone_recruteur extends Model
{
    protected $guarded = [];

    public function scopeOnline($query)
    {
        return $query->where('online', 1)->get();
    }

    public function getUrgentAttribute($attributes)
    {

        return $this->getUrgentOptions()[$attributes];
    }

    public function getUrgentOptions()
    {

        return [
            0 => 'Non',
            1 => 'Oui'
        ];
    }

    public function getResidenteAttribute($attributes)
    {

        return $this->getResidenteOptions()[$attributes];
    }

    public function getResidenteOptions()
    {

        return [
            0 => 'Non',
            1 => 'Oui'
        ];
    }

    public function poste()
    {
        return $this->belongsTo('App\Poste');
    }

    public function localisation()
    {

        return $this->belongsTo('App\Localisation');
    }

    public function scopeUpdateOnline($query)
    {

        return $query->update(['online' => 0]);
    }

    public function taches()
    {

        return $this->belongsToMany('App\Tache')->withTimestamps();
    }

    public function profils()
    {

        return $this->belongsToMany('App\Profil')->withTimestamps();
    }

    public function compte_recruteur()
    {

        return $this->belongsTo('App\Compte_recruteur');
    }

    public function interviews()
    {

        return $this->hasMany('App\Interview');
    }
}
