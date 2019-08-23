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
    public $template    =   "";


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //echo "vyshakh";

        /*$data   =   Emails::where('current_status',1)->first();
        $emailSend  =   new WelcomeMail();
        Mail::to($data['email'])->send($emailSend);
        Emails::where('email',$data['email'])->update(['current_status'=>0]);*/

        $email = new Mail();
        $email->setFrom("vyshakh.logezy@gmail.com", "Vyshakh");
        $email->setSubject("Sample Mail");
        $email->addTo("vyshakhps1988@gmail.com","");
        $email->addContent("text/plain","Vyshakh Your first template");


        $email->addContent("text/html",$this->template);

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
