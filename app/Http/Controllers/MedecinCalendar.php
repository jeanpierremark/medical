<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Orienter;
use App\Models\RendezVous;
use Illuminate\Http\Request;

class MedecinCalendar extends Controller
{


    public function agenda(){
        $events=array();
        $spe='';
        $med= Medecin::select('specialite')->whereuserId(Auth()->user()->id)->get();
        foreach($med as $m){
            $spe=$m->specialite;
        }
       
        $rdvs= RendezVous::with('patient')->wherestatut('non_effectif')->get();
        $patient= Orienter::with('patient')->wheredomaine($spe)->get();
        
        foreach($rdvs as $rv){
            foreach($patient as $p){
                if($rv->patient->id == $p->patient->id){
            $events[] =[
                'title' => [$rv->patient->prenom ,$rv->patient->nom],
                'date' => $rv->date,
            ];
        }
        }
    }
        return view('medecin.calendrier',compact('events'));

    }

    
    public function createEvent(Request $request){
        $data = $request->except('_token');
        $events = RendezVous::insert($data);
        return response()->json($events);
    }

    public function deleteEvent(Request $request){
        $event = RendezVous::find($request->id);
        return $event->delete();
    }
}
