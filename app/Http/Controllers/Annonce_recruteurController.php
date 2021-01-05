<?php

namespace App\Http\Controllers;

use App\Annone_recruteur;
use App\Compte_demandeur;
use App\Enfant;
use App\Jour;
use App\Localisation;
use App\Poste;
use App\Profil;
use App\Tache;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Annonce_recruteurController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.demandeur')->only('candidater');
        $this->middleware('check.recruteur')->only('index', 'create', 'edit', 'destroy', 'store', 'update');
    }

    // affichage du formulaire de publication
    public function create(Request $request)
    {
        $request->session()->forget([
            'id_poste', 'id_taches',
            'urgent', 'residente',
            'description', 'type_maison',
            'piece', 'taille_maison',
            'enCharge', 'nbre_enfant',
            'age_enfant', 'id_localisation',
        ]);
        if ($request->session()->has('lundi')) {
            $request->session()->forget(['lundi', 'heure_debut_lundi', 'heure_fin_lundi']);
        }
        if ($request->session()->has('mardi')) {
            $request->session()->forget(['mardi', 'heure_debut_mardi', 'heure_fin_mardi']);
        }
        if ($request->session()->has('mercredi')) {
            $request->session()->forget(['mercredi', 'heure_debut_mercredi', 'heure_fin_mercredi']);
        }
        if ($request->session()->has('jeudi')) {
            $request->session()->forget(['jeudi', 'heure_debut_jeudi', 'heure_fin_jeudi']);
        }
        if ($request->session()->has('vendredi')) {
            $request->session()->forget(['vendredi', 'heure_debut_vendredi', 'heure_fin_vendredi']);
        }
        if ($request->session()->has('samedi')) {
            $request->session()->forget(['samedi', 'heure_debut_samedi', 'heure_fin_samedi']);
        }
        if ($request->session()->has('dimanche')) {
            $request->session()->forget(['dimanche', 'heure_debut_dimanche', 'heure_fin_dimanche']);
        }
        // dd($request->session()->all());
        $jours = Jour::all();
        $postes = Poste::where('online', 1)->get();
        $localisations = Localisation::where('id_parent', 0)->get();
        $taches = Tache::getAll();
        $type_maisons = ['Appartement', 'Duplex', 'Villa'];
        $pieces = ['une pièces', '2 pieces', '3 pièces'];
        $taille_maisons = ['Petit', 'Moyen', 'Grand'];

        return view('annonce-recruteur.create', compact('postes', 'localisations', 'taches', 'jours', 'type_maisons', 'pieces', 'taille_maisons'));
    }

    // publier annonce
    public function store(Request $request)
    {

        // if ($request->heure_fin > $request->heure_debut) {
        //     // dd($request->localisation);
        //     $data = $request->validate([
        //         'poste_id' => 'required|integer',
        //         'urgent' => 'required|integer',
        //         'residente' => 'required|integer',
        //         'salaire' => 'required|integer',
        //         'heure_debut' => 'required',
        //         'heure_fin' => 'required',
        //         'tache_id' => 'required'
        //     ]);
        //     // dd($request->localisation);
        //     $localisation = Localisation::where('designation', $request->localisation)->first();

        //     // dd($localisation);

        //     $annonce_recrut = Annone_recruteur::create($data);

        //     $annonce_recrut->update(['compte_recruteur_id' => Auth::user()->id_compte]);
        //     // $getId = $annonce_recrut->id;

        //     $annonce_recrut->update(['localisation_id' => $localisation->id]);

        //     // insert @id_annonce & @id_tache in table tache_recrutement
        //     $annonce_recrut->taches()->sync([$request->tache_id]);

        //     session()->flash('confirmMsg', 'Annonces publiées avec succès!');

        //     // return back()->with('confirmMsg', );
        // } else {
        //     session()->flash('errorMsg', 'Error: l\'heure de debut doit être inférieure à l\'heure de fin!');
        // }
        $annonce_recruteur = Annone_recruteur::create([
            'compte_recruteur_id' => Auth::user()->id_compte,
            'poste_id' => $request->session()->get('id_poste'),
            'localisation_id' => $request->session()->get('id_localisation'),
            'salaire' => $request->salaire,
            'nbre_enfant' => $request->session()->get('nbre_enfant'),
            'description' => $request->session()->get('description'),
            'residente' => $request->session()->get('residente'),
            'urgent' => $request->session()->get('urgent'),
            'type_maison' => $request->session()->get('type_maison'),
            'nbre_piece' => $request->session()->get('piece'),
            'taille_maison' => $request->session()->get('taille_maison'),
            'personnes_agees' => $request->session()->get('enCharge'),
        ]);
        $taches = $request->session()->get('id_taches');
        // dd($taches);
        $annonce_recruteur->taches()->attach($taches[0]);

        if ($request->session()->get('nbre_enfant') > 0) {
            $ages = $request->session()->get('age_enfant');
            for ($i = 0; $i < count($ages[0]); $i++) {
                Enfant::create([
                    'annone_recruteur_id' => $annonce_recruteur->id,
                    'age' => $ages[0][$i]
                ]);
            }
        }

        if ($request->session()->has('lundi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('lundi'), [
                'heure_debut' => $request->session()->get('heure_debut_lundi'),
                'heure_fin' => $request->session()->get('heure_fin_lundi')
            ]);
        }
        if ($request->session()->has('mardi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('mardi'), [
                'heure_debut' => $request->session()->get('heure_debut_mardi'),
                'heure_fin' => $request->session()->get('heure_fin_mardi')
            ]);
        }
        if ($request->session()->has('mercredi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('mercredi'), [
                'heure_debut' => $request->session()->get('heure_debut_mercredi'),
                'heure_fin' => $request->session()->get('heure_fin_mercredi')
            ]);
        }
        if ($request->session()->has('jeudi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('jeudi'), [
                'heure_debut' => $request->session()->get('heure_debut_jeudi'),
                'heure_fin' => $request->session()->get('heure_fin_jeudi')
            ]);
        }
        if ($request->session()->has('vendredi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('vendredi'), [
                'heure_debut' => $request->session()->get('heure_debut_vendredi'),
                'heure_fin' => $request->session()->get('heure_fin_vendredi')
            ]);
        }
        if ($request->session()->has('samedi')) {
            $annonce_recruteur->jours()->attach($request->session()->get('samedi'), [
                'heure_debut' => $request->session()->get('heure_debut_samedi'),
                'heure_fin' => $request->session()->get('heure_fin_samedi')
            ]);
        }
        if ($request->session()->has('dimanche')) {
            $annonce_recruteur->jours()->attach($request->session()->get('dimanche'), [
                'heure_debut' => $request->session()->get('heure_debut_dimanche'),
                'heure_fin' => $request->session()->get('heure_fin_dimanche')
            ]);
        }

        return view('annonce-recruteur.index');
    }

    // Affichage des annoncesdu recruteur
    public function index()
    {
        $myAnnonces = Annone_recruteur::getOnlineAnnonces();
        // $getCandidate = $myAnnonces->with('profils')->get();
        // dd($myAnnonces);

        return view('annonce-recruteur.index', compact('myAnnonces'));
    }

    // lister toutes les offres
    public function list()
    {

        $allAnnonces = Annone_recruteur::with('compte_recruteur')->where('online', 1)->paginate(1);

        return view('annonce-recruteur.list', compact('allAnnonces'));
    }

    // suppression
    public function destroy($annonce)
    {
        $annonce = Annone_recruteur::findOrFail($annonce);
        // dd($annonce);
        $annonce->update(['online' => 0]);

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
        $this->authorize('candidater', Annone_recruteur::class);

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
