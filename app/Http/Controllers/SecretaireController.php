<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use App\Models\Secretaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $rdvs= RendezVous::with('patient')->wherestatut('non_effectif')->get();
        $patients= Orienter::with('patient')->get();
     
        return view('secretaire.listerRv',compact('rdvs','patients'));
    }

    public function getrendezVous($id)
    {
        $medecin=User::with('medecin')->whererole('medecin')->get();
        $mede=Medecin::with('user')->get();
        return view('secretaire.ajouterRv',compact('id','medecin','mede'));
    }

    public function getagenda()
    {
        return view('secretaire.calendrier');
    }

    public function ajouteRV(Request $request){
        $medd=0;
        $rend=0;
        $send=0;
        $specia='';
        $result=0;
        $mede=array();
        $oriente= new Orienter();
        $rendezvous = new RendezVous();

        $d=0;
        $pa=0;
        $por=Orienter::wherepatientId($request->id)->wheredomaine($request->domaine)->get();
        foreach($por as $p){
            $d=$p->domaine;
            $pa=$p->patient_id;
        }
        
        


       if(is_null($request->date) || is_null($request->medecin) || is_null($request->domaine) || is_null($request->libelle)){
       $id=$request->id;
       $var='Veuillez remplir tous les champs';
       $medecin=User::with('medecin')->whererole('medecin')->get();
       $mede=Medecin::with('user')->get();
        return  view('secretaire.ajouterRv' , compact('id','var','medecin','mede'));
       }

    else{ 
        if($d == $request->domaine && $pa==$request->id){
            $id=$request->id;
            $var='Le patient a déjà été orienté à ce service ';
            $medecin=User::with('medecin')->whererole('medecin')->get();
            $mede=Medecin::with('user')->get();
            return  view('secretaire.ajouterRv' , compact('id','var','medecin','mede'));
        }
       else{
       
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
              
          
                if(substr( $request->date,0,4)<date('Y') || substr(substr( $request->date,0,7),5,7)<date('m')|| substr(substr( $request->date,0,7),5,7)>12 || substr(substr( $request->date,0,10),8,9)>31 || substr(substr( $request->date,0,10),8,9)<date('d')){
                $id=$request->id;
                $var='La date  est incorrete';
                $medecin=User::with('medecin')->whererole('medecin')->get();
                $mede=Medecin::with('user')->get();
                 return  view('secretaire.ajouterRv' , compact('id','var','medecin','mede'));
            }
        
            else if($specia != $request->domaine ){
                $id=$request->id;
                $var='Veuillez choisir un medecin du même service';
                $medecin=User::with('medecin')->whererole('medecin')->get();
                $mede=Medecin::with('user')->get();
                 return  view('secretaire.ajouterRv' , compact('id','var','medecin','mede'));
                
                } 
            else {
                $rendezvous->medecin_id = $medd;
                $result=$rendezvous->save();
                $oriente->patient_id=$request->id;
                $oriente->domaine= $request->domaine;
                $oriente->secretaire_id= $send;
               
                $a=$oriente->save();
               
            }
        }
        
            return $this->listerendezVous();
        }
    }  

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
        $patient->nom =strtoupper($request->nom);
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
        if(is_null($request->nom)||is_null($request->prenom)||is_null($request->adresse)||is_null($request->telephone)||is_null($request->profession)||is_null($request->age)||is_null($request->sexe)||is_null($request->niveauEtude)){
       
            return view('secretaire.ajouterPatient',['var'=>'Veuillez remplir tous les champs!']);
        }
       
        else if( (strlen( $request->telephone) > 9 )||  (strlen( $request->telephone) == 8) || (strlen( $request->telephone) < 7) ){
            return view('secretaire.ajouterPatient',['var'=>'Numero de téléphone incorrete!']);
        }
        else if(  $request->age >100 || $request->age < 0){
            return view('secretaire.ajouterPatient',['var'=>'Age incorrecte !']);
        }

        else{
        $patient->idAn =date('y');
        $patient->prenom = $request->prenom;
        $patient->nom = strtoupper($request->nom);
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
            $patient->delete();
     
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
        if(!is_null($request->libelle) && !is_null( $request->date) && substr(substr( $request->date,0,7),5,7)>=date('m') && substr(substr( $request->date,0,10),8,9)<=31 && substr(substr( $request->date,0,10),8,9)>date('d')){
            $rv = RendezVous::find($request->id);
            $rv->libelle = $request->libelle;
            $rv->date = $request->date;
            $rv->save();
            return $this->listerendezVous();
        }
        else{
            $rendezvous = RendezVous::find($request->id);
            $rdvs= RendezVous::with('patient')->whereId($request->id)->get();
            $patient= Patient::with('rendezvous')->get();
            $var='Informations non conformes';
            return view('secretaire.rendezvous',compact('rendezvous','rdvs','patient','var'));
        }
        
    }
   
    public function supprimerRv($id){
        $rv = RendezVous::find($id);
        if($rv != null){
            $rv->delete();
        }
        return $this->listerendezVous();
    }

    public function modifmot(Request $request){
        $b=0;
        $mot='';
        $anc=User::select('password')->whereid(Auth()->user()->id)->get();
        foreach($anc as $a){
            $b=$a->password;
        }
        
       
       if( is_null($request->apass)|| is_null($request->npass) || is_null($request->cpass)){
        $var='Veuillez remplir les champs';
       return view('secretaire.dashboard',compact('var'));
    }
    else {
        //$mot= Hash::make($request->apass);

        if((Hash::check($request->cpass,$b))){
            $var='Ancien mot de passe incorrecte';
            return view('secretaire.dashboard',compact('var'));
        }
        else{
            if($request->npass==$request->cpass){
                $uti=User::find(Auth()->user()->id);
                $uti->password=Hash::make($request->npass);
                $uti->save();
                return redirect('/');
            }
            else{
                $var='Confirmation de mot de passe incorrecte';
            return view('secretaire.dashboard',compact('var'));
            }
        }
    }
    }
}