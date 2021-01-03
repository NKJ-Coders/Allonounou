<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['nom', 'statut', 'online'];

    public function scopeOnline($query)
    {
        return $query->where('online', 1)->get();
    }

    public function annone_recruteurs()
    {
        return $this->hasMany('App\Annone_recruteur');
    }

    public function annonce_demandeurs()
    {
        return $this->hasMany('App\Annonce_demandeur');
    }

    public function taches()
    {
        return $this->belongsToMany('App\Tache');
    }
}
