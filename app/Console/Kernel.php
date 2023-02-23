<?php

namespace App\Console;

use GuzzleHttp\Client;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call(function(){
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
    
            /*echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
            echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);*/
        }
    
      
    }
            
        }
            
         })->dailyAt('13:00');

        
       
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
