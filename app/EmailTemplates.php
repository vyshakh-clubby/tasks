<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    protected $table = 'email_templates';

    protected $fillable = [
        'template_name',
        'templates',
        'created_at',
        'updated_at'
    ];

    public function handleEmailTempaltes($templates, $idTemplate){
        if(!empty($idTemplate)){
            $paramArray =   ['templates'=>$templates];
            EmailTemplates::where('id',$idTemplate)->update($paramArray);
            return "success";
        }
        else{
            $lastRecord     =   EmailTemplates::orderBy('id','desc')->first();
            $lastInsertId   =   0;

            if(!empty($templates)){
                $lastInsertId   =   !empty($lastRecord)?$lastRecord['id']:0;
                $templateName   =   "Template".($lastInsertId+1);

                $paramArray =   ['template_name'=>$templateName,'templates'=>$templates,'current_status'=>1];
                EmailTemplates::insert($paramArray);
                return "success";
            }

        }


    }

    public function useTemplate(){
        $data   =   EmailTemplates::where('current_status',1)->first();
        return $data;
    }
    public function getTemplateList(){
        $data   =   EmailTemplates::get();
        return $data;
    }
    public function changeTemplateStatus($id){
        if(!empty($id)){
            EmailTemplates::where('id',$id)->update(['current_status'=>1]);
            EmailTemplates::where('id','!=',$id)->update(['current_status'=>0]);
            return "success";

        }
        else{
            return "error";
        }
    }

}
