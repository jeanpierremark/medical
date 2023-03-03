<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\RendezVous;
use PharIo\Manifest\Email;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Console\Command;

class NotificationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rappel:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rappel de rendez-vous par mail';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $rendezvous= RendezVous::with('patient')->wherestatut('non_effectif')->get();
     
       
        //$mails = User::select('email')->get();
        $data = [
            'name'      => 'sylla',
            'message'   => 'The life of brian',
            'subject'   => 'Laravel Plain Email',
            'from'      => 'amadou.moctar0401@gmail.com', // I try to change email here but no //result when I change.
            'from_name' => 'SJD-Medical ',
        ];
         
        foreach ($rendezvous as $rv) {
          
            if( $rv->patient_id==$rv->patient->id &&  substr(substr( $rv->date,0,10),8,9)==(date('d')+1) && substr(substr( $rv->date,0,7),5,7)==date('m')){

            Mail::to($rv->patient->email)->send(new SendEmail($data));
            
        }

       
    }

        return Command::SUCCESS;
    }
}
