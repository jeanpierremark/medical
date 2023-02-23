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

    public function sendSMS(Request $request)
    {
        $client = new Client([
            'base_uri' => "https://pw6g9l.api.infobip.com/",
            'headers' => [
                'Authorization' => "App f2c899914fd8acf12b24f163f5f70299-c46f75b2-59ca-4cb8-a517-8f6212b84954",
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
