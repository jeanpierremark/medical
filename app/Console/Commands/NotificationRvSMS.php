<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Command;

class NotificationRvSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rappel:rdv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rappel des rendez-vous par sms';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()

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

        
    }

  
}

        return Command::SUCCESS;
    }
}
