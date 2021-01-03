<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localisation;
use App\Poste;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OffreController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.demandeur');
    }

    public function signaler(Request $request)
    {
        $this->authorize('signaler', Annone_recruteur::class);

        $data = $request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]);

        $user = User::find(Auth::id());

        // dd($request->contenu);

        $user->annone_recruteurs()->attach($request->annone_recruteur_id, ['titre' => $request->titre, 'contenu' => $request->contenu]);
        return redirect()->back();
    }

    public function liker(Request $request)
    {
        $this->authorize('liker', Annone_recruteur::class);

        if ($request->ajax()) {
            $compte = Compte_demandeur::find(Auth::user()->id_compte);
            $hashAnonnce = $compte->annone_recruteurs()->where('annone_recruteur_id', $request->annonce_recruteur_id)->exists();

            if ($hashAnonnce) {
                $compte->annone_recruteurs()->detach($request->annonce_recruteur_id);
                $data = ['status' => 'unlike'];

                echo json_encode($data);
            } else {
                $compte->annone_recruteurs()->attach($request->annonce_recruteur_id);
                $data = ['status' => 'like'];

                echo json_encode($data);
            }
        }
    }

    public function getTacheByIdPoste(Request $request)
    {
        $postes = Poste::find($request->id_poste);
        $id_taches = $postes->taches()->get();
        echo json_encode($id_taches);
    }

    public function getInputByForm(Request $request)
    {
        if (isset($request->form1)) {
            $tab_taches = $request->id_taches;

            // if (Session::has('id_taches') || Session::has('id_poste') || Session::has('urgent') || Session::has('residente') || Session::has('description')) {
            $session_taches = Session::get('id_taches');
            for ($i = 0; $i < count($tab_taches); $i++) {
                if (!array($tab_taches[$i], $session_taches)) {
                    $request->session()->push('id_taches', $tab_taches[$i]);
                }
            }
            Session::forget(['id_taches', 'id_poste', 'urgent', 'residente', 'description']);
            $request->session()->push('id_taches', $tab_taches);
            session([
                'id_poste' => $request->id_poste,
                'urgent' => $request->urgent,
                'residente' => $request->residente,
                'description' => $request->description
            ]);
            // } else {
            // $request->session()->push('id_taches', $request->id_taches);
            // session([
            //     'id_poste' => $request->id_poste,
            //     'urgent' => $request->urgent,
            //     'residente' => $request->residente,
            //     'description' => $request->description
            // ]);
            // }
        }

        if (isset($request->form2)) {
            if (!empty($request->lundi)) {
                session([
                    'lundi' => $request->lundi,
                    'heure_debut_lundi' => $request->heure_debut_lundi,
                    'heure_fin_lundi' => $request->heure_fin_lundi
                ]);
            }
            if (!empty($request->mardi)) {
                session([
                    'mardi' => $request->mardi,
                    'heure_debut_mardi' => $request->heure_debut_mardi,
                    'heure_fin_mardi' => $request->heure_fin_mardi
                ]);
            }
            if (!empty($request->mercredi)) {
                session([
                    'mercredi' => $request->mercredi,
                    'heure_debut_mercredi' => $request->heure_debut_mercredi,
                    'heure_fin_mercredi' => $request->heure_fin_mercredi
                ]);
            }
            if (!empty($request->jeudi)) {
                session([
                    'jeudi' => $request->jeudi,
                    'heure_debut_jeudi' => $request->heure_debut_jeudi,
                    'heure_fin_jeudi' => $request->heure_fin_jeudi
                ]);
            }
            if (!empty($request->vendredi)) {
                session([
                    'vendredi' => $request->vendredi,
                    'heure_debut_vendredi' => $request->heure_debut_vendredi,
                    'heure_fin_vendredi' => $request->heure_fin_vendredi
                ]);
            }
            if (!empty($request->samedi)) {
                session([
                    'samedi' => $request->samedi,
                    'heure_debut_samedi' => $request->heure_debut_samedi,
                    'heure_fin_samedi' => $request->heure_fin_samedi
                ]);
            }
            if (!empty($request->dimanche)) {
                session([
                    'dimanche' => $request->dimanche,
                    'heure_debut_dimanche' => $request->heure_debut_dimanche,
                    'heure_fin_dimanche' => $request->heure_fin_dimanche
                ]);
            }
        }
        if (isset($request->form3)) {
            session([
                'type_maison' => $request->type_maison,
                'piece' => $request->piece,
                'taille_maison' => $request->taille_maison
            ]);
        }
        if (isset($request->form4)) {
            session([
                'enCharge' => $request->enCharge,
                'nbre_enfant' => $request->nbre_enfant
            ]);
            if (!empty($request->age_enfant)) {
                $request->session()->push('age_enfant', $request->age_enfant);
            }
        }
        if (isset($request->form5)) {
            session(['id_localisation' => $request->id_localisation]);
        }
    }

    public function deleteSessionForm1(Request $request)
    {
        if (isset($request->form1)) {
            Session::forget(['id_taches', 'id_poste', 'urgent', 'residente', 'description']);
        }

        if (isset($request->form2)) {
            if (Session::has('lundi')) {
                Session::forget(['lundi', 'heure_debut_lundi', 'heure_fin_lundi']);
            }
            if (Session::has('mardi')) {
                Session::forget(['mardi', 'heure_debut_mardi', 'heure_fin_mardi']);
            }
            if (Session::has('mercredi')) {
                Session::forget(['mercredi', 'heure_debut_mercredi', 'heure_fin_mercredi']);
            }
            if (Session::has('jeudi')) {
                Session::forget(['jeudi', 'heure_debut_jeudi', 'heure_fin_jeudi']);
            }
            if (Session::has('vendredi')) {
                Session::forget(['vendredi', 'heure_debut_vendredi', 'heure_fin_vendredi']);
            }
            if (Session::has('samedi')) {
                Session::forget(['samedi', 'heure_debut_samedi', 'heure_fin_samedi']);
            }
            if (Session::has('dimanche')) {
                Session::forget(['dimanche', 'heure_debut_dimanche', 'heure_fin_dimanche']);
            }
        }

        if (isset($request->form3)) {
            Session::forget(['type_maison', 'piece', 'taille_maison']);
        }

        if (isset($request->form4)) {
            Session::forget(['enCharge', 'nbre_enfant']);
            if (Session::has('age_enfant')) {
                Session::forget('age_enfant');
            }
        }

        if (isset($request->form5)) {
            Session::forget('id_localisation');
            return view('annonce-recruteur.create');
        }
    }

    public function publier(Request $request)
    {
        $poste = Poste::find($request->session()->get('id_poste'));
        $zone = Localisation::find($request->session()->get('id_localisation'));
        $quartier = Localisation::where('id', $zone->id_parent)->first();
        $arr = Localisation::where('id', $quartier->id_parent)->first();
        $ville = Localisation::where('id', $arr->id_parent)->first();

        return view('annonce-recruteur.publier', compact('poste', 'zone', 'ville', 'quartier'));
    }
}
