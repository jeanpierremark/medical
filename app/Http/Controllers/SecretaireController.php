<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use App\Models\User;
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
      
     
        return view('secretaire.listerRv',compact('rdvs'));
    }

    public function getrendezVous($id)
    {
        $medecin=User::with('medecin')->whererole('medecin')->get();
      
        return view('secretaire.ajouterRv',compact('id','medecin'));
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
       $medecin=User::with('medecin')->whererole('medecin')->get();
        return  view('secretaire.ajouterRv' , compact('id','var','medecin'));
       }
       else{
        $medd=0;
        $rend=0;
        $send=0;
        $specia='';
        $result=0;
        $mede=array();
        $medecin=User::select('id')->whereemail($request->medecin)->get();
        $sec=Secretaire::select('id')->whereuserId(Auth()->user()->id)->get();
        foreach($sec as $se){ 
            $send = $se->id; 
        }
       
        $rendezvous->date = $request->date;
        $rendezvous->libelle = $request->libelle;
        $rendezvous->patient_id = $request->id;
        foreach($medecin as $med){ 
            $rend = $med->id; }
        if($rend!=0){
            $mede=Medecin::whereuserId($rend)->get();
            foreach($mede as $me){ 
                $medd = $me->id;
                $specia=$me->specialite;
            }
            
            if($specia==$request->domaine ){
                $rendezvous->medecin_id = $medd;
                $result=$rendezvous->save();
            }
            else{
                $id=$request->id;
                $var='Veuillez choisir un medecin du même service';
                $medecin=User::with('medecin')->whererole('medecin')->get();
                 return  view('secretaire.ajouterRv' , compact('id','var','medecin'));
            }
           
        }
        if($result==1 && $send!=0){
            $d=0;
            $pa='';
            $por=Orienter::wherepatientId($request->id)->get();
            foreach($por as $p){
                $d=$p->domaine;
                $pa=$p->patient_id;
            }
            
            if($pa==$request->id && $d==$request->domaine){
                $id=$request->id;
                $var='Patient déjà orienté';
                $medecin=User::with('medecin')->whererole('medecin')->get();
                 return  view('secretaire.ajouterRv' , compact('id','var','medecin'));
            }
            else{
            $oriente->patient_id=$request->id;
            $oriente->domaine= $request->domaine;
            $oriente->secretaire_id= $send;
            $oriente->save();
        }
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
    public function modifierRV($id)
    {
        $rendezvous = RendezVous::find($id);
        $rdvs= RendezVous::with('patient')->whereId($id)->get();
        $patient= Patient::with('rendezvous')->get();
        return view('secretaire.rendezvous',compact('rendezvous','rdvs','patient'));
    }

    public function updateRV(Request $request)
    {
        $rv = RendezVous::find($request->id);
        $rv->libelle = $request->libelle;
        $rv->date = $request->date;
        $rv->save();
        return $this->listerendezVous();
    }
   
    public function supprimerRv($id){
        $rv = RendezVous::find($id);
        if($rv != null){
            $rv->delete();
        }
        return $this->listerendezVous();
    }
}