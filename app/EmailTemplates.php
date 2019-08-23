<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    protected $table = 'email_templates';

    protected $fillable = [
        'templates',
        'created_at',
        'updated_at'
    ];

    public function handleEmailTempaltes($templates){

        if(!empty($templates)){
            $paramArray =   ['templates'=>$templates,'current_status'=>1];
            EmailTemplates::insert($paramArray);
            return "success";
        }
    }

    public function useTemplate(){
        $data   =   EmailTemplates::where('current_status',1)->first();
        return $data;
    }

}
