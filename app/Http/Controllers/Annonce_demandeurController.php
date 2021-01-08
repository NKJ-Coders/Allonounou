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
}
