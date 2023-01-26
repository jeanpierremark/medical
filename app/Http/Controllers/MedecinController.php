<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedecinController extends Controller
{
    public function index(){
        return view('medecin.dashboard');
    }

    public function lister()
    {   
      
        $rend=0;
        $specia=Medecin::select('specialite')->whereuserId(Auth()->user()->id)->get();
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
        $med = Medecin::select('id')->whereuserId(Auth()->user()->id)->get();
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
        $spe='';
        $med= Medecin::select('specialite')->whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $spe=$m->specialite;
        }
       
        $rdvs= RendezVous::with('patient')->wherestatut('non_effectif')->get();
        $patients= Orienter::with('patient')->wheredomaine($spe)->get();
     
        return view('medecin.listeRendezVous',compact('rdvs','patients'));
    }
    
    public function agenda()
    {
        return view('medecin.agenda');
    }

    public function listeConsultation(){
        $idmed=0;
        $med= Medecin::select('id')->whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $idmed=$m->id;
        }
        $consult = Consultation::with('patient')->wheremedecinId($idmed)->get();
        return view('medecin.listeConsult',compact('consult'));
    }

    public function ajouterCons(Request $request){
        $idmed=0;
        $med= Medecin::select('id')->whereuserId(Auth()->user()->id)->get();
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

    public function changerstatut(Request $request){
        $rv=RendezVous::find($request->id);
        $rv->statut=$request->statut;
        $rv->save();
        return $this->listeRendezVous();
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
       return view('medecin.dashboard',compact('var'));
    }
    else {
        //$mot= Hash::make($request->apass);

        if((Hash::check($request->cpass,$b))){
            $var='Ancien mot de passe incorrecte';
            return view('medecin.dashboard',compact('var'));
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
            return view('medecin.dashboard',compact('var'));
            }
        }
    }
    }

    public function modifierRV($id)
    {
        $rendezvous = RendezVous::find($id);
        $rdvs= RendezVous::with('patient')->whereId($id)->get();
        $patient= Patient::with('rendezvous')->get();
        return view('medecin.modifRv',compact('rendezvous','rdvs','patient'));
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
            return view('medecin.modifRv',compact('rendezvous','rdvs','patient','var'));
        }
    }
    public function supprimerRv($id){
        $rv = RendezVous::find($id);
        if($rv != null){
            $rv->delete();
        }
        return $this->listerendezVous();
    }
}