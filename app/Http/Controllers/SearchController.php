<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchAnnonceByAll(Request $request)
    {
        if ($request->ajax()) {
            // $date = now();
            // $currentDateTime = explode(' ', $date);
            // $currentDate = explode('-', $currentDateTime[0]);
            // $currentDate = (int) $currentDate[0];
            // $minYear = $currentDate - 18;
            // $maxYear = (string) $currentDate - $request->age;
            $q = 'select a.id, post.nom as nom_poste, l.designation as nom_localisation, c.prenom, a.created_at from annonce_demandeurs as A, postes as post, localisations as l, compte_demandeurs as c, profils as p where a.poste_id=post.id and a.profil_id=p.id and p.compte_demandeur_id=c.id and c.localisation_id=l.id and c.age >= 18 and c.age <= ' . $request->age;
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

    public function searchOffre(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->text)) {
                // onrecupere la localisation du demandeur connecté
                if (Auth::check()) {
                    $currentUserLocalisation = Compte_demandeur::find(Auth::user()->id_compte);
                }

                $poste = Poste::where('nom', 'like', '%' . $request->text . '%')->first();

                $query = Annone_recruteur::with('jours', 'taches')->where([['poste_id', $poste->id], ['localisation_id', $currentUserLocalisation->localisation_id]])->get();
                // if (isset($currentUserLocalisation) && !empty($currentUserLocalisation)) {
                //     $query .= ->orWhere('localisation_id', $currentUserLocalisation->id);
                // }
                // $query .= ->get();
                echo json_encode($query);
            } else {
                $query = [];
                echo json_encode($query);
            }
        }
    }
}
