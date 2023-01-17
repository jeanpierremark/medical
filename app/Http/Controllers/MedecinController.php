<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index(){
        return view('medecin.dashboard');
    }

    public function lister()
    {
        $patients = Patient::all();
        return view('medecin.listerPatient', compact('patients'));
    }
    public function getrendezVous()
    {
        return view('medecin.ajouterRv');
    }
    
    public function agenda()
    {
        return view('medecin.agenda');
    }
}
    
