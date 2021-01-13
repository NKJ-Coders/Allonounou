<?php

namespace App\Http\Controllers;

use App\Annonce_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poste;

class Annonce_demandeurController extends Controller
{
    public function index()
    {
    }

    public function list()
    {

        $allAnnonces = Annonce_demandeur::with('profil', 'poste')->where('online', 1)->paginate(1);
        $postes = Poste::all();


        return view('annonce-demandeur.list', compact('allAnnonces', 'postes'));
    }

    public function listAnnonceByAdmin()
    {
        $annonces = Annonce_demandeur::with('profil', 'poste')->paginate(10);
        return view('annonce-demandeur.listByAdmin', compact('annonces'));
    }

    public function changeStatus(Request $request, Annonce_demandeur $annonce, $statut)
    {
        if ($statut == 1) {
            $annonce->update(['online' => 1]);
            $request->session()->flash('onlineMSg', 'Annonce publiée avec success!');
            return back();
        }
        if ($statut == 0) {
            $annonce->update(['online' => 0]);
            $request->session()->flash('offlineMsg', 'Annonce dépubliée avec success!');
            return back();
        }
        if ($statut == -1) {
            $annonce->update(['online' => -1]);
            $request->session()->flash('rejetMsg', 'Annonce rejetée avec success!');
            return back();
        }
    }
}
