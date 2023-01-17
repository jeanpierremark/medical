<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function getEvent(){
        

        return view('secretaire.calendrier');

    }
    public function createEvent(Request $request){
        $data = $request->except('_token');
        $events = Event::insert($data);
        return response()->json($events);
    }

    public function deleteEvent(Request $request){
        $event = Event::find($request->id);
        return $event->delete();
    }
}
