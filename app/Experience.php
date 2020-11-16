<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = [];

    public function profil() {

        return $this->belongsTo('App\Profil');
    }

    public function taches() {

        return $this->belongsToMany('App\Tache')->withTimestamps();
    }
}
