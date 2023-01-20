<?php

namespace App\Http\Controllers;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use App\Models\Consultation;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index(){
        return view('medecin.dashboard');
    }

    public function lister()
    {   
      
        $rend=0;
        $specia=Medecin::select('specialite')->whereidUser(Auth()->user()->id)->get();
        foreach($specia as $sp){ 
            $rend = $sp->specialite;
           
        }
        
            $oriente =Orienter::with('patient')->whereDomaine($rend)->get();
        
        return view('medecin.listerPatient', compact('oriente'));
    }
    public function getrendezVous($id)
    {
        return view('medecin.ajouterRv',['id'=>$id]);
    }

    public function getconsultation($id)
    {
        return view('medecin.ajouterConsultation',compact('id'));
    }
    public function ajouteRV(Request $request)
    {
        $idmed=0;
        $med = Medecin::select('id')->whereidUser(Auth()->user()->id)->get();
        foreach($med as $m){
            $idmed=$m->id;
        }
        $rendezvous = new RendezVous();
       if(is_null($request->date) ||  is_null($request->libelle)){
       $id=$request->id;
       $var='Veuillez remplir tous les champs';
        return  view('medecin.ajouterRv' , compact('id','var'));
       }
       else{
        $rendezvous->date=$request->date;
        $rendezvous->libelle=$request->libelle;
        $rendezvous->patient_id=$request->id;
       }
       if($idmed != 0){
        $rendezvous->medecin_id=$idmed;
       }
       $rendezvous->save();
       return $this->listeRendezVous();
    }
    public function listeRendezVous(){
       
        $rdvs= RendezVous::with('patient')->get();
        $patients= Patient::with('rendezvous')->get();
     
        return view('medecin.listeRendezVous',compact('rdvs','patients'));
    }
    
    public function agenda()
    {
        return view('medecin.agenda');
    }

    public function listeConsultation(){
        $idmed=0;
        $med= Medecin::select('id')->whereidUser(Auth()->user()->id)->get();
        foreach($med as $m){
            $idmed=$m->id;
        }
        $consult = Consultation::with('patient')->wheremedecinId($idmed)->get();
        return view('medecin.listeConsult',compact('consult'));
    }

    public function ajouterCons(Request $request){
        $idmed=0;
        $med= Medecin::select('id')->whereidUser(Auth()->user()->id)->get();
        foreach($med as $m){
            $idmed=$m->id;
        }
        $consult= new Consultation();
        if(is_null($request->motifConsultation) || is_null($request->alergie)  || is_null($request->histoireMaladie) || is_null($request->maladie) || is_null($request->modeDevie) || is_null($request->handicap) || is_null($request->decision) || is_null($request->operation) || is_null($request->dateConsultation)){
            $id=$request->id;
            $var='Veuillez remplir tous les champs';
             return  view('medecin.ajouterConsultation' , compact('id','var'));
            }
            else if($idmed !=0){
                    $consult->motifConsultation=$request->motifConsultation;
                    $consult->histoireMaladie=$request->histoireMaladie;
                    $consult->maladie=$request->maladie;
                    $consult->modeDevie=$request->modeDevie;
                    $consult->handicap=$request->handicap;
                    $consult->decision=$request->decision;
                    $consult->operation=$request->operation;
                    $consult->dateConsultation=$request->dateConsultation;
                    $consult->patient_id=$request->id;
                    $consult->medecin_id=$idmed;
                    $consult->alergie=$request->alergie;
                    $consult->save();
              
               

            }
            
            return $this->listeConsultation();

    }

}