<?php

namespace App\Http\Controllers;

use App\Compte_demandeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class ImageCropController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $profil = Profil::where('compte_demandeur_id', $request->id)->first();
            $compte = Compte_demandeur::find($request->id);

            // verifie si profil existe deja
            if (empty($profil)) {
                $photo = $request->photo;
                $photo_array_1 = explode(';', $photo);
                $photo_array_2 = explode(',', $photo_array_1[1]);
                $data = base64_decode($photo_array_2[1]);
                $photo_name = time() . '.jpg';
                $data_photo = explode(".", $photo_name);
                $data_photo = str_replace($data_photo[0], $compte->nom, $data_photo[0]);
                $photo_name = $data_photo . ".jpg";
                $upload_path = public_path('crop_image/' . $photo_name);
                file_put_contents($upload_path, $data);

                // insert
                $profil = new Profil;
                $profil->compte_demandeur_id = $request->id;
                $profil->photo = 'crop_image/' . $photo_name;
                $profil->save();

                $compte->update(['statut' => 1]);

                // return response()->json(['path' => 'crop_image/' . $photo_name]);
                $photo_url = '/' . $profil->photo;
                return response()->json(['path' => $photo_url, 'confirmMsg' => 'Image insérée avec success!']);
            } else { //sinon on update
                $photo = $request->photo;
                $photo_array_1 = explode(';', $photo);
                $photo_array_2 = explode(',', $photo_array_1[1]);
                $data = base64_decode($photo_array_2[1]);
                $photo_name = time() . '.jpg';
                $data_photo = explode(".", $photo_name);
                $replace_name = $compte->nom . '_' . $compte->id;
                $data_photo = str_replace($data_photo[0], $replace_name, $data_photo[0]);
                $photo_name = $data_photo . ".jpg";

                // si fichier existe deja dans le dossier on suppr
                $file = 'crop_image/' . $photo_name;
                if (file_exists($file)) {
                    if (is_file($file)) { // verifie s'il s'agit d'un fichier
                        unlink($file);
                    }
                }
                $upload_path = public_path('crop_image/' . $photo_name);
                file_put_contents($upload_path, $data);
                $nom_photo = 'crop_image/' . $photo_name;
                // update
                $profil->compte_demandeur_id = $request->id;
                $profil->photo = $nom_photo;
                $profil->save();

                $compte->update(['statut' => 1]);

                // return response()->json(['path' => 'crop_image/' . $photo_name]);
                $photo_url = '/' . $profil->photo;
                return response()->json(['path' => $photo_url, 'confirmMsg' => 'Image mise à jour avec success!']);
            }
        }
    }
}
