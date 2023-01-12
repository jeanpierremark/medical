<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class SecretaireController extends Controller
{
    public function index()
    {
        return view('secretaire.dashboard');
    }

    public function ajouter()
    {
        return view('secretaire.ajouterPatient');
    }
    public function lister()
    {
        $patients = Patient::all();
        return view('secretaire.listerPatient', compact('patients'));
    }
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('secretaire.modifier', compact('patient'));
    }
    public function update(Request $request)
    {
        $patient = Patient::find($request->id);
        $patient->idAn = $request->idAn;
        $patient->prenom = $request->prenom;
        $patient->nom = $request->nom;
        $patient->telephone = $request->telephone;
        $patient->adresse = $request->adresse;
        $patient->profession = $request->profession;
        $patient->age = $request->age;
        $patient->sexe = $request->sexe;
        $patient->niveauEtude = $request->niveauEtude;
        $patient->save();
        return view('secretaire.listerPatient');
    }
    public function ajoutPatient(Request $request)
    {

        $patient = new Patient();
        $patient->idAn = $request->idAn;
        $patient->prenom = $request->prenom;
        $patient->nom = $request->nom;
        $patient->telephone = $request->telephone;
        $patient->adresse = $request->adresse;
        $patient->profession = $request->profession;
        $patient->age = $request->age;
        $patient->sexe = $request->sexe;
        $patient->niveauEtude = $request->niveauEtude;
        $result = $patient->save();
        return view('secretaire.ajouterPatient', ['confirmation' => $result]);
    }
}
