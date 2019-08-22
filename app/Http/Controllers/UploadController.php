<?php

namespace App\Http\Controllers;

//models
use App\Emails;
use App\EmailTemplates;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use SendGrid\Mail\Mail;
use App\Mail\WelcomeMail;
use App\Jobs\SendWelcomeMail;







class UploadController extends Controller
{
    public function index(){
        $emailTemplateData  =   EmailTemplates::where('current_status',1)->first();
        $paramArray         =   ['templates'=>$emailTemplateData];
        return view('uploads',$paramArray);
    }

    public function processQueue()
    {
        $emailJob = new SendWelcomeMail();

        for($i=0;$i<=5;$i++){
            dispatch($emailJob);
        }

        echo 'Mail Sent';




    }

    public function handleCsvUploads(Request $request){
        //dd($request->file('file-import'));

        $importedFile   =   $request->file('file-import');
        $template       =   $request->template;
        $validExtension =   ["csv"];
        $maxFileSize    =   2097152;
        $emailsArray    =   [];


        //handling email Templates
        $emailTemplateModel     =   new EmailTemplates();
        $emailTemplateResponse  =   $emailTemplateModel->handleEmailTempaltes($template);





        if($importedFile){
            $path       =   $importedFile->getRealPath();
            $filename   =   $importedFile->getClientOriginalName();
            $extension  =   $importedFile->getClientOriginalExtension();
            $fileSize   =   $importedFile->getSize();
            $mimeType   =   $importedFile->getMimeType();

            /*echo "Filename: ".$filename."</br>";
            echo "Extension: ".$extension."</br>";
            echo "File Size: ".$fileSize."</br>";
            echo "Mime Type: ".$mimeType."</br>";*/

            if(in_array(strtolower($extension),$validExtension)){
                if($fileSize<$maxFileSize){

                    $data   =   Excel::load($path)->get();

                    if(!empty($data)){
                        $data = $data->toArray();

                        if(!empty($data)){
                            foreach($data as $index=>$value){
                                $email =    $value['email'];
                                array_push($emailsArray, $email);
                            }
                        }

                    }

                }

            }

            $emailsModel            =   new Emails();
            $emailUploadResponse    =   $emailsModel->handleEmailsSave($emailsArray);

            if($emailUploadResponse == "success"){
                $location   =   "uploads";
                $importedFile->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                //sending emails
                $this->processQueue();



                $paramArray =   ['success'=>'File imported successfully'];
                //echo $paramArray['success'];
                return Redirect::to('upload')->with($paramArray);

            }

        }
    }
}
