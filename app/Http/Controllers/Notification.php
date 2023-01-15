<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Sms;

class Notification extends Controller
{
    /*public function envoiSMS(){
        $basic  = new \Vonage\Client\Credentials\Basic("ce6e68da", "lYQZwgErBAzWgni7");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("221784794446", SJD-Medical, 'Bonjour cher(e) patient vous avez rendez-vous demain')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
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

        $response = $osms->sendSms(
        // sender
            'tel:+221772265039',
            // receiver
            'tel:+221773248363',
            // message
            'bonjour vous avez rendez-vous demain ',
            //name
            'SJD-Medical'
        );

        
    }
    
}
