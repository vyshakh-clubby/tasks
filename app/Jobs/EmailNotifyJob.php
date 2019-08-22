<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PharIo\Manifest\Email;
//use SendGrid\Mail\Mail;
use App\Mail\EmailNotify;
use Mail;



//use SendGrid\Mail\Mail;
//use App\Mail\EmailNotify;

class EmailNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //echo "vyshakh";

       /* $email  =   new Mail();
        $email->setFrom("vyshakh.logezy@gmail.com", "Vyshakh");
        $email->setSubject("Sample Mail");
        $email->addTo("vyshakh@clubby.in","");
        $email->addContent("text/plain","Vyshakh Your first template");


        //$email->addContent("text/html",$template);

        $apiKey     =   getenv('SENDGRID_API_KEY');
        $sendgrid   =    new \SendGrid($apiKey);



        try {

            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {

            echo 'Caught exception: '. $e->getMessage() ."\n";
        }*/

        //$when = now()->addMinutes(1);




    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to('vyshakh@clubby.in')->queue(new EmailNotify());
    }
}

