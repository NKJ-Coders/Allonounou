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
        session_start();
        $test = 'true';
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

        return view('auth.register', compact('test', 'type_compte', 'tab_mois', 'metiers', 'localisations'));
    }


    public function getvalidation(Request $request)
    {
        session_start();
        return view('compte-demandeur.validation');
    }
    public function resendcode(Request $request)
    {
        session_start();
        $cookie_value = SendCode::sendCode($_SESSION['telephone1']);
        $_SESSION['code'] = SendCode::sendCode($_SESSION['telephone1']);
        setcookie('cookie_name', $cookie_value, time() + (3600), "/");
        // return redirect()->route('verify', ['compte_di' => $compte_di]);
        return redirect()->route('verify');
    }

    public function getVerify(Request $request)
    {
        // $compte_di = $request->compte_di;
        // $user = User::where('id_compte',$compte_id)->get();
        // $telephone1 = $user[0]->telephone1;
        session_start();
        $compte_di = $_SESSION['code'];
        return view('verify', compact('compte_di'));
    }
    public function postVerify(Request $request)
    {
        session_start();
        if ($_SESSION['code'] == $request->code) {
            // $user = User::Where('id_compte', $request->compte_di)->get();
            // $user[0]->active = 1;
            // $user[0]->code = null;
            // $user[0]->save();
            // return redirect()->route('login')->withMessage('Your account is active');
            $check = "1";
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
            $type_compte = "demandeur";
            return view('auth.register', compact('check', 'type_compte', 'tab_mois', 'metiers', 'localisations'));
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
                'telephone1' => 'required|unique:users',
                'type_compte' => 'string',
            ]);

            $data = $request->all();

            session_start();

            //On définit des variables de session
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['telephone1'] = $data['telephone1'];
            $ret = array("etat" => $_SESSION['prenom']);

            $_SESSION['code'] = SendCode::sendCode($_SESSION['telephone1']);
            $cookie_value = SendCode::sendCode($_SESSION['telephone1']);
            setcookie('cookie_name', $cookie_value, time() + (3600), "/");
            return redirect()->route('verify');


            echo json_encode($ret["etat"]);
        }
        if (isset($request->telephone2) && isset($request->telephone3) && isset($request->situation_matrimoniale)) {

            $this->validate($request, [
                'telephone2' => 'integer',
                'telephone3' => 'sometimes',
                // 'age' => 'required|integer',
                'situation_matrimoniale' => 'string',
                // 'age_dernier_enfant' => ['integer'],
                'type_compte' => 'string',
            ]);

            $data = $request->all();

            session_start();
            $_SESSION['telephone2'] = $data['telephone2'];
            $_SESSION['telephone3'] = $data['telephone3'];
            $_SESSION['jour'] = $data['jour'];
            $_SESSION['mois'] = $data['mois'];
            $_SESSION['annee'] = $data['annee'];
            $_SESSION['date_nais'] = $_SESSION['jour'] . ' ' . $_SESSION['mois'] . ' ' . $_SESSION['annee'];
            $_SESSION['situation_matrimoniale'] = $data['situation_matrimoniale'];
            $_SESSION['age_dernier_enfant'] = $data['age_dernier_enfant'];
            $_SESSION['type_compte'] = $data['type_compte'];

            $ret = array("etat" => $_SESSION['date_nais']);

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

            session_start();
            $_SESSION['metier'] = $data['metier'];
            $_SESSION['jour_metier'] = $data['jour_metier'];
            $_SESSION['mois_metier'] = $data['mois_metier'];
            $_SESSION['annee_metier'] = $data['annee_metier'];
            $_SESSION['date_arret_dernier_metier'] = $_SESSION['jour_metier'] . ' ' . $_SESSION['mois_metier'] . ' ' . $_SESSION['annee_metier'];
            $_SESSION['niveau_etude'] = $data['niveau_etude'];
            $_SESSION['langue'] = $data['langue'];

            $ret = array("etat" => $_SESSION['langue']);

            echo json_encode($ret["etat"]);
        }
        if (isset($request->localisation)) {

            $this->validate($request, [
                'localisation' => 'required|string',
            ]);

            $data = $request->all();


            // find localisation_id
            session_start();
            $localisation = Localisation::where('designation', $data['localisation'])->get();
            $_SESSION['localisation_id'] = $localisation[0]->id;
            $_SESSION['zone'] = $data['localisation'];
            $id_parent1 = $localisation[0]->id_parent;
            $localisation = Localisation::where('id', $id_parent1)->first();
            $_SESSION['quartier'] = $localisation->designation;
            $id_parent2 = $localisation->id_parent;
            $localisation = Localisation::where('id', $id_parent2)->first();
            $_SESSION['arrondissement'] = $localisation->designation;
            $id_parent3 = $localisation->id_parent;
            $localisation = Localisation::where('id', $id_parent3)->first();
            $_SESSION['ville'] = $localisation->designation;
            $id_parent4 = $localisation->id_parent;
            $localisation = Localisation::where('id', $id_parent4)->first();
            $_SESSION['region'] = $localisation->designation;
            $id_parent5 = $localisation->id_parent;
            $localisation = Localisation::where('id', $id_parent5)->first();
            $_SESSION['pays'] = $localisation->designation;

            $ret = array("etat" => $_SESSION['localisation_id']);

            echo json_encode($ret["etat"]);
        }
        if (isset($request->password) && isset($request->mask_pass)) {

            $this->validate($request, [
                'password' => 'required|string|min:8|confirmed',
            ]);

            $data = $request->all();

            session_start();
            $_SESSION['password'] = Hash::make($data['password']);

            return redirect()->route('registration.validation');
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
        if (isset($request->insert)) {
            session_start();

            // calcul de l'age en fonction de l'annee en cours
            $date = now();
            $currentDateTime = explode(' ', $date);
            $currentDate = explode('-', $currentDateTime[0]);
            $currentDate = (int) $currentDate[0];

            $anneeNais = explode(' ', $_SESSION['date_nais']);
            $anneeNais = (int) $anneeNais[2];
            $age = $currentDate - $anneeNais;

            $compte = new Compte_demandeur();
            $compte->nom = $_SESSION['nom'];
            $compte->prenom = $_SESSION['prenom'];
            $compte->telephone1 = $_SESSION['telephone1'];
            $compte->telephone2 = $_SESSION['telephone2'];
            $compte->telephone3 = $_SESSION['telephone3'];
            $compte->date_nais = $_SESSION['date_nais'];
            $compte->age = $age;
            $compte->situation_matrimoniale = $_SESSION['situation_matrimoniale'];
            $compte->age_dernier_enfant = $_SESSION['age_dernier_enfant'];
            $compte->metier = $_SESSION['metier'];
            $compte->date_arret_dernier_metier = $_SESSION['date_arret_dernier_metier'];
            $compte->niveau_etude = $_SESSION['niveau_etude'];
            $compte->langue = $_SESSION['langue'];
            $compte->localisation_id = $_SESSION['localisation_id'];
            $compte->save();

            $user = new User();
            $user->id_compte = $compte->id;
            $user->prenom = $compte->prenom;
            $user->telephone1 = $compte->telephone1;
            $user->type = $_SESSION['type_compte'];
            $user->password = $_SESSION['password'];
            $user->save();

            return redirect()->intended(route('login'));
        }
    }
}
