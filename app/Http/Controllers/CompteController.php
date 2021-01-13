<?php

namespace App\Http\Controllers;

use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
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
        // $ret = array("etat"=>2,"fort"=>5);
        // echo json_encode($ret);
        // $compte_di = $request->compte_di;
        // // dd($request->nom);
        if (!empty($request->nom) && isset($request->nom)) {
            $compte_di = $request->compte_di;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'nom' => $request->nom,
            ]);
        }
        if (!empty($request->telephone1) && isset($request->telephone1)) {
            $this->validate($request, [
                'telephone1' => 'required|unique:users',
            ]);
            $data = $request->all();
            $compte_di = $data['compte_di'];
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'telephone1' => $data['telephone1'],
            ]);
            $user = User::where('id_compte', $compte_di)->get();
            $user[0]->update([
                'telephone1' => $data['telephone1'],
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
        if (!empty($request->jour_metier) && isset($request->jour_metier) && !empty($request->mois_metier) && isset($request->mois_metier) && !empty($request->annee_metier) && isset($request->annee_metier)) {
            $compte_di = $request->compte_di;
            $date_arret_dernier_metier = $request->jour_metier . ' ' . $request->mois_metier . ' ' . $request->annee_metier;
            $compte = Compte_demandeur::where('id', $compte_di)->get();
            $compte[0]->update([
                'date_arret_dernier_metier' => $date_arret_dernier_metier,
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
        $compte_di = $request->compte_di;
        $compte_demandeur = Compte_demandeur::where('id', $compte_di)->first();
        $array = array("nom" => $compte_demandeur->nom, "prenom" => $compte_demandeur->prenom, "age_dernier_enfant" => $compte_demandeur->age_dernier_enfant, "telephone1" => $compte_demandeur->telephone1, "telephone2" => $compte_demandeur->telephone2, "telephone3" => $compte_demandeur->telephone3, "date_nais" => $compte_demandeur->date_nais, "situation_matrimoniale" => $compte_demandeur->situation_matrimoniale, "metier" => $compte_demandeur->metier, "date_arret_dernier_metier" => $compte_demandeur->date_arret_dernier_metier, "niveau_etude" => $compte_demandeur->niveau_etude, "langue" => $compte_demandeur->langue,);

        // // $user = User::where('id_compte',$compte_di)->get();
        // // $id_user=$user[0]->id;
        // return redirect()->route('update', ['user' => Auth::id()]);
        echo json_encode($array);
    }

    public function getmodify($compte_di)
    {
        $compte_demandeur = Compte_demandeur::where('id', $compte_di)->get();
        $compte_demandeur = $compte_demandeur[0];
        return view('compte-demandeur.modify', compact('compte_demandeur'));
    }

    public function getupdate()
    {
        return redirect()->route('compte-demandeur.show', ['user' => Auth::id()]);
    }
}
