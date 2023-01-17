<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function getEvent(){
        $events=array();
        $rdvs= RendezVous::with('patient')->get();
        $patients= Patient::with('rendezvous')->get();
        
        foreach($rdvs as $rv){
            $events[] =[
                'title' => [$rv->patient->prenom ,$rv->patient->nom],
                'date' => $rv->date,
            ];
        }

        return view('secretaire.calendrier',compact('events'));

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
