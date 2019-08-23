<?php

namespace App\Http\Controllers;


use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Jobs\SendWelcomeMail;
use App\Emails;

class JobController extends Controller
{
    public function processQueue(){
       //Mail::to('vyshakh@clubby.in')->send(new WelcomeMail("Vyshakh Sr ")); dd();
        //$emailJob = (new SendWelcomeMail('Pankaj Sood'))->delay(Carbon::now()->addSeconds(3));
        //$emailJob = (new SendWelcomeMail('Pankaj Sood'));
        //dispatch($emailJob);


        $emailJob = new SendWelcomeMail('hi iam vyshakh');
        dispatch($emailJob);

        for($i=0;$i<=5;$i++){

        }

        echo 'Mail Sent';
    }
}
