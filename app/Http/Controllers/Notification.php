<?php

namespace App\Http\Controllers;

use App\Helpers\Sms;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;


class Notification extends Controller
{
     /*  public function envoiSMS(){
        $basic  = new \Vonage\Client\Credentials\Basic("ce6e68da", "lYQZwgErBAzWgni7");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("221772268082", 'SJD-Medical', 'Bonjour Cher Patient vous avez rendez-vous demain (jp)')
        );
        
        $message = $response->current();
        
        return view('welcome');
    }*/
 public function sendSMS()
    {
        $config = array(
            'clientId' => config('app.clientId'),
            'clientSecret' =>  config('app.clientSecret'),
        );

        $osms = new Sms($config);

        $data = $osms->getTokenFromConsumerKey();
        $token = array(
            'token' => $data['access_token']
        );

        $rendezvous=RendezVous::wherestatut('non_effectif')->get();
        $patient=Patient::all();
       
                    $response = $osms->sendSms('+221772265039','+221777454584','Bonjour ' ,'SJD-Medical');
                
        
         return view('welcome');
    }
    
}
