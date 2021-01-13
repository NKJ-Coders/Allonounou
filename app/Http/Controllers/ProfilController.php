<?php

namespace App\Http\Controllers;

use App\Annonce_demandeur;
use App\Compte_demandeur;
use App\Poste;
use App\Profil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $profils = Profil::with('compte_demandeur')->where('online', '<>', -1)->paginate(15);

        return view('profil.index', compact('profils'));
    }

    public function create(Compte_demandeur $compte)
    {
        $postes = Poste::all();
        // $onlinelink = Profil::find(7);
        // $link = 'storage/' . $onlinelink->photo;
        // $size = Storage::size($link);
        return view('profil.create', compact('compte', 'postes'));
    }

    public function store(Request $request)
    {
        $data_profil = Profil::where('compte_demandeur_id', $request->compte_demandeur_id)->get();
        $compte = Compte_demandeur::find($request->compte_demandeur_id);

        if (isset($request->form1)) {
            $data_request = request()->validate([
                'cni' => 'required',
                'plan_localisation' => 'required',
                'certificat_medical' => 'required',
                'casier_judiciaire' => 'required',
                'compte_demandeur_id' => 'required'
            ]);
            if (empty($data_profil[0])) {
                $profil = Profil::create(['compte_demandeur_id' => $request->compte_demandeur_id]);
                // upload files
                $this->storeImage($profil, $profil->id);
                $compte->update(['statut' => 1]);
            } else {
                $data_profil[0]->update(['compte_demandeur_id' => $request->compte_demandeur_id]);
                //  upload files
                $this->storeImage($data_profil[0], $data_profil[0]->id);
                $compte->update(['statut' => 1]);
            }
            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        }

        if (isset($request->form2)) {
            $data_request = request()->validate([
                'nom_pere' => 'string',
                'nom_mere' => 'required',
                'lieu_nais' => 'required',
                'nbre_enfant' => 'required|integer',
                'compte_demandeur_id' => 'required'
            ]);
            if (empty($data_profil[0])) {
                $profil = Profil::create($data_request);

                // on cree son annonce avec online=0
                $annonce_demandeur = new Annonce_demandeur;
                $annonce_demandeur->profil_id = $profil->id;
                $annonce_demandeur->online = 0;
                $annonce_demandeur->poste_id = $request->poste_id;
                $annonce_demandeur->save();

                $compte->update(['statut' => 1]);
            } else {
                $data_profil[0]->update($data_request);

                // verifie si annonce existe deja
                $data_annonce = Annonce_demandeur::where('profil_id', $data_profil[0]->id)->first();
                if (empty($data_annonce)) {
                    // on cree son annonce avec online=0
                    $annonce_demandeur = new Annonce_demandeur;
                    $annonce_demandeur->profil_id = $data_profil[0]->id;
                    $annonce_demandeur->online = 0;
                    $annonce_demandeur->poste_id = $request->poste_id;
                    $annonce_demandeur->save();
                } else {
                    $data_annonce->update(['poste_id' => $request->poste_id]);
                }

                $compte->update(['statut' => 1]);
            }
            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        }

        if (isset($request->form3)) {
            $data_request = request()->validate([
                'personne_proche1' => 'required',
                'personne_proche2' => 'sometimes',
                'telephone_personne_proche1' => 'required|min:9|max:9',
                'telephone_personne_proche2' => 'sometimes|min:9|max:9',
                'compte_demandeur_id' => 'required'
            ]);
            if (empty($data_profil[0])) {
                $profil = Profil::create($data_request);
                $compte->update(['statut' => 1]);
            } else {
                $data_profil[0]->update($data_request);
                $compte->update(['statut' => 1]);
            }
            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        }

        if (isset($request->form4)) {
            $data_request = request()->validate([
                'handicape_moteur' => 'required|integer',
                'handicape_visuel' => 'required|integer',
                'handicape_des_mains' => 'required|integer',
                'compte_demandeur_id' => 'required'
            ]);
            if (empty($data_profil[0])) {
                $profil = Profil::create($data_request);
                $compte->update(['statut' => 1]);
            } else {
                $data_profil[0]->update($data_request);
                $compte->update(['statut' => 1]);
            }
            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        }
    }

    public function show($user)
    {
        $users = User::where('id', $user)->get();
        $profil = Profil::where('compte_demandeur_id', $users[0]->id_compte)->get();
        $profil = (empty($profil[0])) ? null : $profil[0];
        $compte_demandeur = Compte_demandeur::findOrFail($users[0]->id_compte);
        return view('compte-demandeur.show', compact('profil', 'compte_demandeur'));
    }

    public function edit(Profil $profil)
    {
    }

    public function destroy(Profil $profil)
    {
        $profil->update(['online' => -1]);
        $annonce_demandeur = Annonce_demandeur::where('profil_id', $profil->id)->first();
        $annonce_demandeur->update(['online' => 0]);

        return redirect()->back();
    }

    public function getupdate($profil_di)
    {
        $profil = Profil::where('id', $profil_di)->get();
        $profil = ($profil == [0]) ? null : $profil[0];
        $compte_demandeur = Compte_demandeur::findOrFail($profil->compte_demandeur_id);
        return view('profil.show', compact('profil', 'compte_demandeur'));
    }

    public function getmodify($profil_di)
    {
        $profil = Profil::where('id', $profil_di)->get();
        $profil = ($profil == [0]) ? null : $profil[0];
        return view('profil.modify', compact('profil'));
    }

    public function update(Request $request)
    {
        // echo json_encode($request->personne_proche1);
        // $compte_di = $request->compte_di;
        // dd($request->nom);

        if (!empty($request->nom_pere) && isset($request->nom_pere)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'nom_pere' => $request->nom_pere,
            ]);
        }
        if (!empty($request->nom_mere) && isset($request->nom_mere)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'nom_mere' => $request->nom_mere,
            ]);
        }
        if (!empty($request->lieu_nais) && isset($request->lieu_nais)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'lieu_nais' => $request->lieu_nais,
            ]);
        }
        if (!empty($request->nbre_enfant) && isset($request->nbre_enfant)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'nbre_enfant' => $request->nbre_enfant,
            ]);
        }
        if (!empty($request->personne_proche1) && isset($request->personne_proche1)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'personne_proche1' => $request->personne_proche1,
            ]);
        }
        if (!empty($request->personne_proche2) && isset($request->personne_proche2)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'personne_proche2' => $request->personne_proche2,
            ]);
        }
        if (!empty($request->personne_proche3) && isset($request->personne_proche3)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'personne_proche3' => $request->personne_proche3,
            ]);
        }
        if (!empty($request->personne_proche4) && isset($request->personne_proche4)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'personne_proche4' => $request->personne_proche4,
            ]);
        }
        if (!empty($request->telephone_personne_proche1) && isset($request->telephone_personne_proche1)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'telephone_personne_proche1' => $request->telephone_personne_proche1,
            ]);
        }
        if (!empty($request->telephone_personne_proche2) && isset($request->telephone_personne_proche2)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'telephone_personne_proche2' => $request->telephone_personne_proche2,
            ]);
        }
        if (!empty($request->telephone_personne_proche3) && isset($request->telephone_personne_proche3)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'telephone_personne_proche3' => $request->telephone_personne_proche3,
            ]);
        }
        if (!empty($request->telephone_personne_proche4) && isset($request->telephone_personne_proche4)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'telephone_personne_proche4' => $request->telephone_personne_proche4,
            ]);
        }
        if (!empty($request->handicape_moteur) && isset($request->handicape_moteur)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'handicape_moteur' => $request->handicape_moteur,
            ]);
        }
        if (!empty($request->handicape_visuel) && isset($request->handicape_visuel)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'handicape_visuel' => $request->handicape_visuel,
            ]);
        }
        if (!empty($request->handicape_des_mains) && isset($request->handicape_des_mains)) {
            $profil_di = $request->profil_di;
            $profil = Profil::where('id', $profil_di)->get();
            $profil[0]->update([
                'handicape_des_mains' => $request->handicape_des_mains,
            ]);
        }
        $profil_di = $request->profil_di;
        $profil = Profil::where('id', $profil_di)->first();
        $array = array("nom_pere" => $profil->nom_pere, "nom_mere" => $profil->nom_mere, "lieu_nais" => $profil->lieu_nais, "nbre_enfant" => $profil->nbre_enfant, "personne_proche1" => $profil->personne_proche1, "personne_proche2" => $profil->personne_proche2, "personne_proche3" => $profil->personne_proche3, "personne_proche4" => $profil->personne_proche4, "telephone_personne_proche1" => $profil->telephone_personne_proche1, "telephone_personne_proche2" => $profil->telephone_personne_proche2, "telephone_personne_proche3" => $profil->telephone_personne_proche3, "telephone_personne_proche4" => $profil->telephone_personne_proche4, "handicape_moteur" => $profil->handicape_moteur, "handicape_visuel" => $profil->handicape_visuel, "handicape_des_mains" => $profil->handicape_des_mains,);

        // // $user = User::where('id_compte',$compte_di)->get();
        // // $id_user=$user[0]->id;
        // // return redirect()->route('update', ['user' => Auth::id()]);
        // $ret = array("etat"=>2);
        echo json_encode($array);
    }
    // function d'upload d'image
    public function storeImage(Profil $profil, $id)
    {
        // if (request('photo')) {
        //     $profil->update([
        //         'photo' => request('photo')->storeAs('documents/avatars', 'profil' . $id . '.jpg', 'public')
        //     ]);
        // }
        if (request('cni')) {
            $profil->update([
                'cni' => request('cni')->storeAs('documents/cni', 'cni' . $id . '.pdf', 'public')
            ]);
        }
        if (request('plan_localisation')) {
            $profil->update([
                'plan_localisation' => request('plan_localisation')->storeAs('documents/plan-localisation', 'plan_localisation' . $id . '.pdf', 'public')
            ]);
        }
        if (request('certificat_medical')) {
            $profil->update([
                'certificat_medical' => request('certificat_medical')->storeAs('documents/certificat-medical', 'certificat' . $id . '.pdf', 'public')
            ]);
        }
        if (request('casier_judiciaire')) {
            $profil->update([
                'casier_judiciaire' => request('casier_judiciaire')->storeAs('documents/casier-judiciaire', 'casier' . $id . '.pdf', 'public')
            ]);
        }
    }

    // Modifier le statut du profil
    public function changeStatut(Profil $profil, $statut)
    {
        // valider le profil
        if ($statut == 1) {
            $profil->update(['statut' => 1]);

            $annonce_demandeur = Annonce_demandeur::where('profil_id', $profil->id)->first();
            if (!empty($annonce_demandeur)) {
                $annonce_demandeur->update(['online' => 1, 'profil_id' => $profil->id]);
            }
        }
        // mettre en attente
        if ($statut == 0) {
            $profil->update(['statut' => 0]);

            $annonce_demandeur = Annonce_demandeur::where('profil_id', $profil->id)->first();
            if (!empty($annonce_demandeur)) {
                $annonce_demandeur->update(['online' => 0, 'profil_id' => $profil->id]);
            }
        }
        // rejeter
        if ($statut == -1) {
            $profil->update(['statut' => -1]);

            $annonce_demandeur = Annonce_demandeur::where('profil_id', $profil->id)->first();
            if (!empty($annonce_demandeur)) {
                $annonce_demandeur->update(['online' => 0, 'profil_id' => $profil->id]);
            }
        }

        return redirect()->back();
    }
}
