<?php

namespace App\Http\Controllers;

use App\Compte_demandeur;
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
            $compte = Compte_demandeur::find(Auth::user()->id_compte);
            $hashAnonnce = $compte->annone_recruteurs()->where('annone_recruteur_id', $request->annonce_recruteur_id)->exists();

            if ($hashAnonnce) {
                $compte->annone_recruteurs()->detach($request->annonce_recruteur_id);
                $data = ['status' => 'unlike'];

                echo json_encode($data);
            } else {
                $compte->annone_recruteurs()->attach($request->annonce_recruteur_id);
                $data = ['status' => 'like'];

                echo json_encode($data);
            }
        }
    }
}
