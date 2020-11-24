<?php

namespace App\Http\Controllers;

use App\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('tache.create');
    }

    public function store()
    {
        $tache = Tache::create($this->validator());

        return back()->with('confirmMsg', 'insérée avec succès');
    }

    private function validator()
    {

        return request()->validate([
            'nom' => 'required'
        ]);
    }
}
