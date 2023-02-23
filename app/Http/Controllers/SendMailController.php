<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class SendMailController extends Controller
{
    public function EnvoieEmail()
    {
        $mails = User::select('email')->get();
        $data = [
            'name'      => 'sylla',
            'message'   => 'The life of brian',
            'subject'   => 'Laravel Plain Email',
            'from'      => 'amadou.moctar0401@gmail.com', // I try to change email here but no //result when I change.
            'from_name' => 'SJD médical service',
        ];
        foreach ($mails as $mail) {
            //dump($mail['email']);
            dump(Mail::to($mail['email'], 'sylla')->send(new SendEmail($data)));
        }

        return "HTML Email Sent. Check your inbox.";
    }
}
