<?php

namespace App\Jobs;

use App\Emails;
use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Support\Facades\Mail;
use SendGrid\Mail\Mail;

class SendWelcomeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        /*$data   =   Emails::where('current_status',1)->first();
        $emailSend  =   new WelcomeMail();
        Mail::to($data['email'])->send($emailSend);
        Emails::where('email',$data['email'])->update(['current_status'=>0]);*/

        $email  =   new Mail();
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
        }



    }
}
