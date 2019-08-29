<?php

namespace App\Http\Controllers;

//models
use App\Emails;
use App\EmailTemplates;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use SendGrid\Mail\Mail;
use App\Mail\WelcomeMail;
use App\Jobs\SendWelcomeMail;







class UploadController extends Controller
{
    public function index(Request $request){

        $currentUrl         =   Route::current()->uri();
        $breadCrumps        =   "Uploads";
        $pageTitle          =   "Uploads";
        $title              =   "Clubby | Uploads";
        $emailTemplateData  =   EmailTemplates::where('current_status',1)->first();

        $emailTemplateModel =   new EmailTemplates();
        $templateList       =   $emailTemplateModel->getTemplateList();

        $paramArray         =   [
            'templates'     =>  $emailTemplateData,
            'currentUrl'    =>  $currentUrl,
            'breadcrumps'   =>  $breadCrumps,
            'pageTitle'     =>  $pageTitle,
            'title'         =>  $title,
            'templateList'  =>  $templateList
        ];
        return view('uploads',$paramArray);
    }

    public function processQueue($emailCount)
    {

        $emailTemplate   =  new EmailTemplates();
        $useTemplate     =  $emailTemplate->useTemplate();
        $emailJob        =  new SendWelcomeMail($useTemplate['templates']);

        for($i=1;$i<=$emailCount;$i++){
            dispatch($emailJob);

        }

    }

    public function handleCsvUploads(Request $request){

        $importedFile   =   $request->file('file-import');
        $template       =   $request->template;
        $idTemplate     =   $request->template_id;
        $validExtension =   ["csv"];
        $maxFileSize    =   2097152;
        $emailsArray    =   [];

        if(!empty($importedFile) && !empty($template)){
            if($importedFile){
                $path       =   $importedFile->getRealPath();
                $filename   =   $importedFile->getClientOriginalName();
                $extension  =   $importedFile->getClientOriginalExtension();
                $fileSize   =   $importedFile->getSize();
                $mimeType   =   $importedFile->getMimeType();

                /* echo "Filename: ".$filename."</br>";
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
                                    $email =    ltrim($value['email']);
                                    array_push($emailsArray, $email);
                                }
                            }

                        }

                    }

                }
                else{
                    return Redirect::to('upload')->with('error','Invalid file format!');
                }

                //dd($emailsArray);

                $emailsModel            =   new Emails();
                $emailUploadResponse    =   $emailsModel->handleEmailsSave($emailsArray);



                if($emailUploadResponse == "success"){

                    /*$location   =   "uploads";
                    $importedFile->move($location,$filename);
                    $filepath = public_path($location."/".$filename);*/

                    //sending emails
                    $queueStatus = $this->processQueue(count($emailsArray));

                    //handling email Templates
                    $emailTemplateModel     =   new EmailTemplates();
                    $emailTemplateResponse  =   $emailTemplateModel->handleEmailTempaltes($template, $idTemplate);


                    $paramArray =   ['success'=>'File imported successfully'];
                    //echo $paramArray['success'];
                    return Redirect::to('upload')->with($paramArray);



                }

            }
        }
        else{
            return back()->with("error","Please fill the empty fields")->withInput();
        }


    }

    public function getTemplateList(Request $request){
        $emailTemplate  =   new EmailTemplates();
        $data           =   $emailTemplate->getTemplateList();



        $json_data = array(
            "draw"            => count($data),
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => $data   // total data array
        );

        //dd($json_data);

        echo json_encode($json_data);

    }
}
