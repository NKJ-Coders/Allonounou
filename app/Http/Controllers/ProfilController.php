<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }

    public function create()
    {
        // $onlinelink = Profil::find(7);
        // $link = 'storage/' . $onlinelink->photo;
        // $size = Storage::size($link);
        return view('profil.create');
    }

    public function store()
    {

        $profil = Profil::create($this->validator());
        // upload files
        $this->storeImage($profil, $profil->id);

        return back()->with('confirmMsg', 'Profil crée avec succès!');
    }

    public function show($profil)
    {
        $profil = Profil::findOrFail($profil);

        return view('profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
    }

    public function update(Profil $profil)
    {
    }

    // function de validation du formulaire
    private function validator()
    {
        return request()->validate([
            'cni' => 'required',
            'photo' => 'required|image|max:5000',
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
        ]);
    }

    // function d'upload d'image
    public function storeImage(Profil $profil, $id)
    {
        if (request('photo')) {
            $profil->update([
                'photo' => request('photo')->storeAs('documents/avatars', 'profil' . $id . '.jpg', 'public')
            ]);
        }
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
}
