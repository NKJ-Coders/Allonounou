<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Annone_recruteur extends Model
{
    protected $guarded = [];

    public function scopeGetOnlineAnnonces($query)
    {
        return $query->with('poste', 'compte_recruteur', 'localisation')->where([['compte_recruteur_id', Auth::user()->id_compte], ['online', 1]])->paginate(2);
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

    public function users()
    {

        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('titre', 'contenu');
    }

    public function compte_demandeurs()
    {

        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function enfants()
    {
        return $this->hasMany('App\Enfant');
    }

    public function jours()
    {
        return $this->belongsToMany('App\Jour')->withPivot('heure_debut', 'heure_fin');
    }

    public function parseDate($value)
    {
        $date = date_parse($value);
        $day = $date['day'];
        $annee = $date['year'];
        setlocale(LC_TIME, 'fr_FR', 'fra_FRA');
        $month = strftime("%B", strtotime($value));
        $mois = utf8_encode($month);
        $date_format = (!empty($day) && !empty($annee)) ? $day . " " . $mois . " " . $annee : " ";
        echo $date_format;
    }
}
