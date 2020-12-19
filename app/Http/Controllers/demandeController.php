<?php

namespace App\Http\Controllers;

use App\Annonce_demandeur;
use App\Compte_recruteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class demandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.recruteur');
    }

    public function liker(Request $request)
    {
        $this->authorize('liker', Annonce_demandeur::class);
        if ($request->ajax()) {
            $compte = Compte_recruteur::find(Auth::user()->id_compte);
            $hashAnonnce = $compte->likes()->where('annonce_demandeur_id', $request->annonce_demandeur_id)->exists();

            if ($hashAnonnce) {
                $compte->likes()->detach($request->annonce_demandeur_id);
                $data = ['status' => 'unlike'];

                echo json_encode($data);
            } else {
                $compte->likes()->attach($request->annonce_demandeur_id);
                $data = ['status' => 'like'];

                echo json_encode($data);
            }
        }
    }

    public function signaler(Request $request)
    {
        $this->authorize('signaler', Annonce_demandeur::class);
        $data = $request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]);

        $compte = Compte_recruteur::find(Auth::user()->id_compte);
        // dd($request->contenu);

        $compte->signaler_demandes()->attach($request->annonce_recruteur_id, ['titre' => $request->titre, 'contenu' => $request->contenu]);
        return redirect()->back();
    }

    public function addList(Request $request)
    {
        $this->authorize('addList', Annonce_demandeur::class);
        if ($request->session()->has('id_profil')) {
            $data_profil = $request->session()->get('id_profil');
            if (!in_array($request->id_profil, $data_profil)) {
                $request->session()->push('id_profil', $request->id_profil);
                $data = $request->session()->get('id_profil');
                $profils = [];
                foreach ($data as $key => $value) {
                    $profil = Profil::find($value);
                    $profils['id'] = $profil->id;
                    $profils['nom'] = $profil->compte_demandeur->nom;
                    $profils['photo'] = $profil->photo;
                }
                echo json_encode($profils);
            }
        } else {
            $request->session()->push('id_profil', $request->id_profil);
            $data = $request->session()->get('id_profil');
            $profils = [];
            foreach ($data as $key => $value) {
                $profil = Profil::find($value);
                $profils['id'] = $profil->id;
                $profils['nom'] = $profil->compte_demandeur->nom;
                $profils['photo'] = $profil->photo;
            }
            echo json_encode($profils);
        }
        // echo json_encode($data);
        // Session::
    }

    public function removeToList(Request $request)
    {
        Session::pull('id_profil', $request->id_profil);
    }

    public function insert()
    {
        $data = [];
        $data = Session::get('id_profil');
        $recruteur = Compte_recruteur::where('id', Auth::user()->id_compte)->first();

        $recruteur->validate_candidates()->sync($data);

        Session::forget('id_profil');
    }
}
