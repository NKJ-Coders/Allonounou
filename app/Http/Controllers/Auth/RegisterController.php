<?php

namespace App\Http\Controllers\Auth;

use App\Compte_demandeur;
use App\Compte_recruteur;
use App\User;
use App\SendCode;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Localisation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify ';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'telephone1' => ['required', 'integer', 'unique:users'],
            'telephone2' => ['integer'],
            'telephone3' => ['sometimes'],
            'age' => ['required', 'integer'],
            'situation_matrimoniale' => ['string'],
            'age_dernier_enfant' => ['integer'],
            'metier' => ['string'],
            'age_dernier_metier' => ['integer'],
            'niveau_etude' => ['string'],
            'langue' => ['string'],
            'type_compte' => ['string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user) ?: redirect('verify?telephone1' . $request->telephone1);
    }

    protected function create(array $data)
    {
        // if ($data['type_compte'] == 'demandeur') {
        //     $compte_demandeur = Compte_demandeur::create([
        //         'nom' => $data['nom'],
        //         'telephone1' => $data['telephone1'],
        //         'telephone2' => $data['telephone2'],
        //         'telephone3' => $data['telephone3'],
        //         'age' => $data['age'],
        //         'situation_matrimoniale' => $data['situation_matrimoniale'],
        //         'age_dernier_enfant' => $data['age_dernier_enfant'],
        //         'metier' => $data['metier'],
        //         'age_dernier_metier' => $data['age_dernier_metier'],
        //         'niveau_etude' => $data['niveau_etude'],
        //         'langue' => $data['langue']
        //     ]);

        //     $id_compte = $compte_demandeur->id;
        // }

        // if ($data['type_compte'] == 'recruteur') {
        //     $compte_recruteur = Compte_recruteur::create([
        //         'nom' => $data['nom'],
        //         'email' => $data['email'],
        //         'telephone1' => $data['telephone1'],
        //         'telephone2' => $data['telephone2'],
        //         'telephone3' => $data['telephone3'],
        //     ]);

        //     $id_compte = $compte_recruteur->id;
        // }

        // return User::create([
        //     'id_compte' => $id_compte,
        //     'name' => $data['nom'],
        //     'type' => $data['type_compte'],
        //     'telephone1' => $data['telephone1'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }

    public function showRegisterForm($type_compte)
    {
        $tab_mois = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Aout',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];

        $metiers = ['Femme de menage', 'Nounou'];

        $localisations = Localisation::where('id_parent', 0)->get();

        return view('auth.register', compact('type_compte', 'tab_mois', 'metiers', 'localisations'));
    }



    public function getVerify(Request $request)
    {
        $compte_di = $request->compte_di;
        // $user = User::where('id_compte',$compte_id)->get();
        // $telephone1 = $user[0]->telephone1;
        return view('verify', compact('compte_di'));
    }
    public function reset(Request $request)
    {
        $compte_di = $request->compte_di;
        // $telephone1 = $request->telephone1;
        $user = User::where('id_compte', $compte_di)->get();
        $telephone1 = $user[0]->telephone1;
        // dd($user[0]->code);
        $user[0]->update([
            'code' => SendCode::sendCode($telephone1),
        ]);
        $cookie_value = $user[0]->code;
        setcookie('cookie_name', $cookie_value, time() + (3600), "/");
        return redirect()->route('verify', ['compte_di' => $compte_di]);
    }
    public function postVerify(Request $request)
    {
        $cod = $_COOKIE['cookie_name'];
        if ($cod == $request->code) {
            $user = User::Where('id_compte', $request->compte_di)->get();
            $user[0]->active = 1;
            $user[0]->code = null;
            $user[0]->save();
            return redirect()->route('login')->withMessage('Your account is active');
        } else {
            return back()->withMessage('Verify code is not correct Please. try again');
        }
    }
    public function storeRecruteur(Request $request)
    {
        $val = $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'telephone1' => 'required|integer|unique:users',
            'telephone2' => 'integer',
            'telephone3' => 'sometimes',
            'type_compte' => 'string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data = $request->all();
        // $verify = User::where('telephone1', $data['telephone1'])->get();

        $compte = new Compte_recruteur();
        $compte->nom = $data['nom'];
        $compte->prenom = $data['prenom'];
        $compte->telephone1 = $data['telephone1'];
        $compte->telephone2 = $data['telephone2'];
        $compte->telephone3 = (!empty($data['telephone3'])) ? $data['telephone3'] : NULL;
        $compte->email = $data['email'];
        $compte->save();

        $user = new User();
        $user->id_compte = $compte->id;
        $user->prenom = $compte->prenom;
        $user->telephone1 = $compte->telephone1;
        $user->active = 0;
        $user->type = $data['type_compte'];
        $user->password = Hash::make($data['password']);
        $user->save();
        if ($user) {
            $user->code = SendCode::sendCode($compte->telephone1);
            $user->save();
            $code = $user->code;
            $cookie_value = $code;
            setcookie('cookie_name', $cookie_value, time() + (3600), "/");
            $compte_di = $compte->id;
            // $user->save();
            return redirect()->route('verify', ['compte_di' => $compte->id]);
        }
        // if (Auth::guard('web')->attempt(['telephone1' => $data['telephone1'], 'password' => $data['password']], true)) {
        //     return redirect()->intended(route('login'));
        // }
    }

    public function storeDemandeur(Request $request)
    {
        // echo json_encode($request->all());

        if (isset($request->nom) && isset($request->prenom) && isset($request->telephone1)) {

            $this->validate($request, [
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string',
                'telephone1' => 'required|integer|unique:users',
                'type_compte' => 'string',
            ]);

            $data = $request->all();

            $compte = new Compte_demandeur();
            $compte->nom = $data['nom'];
            $compte->prenom = $data['prenom'];
            $compte->telephone1 = $data['telephone1'];
            $compte->save();

            $cookie_value = $compte->id;
            setcookie('cookie_id', $cookie_value, time() + (3600), "/");
            $id=$_COOKIE['cookie_id'] +1;

            $user = new User();
            $user->id_compte = $compte->id;
            $user->prenom = $data['prenom'];
            $user->telephone1 = $data['telephone1'];
            $user->type = $data['type_compte'];
            $user->password = Hash::make($data['password']);
            $user->save();

            // $compte_demandeur_id = $_COOKIE['cookie_id'];
            // $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->first();

            // $array = array("nom"=> $compte_demandeur->nom,);
            $ret = array("etat"=>$id);

            echo json_encode($ret["etat"]);

        }
        if (isset($request->telephone2) && isset($request->telephone3) && isset($request->situation_matrimoniale)) {

            $this->validate($request, [
                'telephone2' => 'integer',
                'telephone3' => 'sometimes',
                // 'age' => 'required|integer',
                'situation_matrimoniale' => 'string',
                // 'age_dernier_enfant' => ['integer'],
            ]);

            $data = $request->all();

            $compte_demandeur_id = $_COOKIE['cookie_id'] ;
            $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->get();
            $compte_demandeur[0]->update([
                'telephone2' => $data['telephone2'],
            ]);
            $compte_demandeur[0]->update([
                'telephone3' => (!empty($data['telephone3'])) ? $data['telephone3'] : NULL,
            ]);
            $compte_demandeur[0]->update([
                'date_nais' => $data['jour'] . ' ' . $data['mois'] . ' ' . $data['annee'],
            ]);
            $compte_demandeur[0]->update([
                'situation_matrimoniale' => $data['situation_matrimoniale'],
            ]);
            $compte_demandeur[0]->update([
                'age_dernier_enfant' => $data['jour_enfant'] . ' ' . $data['mois_enfant'] . ' ' . $data['annee_enfant'],
            ]);

            // $compte_demandeur_id = $_COOKIE['cookie_id'];
            // $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->first();

            // $array = array("nom"=> $compte_demandeur->nom,);
            $ret = array("etat"=>$compte_demandeur_id);

            echo json_encode($ret["etat"]);

        }

        if (isset($request->metier) && isset($request->niveau_etude) && isset($request->langue)) {

            $this->validate($request, [
                'metier' => 'required|string',
                // 'date_arret_dernier_metier' => 'date',
                'niveau_etude' => 'string',
                'langue' => 'string',
            ]);

            $data = $request->all();

            $compte_demandeur_id = $_COOKIE['cookie_id'];
            $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->get();

            $compte_demandeur[0]->update([
                'metier' => $data['metier'],
            ]);
            $compte_demandeur[0]->update([
                'date_arret_dernier_metier' => $data['jour_metier'] . ' ' . $data['mois_metier'] . ' ' . $data['annee_metier'],
            ]);
            $compte_demandeur[0]->update([
                'niveau_etude' => $data['niveau_etude'],
            ]);
            $compte_demandeur[0]->update([
                'langue' => $data['langue'],
            ]);

            // $compte_demandeur_id = $_COOKIE['cookie_id'];
            // $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->first();

            // $array = array("nom"=> $compte_demandeur->nom,);

            // echo json_encode($array);
            $ret = array("etat"=>$compte_demandeur_id);

            echo json_encode($ret["etat"]);

        }
        if (isset($request->localisation)) {

            $this->validate($request, [
                'localisation' => 'required|string',
            ]);

            $data = $request->all();


            // find localisation_id
            $localisation = Localisation::where('designation', $data['localisation'])->get();

            $compte_demandeur_id = $_COOKIE['cookie_id'];
            $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->get();

            $compte_demandeur[0]->update([
                'localisation_id' => $localisation[0]->id,
            ]);

            // $compte_demandeur_id = $_COOKIE['cookie_id'];
            // $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->first();

            // $array = array("nom"=> $compte_demandeur->nom,);

            // echo json_encode($array);
            $ret = array("etat"=>$compte_demandeur_id);

            echo json_encode($ret["etat"]);

        }
        if (isset($request->password) && isset($request->mask_pass)) {

            $this->validate($request, [
                'password' => 'required|string|min:8|confirmed',
            ]);

            $data = $request->all();

            $compte_demandeur_id = $_COOKIE['cookie_id'];
            $user = User::where('id_compte', $compte_demandeur_id)->get();
            $compte_demandeur = Compte_demandeur::where('id', $compte_demandeur_id)->first();

            $user[0]->update([
                'password' => Hash::make($data['password']),
            ]);

            $user[0]->update([
                'telephone1' => $compte_demandeur->telephone1,
            ]);

            $user[0]->update([
                'code' => SendCode::sendCode($compte_demandeur->telephone1),
            ]);

            $user = User::where('id_compte', $compte_demandeur_id)->first();

                // $user->code = SendCode::sendCode($compte->telephone1);
                // $user->save();
                $code = $user->code;
                $cookie_value = $code;
                setcookie('cookie_name', $cookie_value, time() + (3600), "/");

                $compte_di = $compte_demandeur->id;
                return redirect()->route('verify', ['compte_di' => $compte_demandeur->id]);


        }

        // $this->validate($request, [
        //     'nom' => 'required|string|max:255',
        //     'prenom' => 'required|string',
        //     'telephone1' => 'required|integer|unique:users',
        //     'telephone2' => 'integer',
        //     'telephone3' => 'sometimes',
        //     // 'age' => 'required|integer',
        //     'situation_matrimoniale' => 'string',
        //     // 'age_dernier_enfant' => ['integer'],
        //     'metier' => 'required|string',
        //     // 'date_arret_dernier_metier' => 'date',
        //     'niveau_etude' => 'string',
        //     'langue' => 'string',
        //     'type_compte' => 'string',
        //     'password' => 'required|string|min:8|confirmed',
        //     'localisation' => 'required|string',
        // ]);

        // $data = $request->all();

        // // find localisation_id
        // $localisation = Localisation::where('designation', $data['localisation'])->get();

        // $compte = new Compte_demandeur();
        // $compte->nom = $data['nom'];
        // $compte->prenom = $data['prenom'];
        // $compte->telephone1 = $data['telephone1'];
        // $compte->telephone2 = $data['telephone2'];
        // $compte->telephone3 = (!empty($data['telephone3'])) ? $data['telephone3'] : NULL;
        // $compte->date_nais = $data['jour'] . ' ' . $data['mois'] . ' ' . $data['annee'];
        // $compte->situation_matrimoniale = $data['situation_matrimoniale'];
        // $compte->age_dernier_enfant = $data['jour_enfant'] . ' ' . $data['mois_enfant'] . ' ' . $data['annee_enfant'];
        // $compte->metier = $data['metier'];
        // $compte->date_arret_dernier_metier = $data['jour_metier'] . ' ' . $data['mois_metier'] . ' ' . $data['annee_metier'];
        // $compte->niveau_etude = $data['niveau_etude'];
        // $compte->langue = $data['langue'];
        // $compte->localisation_id = $localisation[0]->id;
        // $compte->save();

        // $user = new User();
        // $user->id_compte = $compte->id;
        // $user->prenom = $compte->prenom;
        // $user->telephone1 = $compte->telephone1;
        // $user->type = $data['type_compte'];
        // $user->password = Hash::make($data['password']);
        // $user->save();
        // if ($user) {
        //     $user->code = SendCode::sendCode($compte->telephone1);
        //     $user->save();
        //     $code = $user->code;
        //     $cookie_value = $code;
        //     setcookie('cookie_name', $cookie_value, time() + (3600), "/");
        //     $compte_di = $compte->id;
        //     return redirect()->route('verify', ['compte_di' => $compte->id]);
        // }

        // if (Auth::guard('web')->attempt(['telephone1' => $data['telephone1'], 'password' => $data['password']], true)) {
        //     return redirect()->intended(route('login'));
        // }
    }
}
