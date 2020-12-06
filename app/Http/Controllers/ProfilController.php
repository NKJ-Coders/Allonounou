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

        if (empty($data_profil[0])) {
            $profil = Profil::create($this->validator());

            $annonce_demandeur = new Annonce_demandeur;
            $annonce_demandeur->profil_id = $profil->id;
            $annonce_demandeur->poste_id = $request->poste_id;
            $annonce_demandeur->save();
            // upload files
            $this->storeImage($profil, $profil->id);

            $profil->update([
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        } else {
            // dd($data_profil[0]);
            $data_profil[0]->update($this->validator());
            // dd($data);
            // upload files
            $this->storeImage($data_profil[0], $data_profil[0]->id);

            $data_profil[0]->update([
                'user_id' => Auth::id(),
            ]);


            return redirect()->back()->with('confirmMsg', 'Profil crée avec succès!');
        }

        // return view('compte-demandeur.index')->with('confirmMsg', 'Profil crée avec succès!');

    }

    public function show($user)
    {

        $profil = Profil::where('user_id', $user)->get();
        // dd($profil[0]->photo);
        $users = User::where('id', $user)->get();
        $compte_demandeur = Compte_demandeur::findOrFail($users[0]->id_compte);

        return view('profil.show', compact('profil', 'compte_demandeur'));
    }

    public function edit(Profil $profil)
    {
    }

    public function update(Profil $profil)
    {
    }

    public function destroy(Profil $profil)
    {
        $profil->update(['online' => -1]);

        return redirect()->back();
    }

    // function de validation du formulaire
    private function validator()
    {
        return request()->validate([
            'cni' => 'required',
            // 'photo' => 'required|image|max:5000',
            'plan_localisation' => 'required',
            'certificat_medical' => 'required',
            'casier_judiciaire' => 'required',
            'nom_pere' => 'string',
            'nom_mere' => 'required',
            'date_nais' => 'required',
            'lieu_nais' => 'required',
            'nbre_enfant' => 'required|integer',
            'personne_proche1' => 'required',
            'personne_proche2' => 'string',
            'personne_proche3' => 'string',
            'personne_proche4' => 'string',
            'telephone_personne_proche1' => 'required|min:9|max:9',
            'telephone_personne_proche2' => 'min:9|max:9',
            'telephone_personne_proche3' => 'min:9|max:9',
            'telephone_personne_proche4' => 'min:9|max:9',
            'handicape_moteur' => 'required|integer',
            'handicape_visuel' => 'required|integer',
            'handicape_des_mains' => 'required|integer',
            'compte_demandeur_id' => 'required|integer'
        ]);
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
        }
        // mettre en attente
        if ($statut == 0) {
            $profil->update(['statut' => 0]);
        }
        // rejeter
        if ($statut == -1) {
            $profil->update(['statut' => -1]);
        }

        return redirect()->back();
    }
}
