<?php

namespace App\Http\Controllers;

use App\Annonce_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Annonce_demandeurController extends Controller
{
    public function index()
    {
    }

    public function list()
    {

        $allAnnonces = Annonce_demandeur::with('profil', 'poste')->where('online', 1)->paginate(1);

        return view('annonce-demandeur.list', compact('allAnnonces'));
    }
}
