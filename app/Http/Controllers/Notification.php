<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Scheduling\Schedule;

class Notification extends Controller
{
      /*
    public function sendSMS(Request $request)
    {

        $client = new Client();

        $response = $client->request('POST','https://api.infobip.com/sms/1/text/single', [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('ahmedfall:Ams-0401MF'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'from' => 'sender_name',
                'to' => '784794446',
                'text' => 'Your message text'
            ]
        ]);

        return $response->getStatusCode();
    }
    */

    public function sendSMS()
    {
        $client = new Client([
            'base_uri' => "https://dm48r1.api.infobip.com/",
                'headers' => [
                    'Authorization' => "App 6c8eb7d2e2a60ed8fe87397fbf52b9b8-5360a5f0-0159-48dd-8c3c-0196fc2451a0",
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
            ]
        ]);

       
        $rendezvous= RendezVous::with('patient')->wherestatut('non_effectif')->get();
     
        
        foreach ($rendezvous as $rv) {
          
                if( $rv->patient_id==$rv->patient->id &&  substr(substr( $rv->date,0,10),8,9)==(date('d')+1) && substr(substr( $rv->date,0,7),5,7)==date('m')){
                  
            $response = $client->request(
            'POST',
            'sms/2/text/advanced',
            [
                RequestOptions::JSON => [
                    'messages' => [
                        [
                            'from' => 'SJD-Medical',
                            'destinations' => [
                                ['to' => '221'.$rv->patient->telephone],
                            ],
                            'text' => 'Bonjour '.$rv->patient->prenom.' '.$rv->patient->nom .', vous avez-rendez-vous demain à l\'hôpital Saint Jean de Dieu',
                        ]
                    ]
                ],
            ]
        );

        echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
        echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
    }

  
}
        
    }
}
