<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localisation;

class LocalisationController extends Controller
{
    public function getLocalisation(Request $request)
    {
        $test = Localisation::find($request->id);
        if ($test->type == 'Pays') {
            $data = Localisation::where('id_parent', $request->id)->get();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                $data = ['id' => NULL, 'id_parent' => NULL, 'designation' => ''];
                echo json_encode($data);
            }
        }

        if ($test->type == 'Region') {
            $data = Localisation::where('id_parent', $request->id)->get();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                $data = ['id' => NULL, 'id_parent' => NULL, 'designation' => ''];
                echo json_encode($data);
            }
        }

        if ($test->type == 'Ville') {
            $data = Localisation::where('id_parent', $request->id)->get();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                $data = ['id' => NULL, 'id_parent' => NULL, 'designation' => ''];
                echo json_encode($data);
            }
        }

        if ($test->type == 'Arrondissement') {
            $data = Localisation::where('id_parent', $request->id)->get();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                $data = ['id' => NULL, 'id_parent' => NULL, 'designation' => ''];
                echo json_encode($data);
            }
        }

        if ($test->type == 'Quartier') {
            $data = Localisation::where('id_parent', $request->id)->get();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                $data = ['id' => NULL, 'id_parent' => NULL, 'designation' => ''];
                echo json_encode($data);
            }
        }
    }
}
