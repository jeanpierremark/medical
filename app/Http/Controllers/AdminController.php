<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function ajoutSec()
    {
        return view('admin.secretaire.ajouterSecretaire');
    }
    public function editUser($id)
    {
        $utilisateur = User::find($id);
        return view('admin.medecin.modifierMedecin',compact('utilisateur'));
    }
    public function modifierUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->email = $request->email;
        $user->specialite = $request->specialite;
        $user->role = $request->role;
        $user->save();
        return $this->listerMed();
    }
    public function accueil()
    {
        return view('admin.accueil');
    }
    public function statistique()
    {
        return view('admin.statistiques');
    }
    public function ajouter()
    {
        return view('admin.medecin.ajouterMedecin');
    }
    public function listerMed()
    {
        $users = User::all();
        return view('admin.medecin.listerMedecin',compact('users'));
    }
    public function supprimer($id){
        $user = User::find($id);
        if($user != null){
            $user->delete();
        }
        return $this->listerMed();
    }
    public function ajoutMedecin(Request $request)
    {
        /*
        $medecin = new Medecin();
        $medecin->prenom = $request->prenom;
        $medecin->nom = $request->nom;
        $medecin->telephone = $request->telephone;
        $medecin->adresse = $request->adresse;
        $medecin->specialite = $request->specialite;
        //$medecin->idUser = DB::table('users')->orderBy('id', 'desc')->value('id');
        //$id = User::find(DB::table('users')->max('id'));
        //return $id;
        //$sql="select MAX(id) from users where role='medecin'";
        $id = DB::table('users')->where('role','medecin')->max('id');
        //return  dump($id);
        $medecin->idUser = $id;
        if($medecin->idUser != (DB::table('medecins')->max('idUser'))){
            $medecin->save();
        }

        return view('admin.medecin.ajouterMedecin');
        */

        $user = new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        $role = $user->role;
        if($role=='medecin'){
            $medecin = new Medecin();
            $medecin->user_id = DB::table('users')->max('id');
            $medecin->specialite = $request->specialite;
            $medecin->save();
        }
        else if($role=='secretaire'){
            $secretaire = new Secretaire();
            $secretaire->user_id =DB::table('users')->max('id');
            $secretaire->save();
        }
        $users = User::all();
        return view('admin.medecin.listerMedecin',compact('users'));

        /*
    $user = User::create([
        'name' => $data['name'],
        'prenom' => $data['prenom'],
        'nom' => $data['nom'],
        'telephone' => $data['telephone'],
        'adresse' => $data['adresse'],
        'email' => $data['email'],
        'specialite' => $data['specialite'],
        'role' => $data['role'],
        'password' => Hash::make($data['password']),
    ]);
        $role = $user->role;
       if ($role=='medecin') {
            Medecin::create([
                'idUser' => $user->id,
                'specialite' => $data['specialite'],
            ]);
        }

       else if ($role == 'secretaire') {
            Secretaire::create([
                'idUser' => $user->id,
            ]);
        }
        return $user;
        */
        //$id = DB::table('users')->select('id')->get();
        //return $id;

    }
}
