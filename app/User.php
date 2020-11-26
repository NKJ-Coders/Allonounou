<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_compte', 'name', 'telephone1', 'type', 'password', 'code', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function compte_demandeur()
    {
        return $this->belongsTo('App\Compte_demandeur');
    }

    public function compte_recruteur()
    {
        return $this->belongsTo('App\Compte_recruteur');
    }

    public function compte_admin()
    {
        return $this->belongsTo('App\Compte_admin');
    }

    public function profils()
    {
        return $this->hasMany('App\Profil');
    }
}
