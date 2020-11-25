<?php

namespace App\Http\Controllers\Auth;

use App\Compte_demandeur;
use App\Compte_recruteur;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/home';

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
        return view('auth.register', compact('type_compte'));
    }

    public function storeRecruteur(Request $request)
    {
        $val = $this->validate($request, [
            'nom' => 'required|string|max:255',
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
        $compte->telephone1 = $data['telephone1'];
        $compte->telephone2 = $data['telephone2'];
        $compte->telephone3 = $data['telephone3'];
        $compte->email = $data['email'];
        $compte->save();

        $user = new User();
        $user->id_compte = $compte->id;
        $user->name = $compte->nom;
        $user->telephone1 = $compte->telephone1;
        $user->type = $data['type_compte'];
        $user->password = Hash::make($data['password']);
        $user->save();

        if (Auth::guard('web')->attempt(['telephone1' => $data['telephone1'], 'password' => $data['password']], true)) {
            return redirect()->intended(route('login'));
        }
    }

    public function storeDemandeur(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'telephone1' => 'required|integer|unique:users',
            'telephone2' => 'integer',
            'telephone3' => 'sometimes',
            'age' => 'required|integer',
            'situation_matrimoniale' => 'string',
            'age_dernier_enfant' => ['integer'],
            'metier' => 'string',
            'age_dernier_metier' => 'integer',
            'niveau_etude' => 'string',
            'langue' => 'string',
            'type_compte' => 'string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data = $request->all();

        $compte = new Compte_demandeur();
        $compte->nom = $data['nom'];
        $compte->telephone1 = $data['telephone1'];
        $compte->telephone2 = $data['telephone2'];
        $compte->telephone3 = $data['telephone3'];
        $compte->age = $data['age'];
        $compte->situation_matrimoniale = $data['situation_matrimoniale'];
        $compte->age_dernier_enfant = $data['age_dernier_enfant'];
        $compte->metier = $data['metier'];
        $compte->age_dernier_metier = $data['age_dernier_metier'];
        $compte->niveau_etude = $data['niveau_etude'];
        $compte->langue = $data['langue'];
        $compte->save();

        $user = new User();
        $user->id_compte = $compte->id;
        $user->name = $compte->nom;
        $user->telephone1 = $compte->telephone1;
        $user->type = $data['type_compte'];
        $user->password = Hash::make($data['password']);
        $user->save();

        if (Auth::guard('web')->attempt(['telephone1' => $data['telephone1'], 'password' => $data['password']], true)) {
            return redirect()->intended(route('login'));
        }
    }
}
