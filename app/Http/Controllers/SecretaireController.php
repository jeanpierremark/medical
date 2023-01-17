<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecretaireController extends Controller
{
    public function index()
    {
        return view('secretaire.dashboard');
    }

    public function agenda()
    {
        
        return view('secretaire.agenda');
    }

    public function listerendezVous()
    {
      $rdvs= RendezVous::with('patient')->get();
      $patients= Patient::with('rendezvous')->get();
     
        return view('secretaire.listerRv',compact('rdvs','patients'));
    }

    public function getrendezVous($id)
    {
        return view('secretaire.ajouterRv',['id'=>$id]);
    }

    public function getagenda()
    {
        return view('secretaire.calendrier');
    }

    public function ajouteRV(Request $request){
        $oriente= new Orienter();
        $rendezvous = new RendezVous();
       if(is_null($request->date) || is_null($request->medecin) || is_null($request->domaine) || is_null($request->libelle)){
       $id=$request->id;
       $var='Veuillez remplir tous les champs';
        return  view('secretaire.ajouterRv' , compact('id','var'));
       }
       else{
        $rend=0;
        $send=0;
        $result=0;
        $medecin= Medecin::select('id')->wherePrenom($request->medecin)->get();
        $sec=Secretaire::select('id')->whereidUser(Auth()->user()->id)->get();
        $rendezvous->date = $request->date;
        $rendezvous->libelle = $request->libelle;
        $rendezvous->patient_id = $request->id;
        foreach($medecin as $med){ 
            $rend = $med->id; }
        foreach($sec as $se){ 
                $send = $se->id; }
   
    $rendezvous->medecin_id = $rend;
        if($rend!=0){
            $result=$rendezvous->save();
        }
        if($result==1 &&  $send!=0){
            $oriente->patient_id=$request->id;
            $oriente->domaine= $request->domaine;
            $oriente->secretaire_id= $send;

            $oriente->save();
        }
    }
        return $this->listerendezVous();

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
        $patient->prenom = $request->prenom;
        $patient->nom = $request->nom;
        $patient->telephone = $request->telephone;
        $patient->adresse = $request->adresse;
        $patient->profession = $request->profession;
        $patient->age = $request->age;
        $patient->niveauEtude = $request->niveauEtude;
        $patient->save();
        return $this->lister();
    }
    public function ajoutPatient(Request $request)
    {
        $patient = new Patient();
        if(is_null($request->nom)||is_null($request->prenom)||is_null($request->adresse)||is_null($request->telephone)||is_null($request->profession)||is_null($request->age)||is_null($request->idAn)||is_null($request->sexe)||is_null($request->niveauEtude)){
       
            return view('secretaire.ajouterPatient',['var'=>'Veuillez remplir tous les champs!']);
        }
        else if(  $request->idAn < date('y') || $request->idAn > date('y')){
            return view('secretaire.ajouterPatient',['var'=>'Indice autorisé '.date('y')]);
        }
        else if( (strlen( $request->telephone) > 9 )||  (strlen( $request->telephone) == 8) || (strlen( $request->telephone) < 7) ){
            return view('secretaire.ajouterPatient',['var'=>'Numero de téléphone incorrete!']);
        }
        else if(  $request->age >100 || $request->age < 0){
            return view('secretaire.ajouterPatient',['var'=>'Age incorrecte !']);
        }

        else{
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

    public function supprimer($id){
        $patient = Patient::find($id);
        if($patient != null){
            $patient->delete();
        }
        return $this->lister();
    }

   
}
