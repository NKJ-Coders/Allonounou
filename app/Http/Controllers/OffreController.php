<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function signaler(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]);

        $user = User::find(Auth::id());

        // dd($request->contenu);

        $user->annone_recruteurs()->attach($request->annone_recruteur_id, ['titre' => $request->titre, 'contenu' => $request->contenu]);
        return redirect()->back();
    }

    public function liker(Request $request)
    {
        if ($request->ajax()) {
        }
    }
}
