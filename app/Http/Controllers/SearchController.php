<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchAnnonceByAll(Request $request)
    {
        if ($request->ajax()) {
            $date = now();
            $currentDateTime = explode(' ', $date);
            $currentDate = explode('-', $currentDateTime[0]);
            $currentDate = (int) $currentDate[0];
            $minYear = $currentDate - 18;
            $maxYear = (string) $currentDate - $request->age;
            $q = 'select a.id, post.nom as nom_poste, l.designation as nom_localisation, c.prenom, a.created_at from annonce_demandeurs as A, postes as post, localisations as l, compte_demandeurs as c, profils as p where a.poste_id=post.id and a.profil_id=p.id and p.compte_demandeur_id=c.id and c.localisation_id=l.id and c.date_nais like "%' . $maxYear . '"';
            if ($request->poste != 'tous') {
                $q .= ' and post.id = ' . $request->poste;
            }
            if (!empty($request->localisation)) {
                $q .= ' and l.designation like "%' . $request->localisation . '%"';
            }
            $query = DB::select($q);
            echo json_encode($query);
        }
    }
}
