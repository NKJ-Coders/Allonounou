<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $guarded = [];

    public function scopeGetAll($query) {
        return $query->where('online', 1)->get();
    }

    public function annonce_recruteurs() {

        return $this->belongsToMany('App\Annone_recruteur')->withTimestamps();
    }

    public function profils() {

        return $this->belongsToMany('App\Profil')->withTimestamps();
    }

    public function experiences() {

        return $this->belongsToMany('App\Experience')->withTimestamps();
    }
}
