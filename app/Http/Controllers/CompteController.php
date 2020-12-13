<?php

namespace App\Http\Controllers;

use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function index()
    {
        $comptes = Compte_demandeur::paginate(10);

        return view('compte-demandeur.index', compact('comptes'));
    }

    public function update(Request $request)
    {
        // $compte_di = $request->compte_di;
        // dd($request->nom);
        if (!empty($request->nom) && isset($request->nom)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'nom' => $request->nom,
            ]);
        }
        if (!empty($request->telephone1) && isset($request->telephone1)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'telephone1' => $request->telephone1,
            ]);
            $user = User::where('id_compte', $compte_di)->get();
            $user[0]->update([
                'telephone1' => $request->telephone1,
            ]);
        }
        if (!empty($request->telephone2) && isset($request->telephone2)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'telephone2' => $request->telephone2,
            ]);
        }
        if (!empty($request->telephone3) && isset($request->telephone3)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'telephone3' => $request->telephone3,
            ]);
        }
        if (!empty($request->date_nais) && isset($request->date_nais)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'date_nais' => $request->date_nais,
            ]);
        }
        if (!empty($request->metier) && isset($request->metier)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'metier' => $request->metier,
            ]);
        }
        if (!empty($request->age_dernier_enfant) && isset($request->age_dernier_enfant)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'age_dernier_enfant' => $request->age_dernier_enfant,
            ]);
        }
        if (!empty($request->date_arret_dernier_metier) && isset($request->date_arret_dernier_metier)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'date_arret_dernier_metier' => $request->date_arret_dernier_metier,
            ]);
        }
        if (!empty($request->niveau_etude) && isset($request->niveau_etude)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'niveau_etude' => $request->niveau_etude,
            ]);
        }
        if (!empty($request->situation_matrimoniale) && isset($request->situation_matrimoniale)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'situation_matrimoniale' => $request->situation_matrimoniale,
            ]);
        }
        if (!empty($request->prenom) && isset($request->prenom)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'prenom' => $request->prenom,
            ]);
            $user = User::where('id_compte', $compte_di)->get();
            $user[0]->update([
                'prenom' => $request->prenom,
            ]);
        }
        if (!empty($request->langue) && isset($request->langue)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'langue' => $request->langue,
            ]);
        }
        // $user = User::where('id_compte',$compte_di)->get();
        // $id_user=$user[0]->id;
        return redirect()->route('update', ['user' => Auth::id()]);
    }

    public function getmodify($compte_di)
    {
        $compte_demandeur = Compte_demandeur::where('id', $compte_di)->get();
        $compte_demandeur = $compte_demandeur[0];
        return view('profil.modify', compact('compte_demandeur'));
    }

    public function getupdate()
    {
        return redirect()->route('profil.show', ['user' => Auth::id()]);
    }
}
