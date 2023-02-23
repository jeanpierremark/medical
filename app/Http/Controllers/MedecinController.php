<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\Evolution;
use App\Models\Medicament;
use App\Models\Ordonnance;
use App\Models\RendezVous;
use App\Models\Traitement;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Hospitalisation;
use Illuminate\Support\Facades\DB;
use App\Models\ExamenComplementaire;
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
        $rdv= DB::table('rendez_vouses')->wherepatientId($request->id)->max('id');
        $rdvs=RendezVous::find($rdv);
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
       else {
       
            if(substr( $request->date,0,4)<date('Y') || substr(substr( $request->date,0,7),5,7)<date('m')|| substr(substr( $request->date,0,7),5,7)>12 || substr(substr( $request->date,0,10),8,9)>31 || substr(substr( $request->date,0,10),8,9)<date('d')){
                $id=$request->id;
                $var='La date  est incorrete';
                return  view('medecin.ajouterRv' , compact('id','var'));
            }
            else{
                $rendezvous->date=$request->date;
                $rendezvous->libelle=$request->libelle;
                $rendezvous->patient_id=$request->id;
                $rendezvous->medecin_id=$idmed;
                $rendezvous->save();
                if( $rendezvous->save()==1){
                    $rdvs->statut="effectif";
                    $rdvs->save();
                }
            }
    
       
            return $this->listeRendezVous();
        }
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
        $mt='';
        $medspe='';
        $motif=Consultation::select('motifConsultation')->wherepatientId($request->id)->get();
        $med= Medecin::whereuserId(Auth()->user()->id)->get();
        $rdv= DB::table('rendez_vouses')->wherepatientId($request->id)->max('id');
        $rdvs=RendezVous::find($rdv);
        foreach($med as $m){
            $idmed=$m->id;
            $medspe=$m->specialite;
        }
        foreach($motif as $mo){
            $mt=$mo->motifConsultation;
        }
        
        $consult= new Consultation();
        if(is_null($request->motifConsultation) || is_null($request->modeAdmission)  || is_null($request->alergie)  || is_null($request->histoireMaladie) || is_null($request->maladie) || is_null($request->modeDevie) || is_null($request->handicap) || is_null($request->decision) || is_null($request->operation) || is_null($request->dateConsultation)){
            $id=$request->id;
            $var='Veuillez remplir tous les champs';
             return  view('medecin.ajouterConsultation' , compact('id','var'));
            }
            else if($idmed !=0 && $mt!=$request->motifConsultation){
                    $consult->motifConsultation=$request->motifConsultation;
                    $consult->histoireMaladie=$request->histoireMaladie;
                    $consult->maladie=$request->maladie;
                    $consult->modeDevie=$request->modeDevie;
                    $consult->handicap=$request->handicap;
                    $consult->decision=$request->decision;
                    $consult->operation=$request->operation;
                    $consult->dateConsultation=$request->dateConsultation;
                    $consult->modeAdmission=$request->modeAdmission;
                    $consult->patient_id=$request->id;
                    $consult->medecin_id=$idmed;
                    $consult->alergie=$request->alergie;
                    $ress=$consult->save();
                if($ress==1){
                    $rdvs->statut="effectif";
                    $rdvs->save();
                }
                if(strtolower($request->decision)=='hospitalisation'){
                    $hospi= new Hospitalisation();
                    $hospi->dateEntree=$request->dateConsultation;
                    $hospi->patient_id=$request->id;
                    $hospi->medecin_id=$idmed;
                    $hospi->service=$medspe;
                    $hospi->save();
                }
                return $this->listeConsultation();

            }
            else if($mt==$request->motifConsultation){
                $id=$request->id;
                $var='Ce motif de consultation est déjà enregisté pour ce patient veuillez consulter son dossier!';
                return  view('medecin.ajouterConsultation' , compact('id','var'));

            }
            else{
                $id=$request->id;
                $var='Veuillez remplir tous les champs';
                return  view('medecin.ajouterConsultation' , compact('id','var'));

            }
            
            

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
    public function deleteCons($id){
        $cons=Consultation::find($id);
        if($cons!=null){
            $cons->delete();
            return $this->listeConsultation();
        }
    }
    public function detailCons($id){
        $p=0;
        $te=time();
        $d=date('d/m/Y', $te);
        $cons=Consultation::with('patient')->whereId($id)->get();
        $exam=ExamenComplementaire::whereconsultationId($id)->get();
        $evo=Evolution::whereconsultationId($id)->get();
        foreach($cons as $c){
            $p=$c->patient->id;

        }
        
        return view('medecin.detailCons',compact('cons','exam','evo','id','p','d')); 
    }
    public function addEvolution(Request $request){
        $rdv= DB::table('rendez_vouses')->wherepatientId($request->patient)->max('id');
        $rdvs=RendezVous::find($rdv);
        $evo=new Evolution();
        $res=0;
        if(!is_null($request->description) && !is_null($request->date)){
            $evo->description=$request->description;
            $evo->date=$request->date;
            $evo->consultation_id=$request->id;
            $res=$evo->save();
            if($res==1){
                $rdvs->statut="effectif";
                $rdvs->save();
            }
            return $this->detailCons($request->id);
        }
        else{
            return $this->detailCons($request->id);
        }

    }
    public function addExamen(Request $request){
        $exam=new ExamenComplementaire();
        if(!is_null($request->contenu) && !is_null($request->dateExamen)){
            $exam->contenu=$request->contenu;
            $exam->dateExamen=$request->dateExamen;
            $exam->consultation_id=$request->id;
          
            $exam->save();

            return $this->detailCons($request->id);
        }
        else{
            return $this->detailCons($request->id);
        }


    }
    public function modifCons($id){
        $consult=Consultation::find($id);
        $cons=Consultation::with('patient')->whereId($id)->get();
        return view('medecin.modifCons',compact('consult','cons'));
    }
    public function updateCons(Request $request){
        $idmed=0;
        $med= Medecin::select('id')->whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $idmed=$m->id;
        }
        $consult=Consultation::find($request->id);
        if(is_null($request->motifConsultation) || is_null($request->modeAdmission)  || is_null($request->alergie)  || is_null($request->histoireMaladie) || is_null($request->maladie) || is_null($request->modeDevie) || is_null($request->handicap) || is_null($request->decision) || is_null($request->operation) || is_null($request->dateConsultation)){
            $consult=Consultation::find($request->id);
            $var='Veuillez remplir tous les champs';
            $cons=Consultation::with('patient')->whereId($request->id)->get();
             return  view('medecin.modifCons' , compact('consult','var','cons'));
            }
            else{
                    $consult->motifConsultation=$request->motifConsultation;
                    $consult->histoireMaladie=$request->histoireMaladie;
                    $consult->maladie=$request->maladie;
                    $consult->modeDevie=$request->modeDevie;
                    $consult->handicap=$request->handicap;
                    $consult->decision=$request->decision;
                    $consult->operation=$request->operation;
                    $consult->dateConsultation=$request->dateConsultation;
                    $consult->modeAdmission=$request->modeAdmission;
                    $consult->patient_id=$request->id;
                    $consult->medecin_id=$idmed;
                    $consult->alergie=$request->alergie;
                    $ress=$consult->save();
                
                return $this->listeConsultation();
            }
            
    }


    public function detailPatient($id){
        $patient=Patient::find($id);
        $orienter=Orienter::wherepatientId($id)->get();
        $traitement=Traitement::with('medecin')->get();
        $medecin=Medecin::with('user')->get();
        $ordonnance=Ordonnance::all();
        $medicament=Medicament::all();

        $med=Medecin::whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $mede=$m->id;
        }

        $conmed=Medecin::find($mede);
        return view('medecin.detailpatient',compact('patient','conmed','medecin','traitement','orienter','ordonnance','medicament'));
        
    }

    public function ordonnance($id){
        return view('medecin.ordonnance',compact('id'));
    }

    public function addOrdonnance(Request $request){
        $ordonnance= new Ordonnance();
        $trait=Traitement::find($request->id);
        
        $tab1=$_POST['libelle'];
         $tab2=$_POST['quantite'];
         
        
 
         if(is_null($request->dateOrdonnance)  ||  $tab1[0]=="" || $tab2[0]=="" ){
             $var='veuillez remplir tous les champs ';
             $id=$request->id;
             $v=$trait->patient_id;
             return view('medecin.traitement',compact('id','var','v'));
         }
 
         else{
            
                 $ordonnance->traitement_id=$request->id;
                 $ordonnance->dateOrdonnance=$request->dateOrdonnance;
                 $re=$ordonnance->save();
                 if($re==1){
                     for($i=0;$i<count($tab1);$i++){
                     $medicament=new Medicament();
                     $medicament->ordonnance_id=DB::table('ordonnances')->max('id');
                     $medicament->libelle=$tab1[$i];
                     $medicament->quantite=$tab2[$i];
                     $medicament->save();
 
                     $vr=' Enregistré avec succès';
                     $v=$trait->patient_id;
                     return view('medecin.ordonnance',compact('v','vr'));
                 }
             
             }
         }
        
    }



    public function traitement($id){
        return view('medecin.traitement',compact('id'));
    }

    public function ajoutertraitement(Request $request){
       $ordonnance= new Ordonnance();
       $traitement=new Traitement();
       
       $tab1=$_POST['libelle'];
        $tab2=$_POST['quantite'];
        $mede=0;
        $med=Medecin::whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $mede=$m->id;
        }
        

        if(is_null($request->description) || is_null($request->type)  ||  $tab1[0]=="" || $tab2[0]=="" ){
            $var='veuillez remplir tous les champs ';
            $id=$request->id;
            return view('medecin.traitement',compact('id','var'));
        }

        else{
            $traitement->description=$request->description;
            $traitement->type=$request->type;
            $traitement->patient_id=$request->id;
            $traitement->medecin_id=$mede;
            $res=$traitement->save();
            if($res==1){
                $ordonnance->traitement_id=DB::table('traitements')->max('id');
                $ordonnance->dateOrdonnance=$request->dateOrdonnance;
                $re=$ordonnance->save();
                if($re==1){
                    for($i=0;$i<count($tab1);$i++){
                    $medicament=new Medicament();
                    $medicament->ordonnance_id=DB::table('ordonnances')->max('id');
                    $medicament->libelle=$tab1[$i];
                    $medicament->quantite=$tab2[$i];
                    $medicament->save();

                    $vr=' Enregistré avec succès';
                    $id=$request->id;
                    return view('medecin.traitement',compact('id','vr'));
                }
            }
            }
        }
       
      
    }
        
        
    public function listehospita(){
        
        $patient=Patient::all();
        $hosp=Hospitalisation::wheredatesortie(null)->get();
        $mede=0;
        $med=Medecin::whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $mede=$m->id;
        }
        $medecin=Medecin::find($mede);
        return view('medecin.listehospita',compact('hosp','patient','medecin'));
    }

    public function editHosp($id){
        $hosp=Hospitalisation::find($id);
        $hosp->dateSortie=date('Y-m-d');
        $hosp->save();
        return $this->listehospita();
    }

    public function dossier($id){
        $patient=Patient::find($id);
       // $traitement=Traitement::
       $mede=0;
        $med=Medecin::whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $mede=$m->id;
        }
       $traitement=Traitement::wherepatientId($id)->get();
       $visite=RendezVous::wherestatut('effectif')->wherepatientId($id)->get();
       $cons=Consultation::wherepatientId($id)->get();
       $evolu=Evolution::all();
       $examCons=Consultation::wherepatientId($id)->get();
       $exam=ExamenComplementaire::all();
       $medecin=Medecin::with('user')->get();
       $hospi=Hospitalisation::wherepatientId($id)->get(); 
       $medicament=Medicament::all();
       $ordonnance=Ordonnance::all();
        return view('medecin.dossier',compact('patient','visite','cons','examCons','exam','evolu','hospi','medecin','traitement','ordonnance','medicament'));
    }
}

?>