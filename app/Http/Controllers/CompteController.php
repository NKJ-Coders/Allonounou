<?php

namespace App\Http\Controllers;

use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompteController extends Controller
{
    public function index()
    {
        $comptes = Compte_demandeur::all();

        return view('compte-demandeur.index', compact('comptes'));
    }
}
