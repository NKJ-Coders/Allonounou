<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use App\Compte_demandeur;
use App\Localisation;
use App\Poste;
use App\Profil;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Annonce_recruteurController extends Controller
{
    // affichage du formulaire de publication
    public function create()
    {
        $postes = Poste::online();
        $localisations = Localisation::where('id_parent', 0)->get();
        $taches = Tache::getAll();

        return view('annonce-recruteur.create', compact('postes', 'localisations', 'taches'));
    }

    // publier annonce
    public function store(Request $request)
    {

        if ($request->heure_fin > $request->heure_debut) {
            // dd($request->localisation);
            $data = $request->validate([
                'poste_id' => 'required|integer',
                'urgent' => 'required|integer',
                'residente' => 'required|integer',
                'salaire' => 'required|integer',
                'heure_debut' => 'required',
                'heure_fin' => 'required',
                'tache_id' => 'required'
            ]);
            // dd($request->localisation);
            $localisation = Localisation::where('designation', $request->localisation)->first();

            // dd($localisation);

            $annonce_recrut = Annone_recruteur::create($data);

            $annonce_recrut->update(['compte_recruteur_id' => Auth::user()->id_compte]);
            // $getId = $annonce_recrut->id;

            $annonce_recrut->update(['localisation_id' => $localisation->id]);

            // insert @id_annonce & @id_tache in table tache_recrutement
            $annonce_recrut->taches()->sync([$request->tache_id]);

            session()->flash('confirmMsg', 'Annonces publiées avec succès!');

            // return back()->with('confirmMsg', );
        } else {
            session()->flash('errorMsg', 'Error: l\'heure de debut doit être inférieure à l\'heure de fin!');
        }

        return back();
    }

    // Affichage des annoncesdu recruteur
    public function index()
    {
        $myAnnonces = Annone_recruteur::online();
        // $getCandidate = $myAnnonces->with('profils')->get();
        // dd($myAnnonces[0]->profils);

        return view('annonce-recruteur.index', compact('myAnnonces'));
    }

    // lister toutes les offres
    public function list()
    {

        $allAnnonces = Annone_recruteur::with('compte_recruteur')->paginate(1);

        return view('annonce-recruteur.list', compact('allAnnonces'));
    }

    // suppression
    public function destroy(Annone_recruteur $annonce)
    {
        // dd($annonce);
        $annonce->updateOnline();

        // $annonce_recrut = Annone_recruteur::find($annonce);
        // $annonce_recrut->taches()->detach([$annonce_recrut->tache_id]);

        return back();
    }

    // formulaire de mise a jour
    public function edit(Annone_recruteur $annonce_recruteur)
    {

        $postes = Poste::online();
        $localisations = Localisation::getByIdParent();
        $taches = Tache::getAll();

        return view('annonce-recruteur.edit', compact('annonce_recruteur', 'postes', 'localisations', 'taches'));
    }

    // function de mise a jour
    public function update(Request $request, Annone_recruteur $annonce_recruteur)
    {

        $data = $request->validate([
            'poste_id' => 'required|integer',
            'localisation_id' => 'required',
            'urgent' => 'required|integer',
            'residente' => 'required|integer',
            'salaire' => 'required|integer',
            'heure_debut' => 'required',
            'heure_fin' => 'required'
        ]);

        $annonce_recruteur->update($data);

        return redirect('annonce-recruteur');
    }

    public function candidater(Request $request)
    {
        $compte = Compte_demandeur::find(Auth::user()->id_compte);
        $profil = Profil::where('compte_demandeur_id', $compte->id)->first();
        $hashAnonnce = $profil->annone_recruteurs()->where('annone_recruteur_id', $request->id_annonce)->exists();

        if (!empty($hashAnonnce)) {
            $profil->annone_recruteurs()->detach($request->id_annonce);
            $data = ['status' => 'annuler'];

            echo json_encode($data);
        } else {
            $profil->annone_recruteurs()->attach($request->id_annonce);
            $data = ['status' => 'valider'];

            echo json_encode($data);
        }
    }

    // lister candidatures d'un demandeur
    public function mesCandidatures()
    {
        $profil = Profil::where('user_id', Auth::id())->get();

        return view('compte-demandeur.mesCandidatures', compact('profil'));
    }
}
