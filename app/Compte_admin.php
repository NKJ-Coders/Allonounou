<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte_admin extends Model
{
    protected $fillable = [
        'nom', 'telephone1'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
