<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use App\Localisation;
use App\Poste;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Annonce_recruteurController extends Controller
{
    // affichage du formulaire de publication
    public function create() {
        $postes = Poste::online();
        $localisations = Localisation::getByIdParent();
        $taches = Tache::getAll();

        return view('annonce-recruteur.create', compact('postes', 'localisations', 'taches'));
    }

    // publier annonce
    public function store(Request $request) {

        if ($request->heure_fin > $request->heure_debut) {
            $data = $request->validate([
                'poste_id' => 'required|integer',
                'localisation_id' => 'required',
                'urgent' => 'required|integer',
                'residente' => 'required|integer',
                'salaire' => 'required|integer',
                'heure_debut' => 'required',
                'heure_fin' => 'required'
            ]);
            // dd($data);
            $annonce_recrut = Annone_recruteur::create($data);
            // $getId = $annonce_recrut->id;

            // insert @id_annonce & @id_tache in table tache_recrutement
            $annonce_recrut->taches()->sync([$request->tache_id]);

            session()->flash('confirmMsg', 'Annonces publiées avec succès!' );

            // return back()->with('confirmMsg', );
        } else {
            session()->flash('errorMsg', 'Error: l\'heure de debut doit être inférieure à l\'heure de fin!');
        }

        return back();

    }

    // Affichage des annoncesdu recruteur
    public function index() {
        $myAnnonces = Annone_recruteur::online();

        return view('annonce-recruteur.index', compact('myAnnonces'));
    }

    // suppression
    public function destroy(Annone_recruteur $annonce) {
        // dd($annonce);
        $annonce->updateOnline();

        // $annonce_recrut = Annone_recruteur::find($annonce);
        // $annonce_recrut->taches()->detach([$annonce_recrut->tache_id]);

        return back();
    }

    // formulaire de mise a jour
    public function edit(Annone_recruteur $annonce_recruteur) {

        $postes = Poste::online();
        $localisations = Localisation::getByIdParent();
        $taches = Tache::getAll();

        return view('annonce-recruteur.edit', compact('annonce_recruteur', 'postes', 'localisations', 'taches'));
    }

    // function de mise a jour
    public function update(Request $request, Annone_recruteur $annonce_recruteur) {

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
}
