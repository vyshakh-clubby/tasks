<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'emails';

    protected $fillable = [
        'email',
        'created_at',
        'updated_at'
        ];

    public function handleEmailsSave($emailsArray){
        if(!empty($emailsArray)){
            foreach($emailsArray as $index=>$email){
                $emailExistCheck    =   Emails::where('email',$email)->count();

                $paramArray =   ['email'=>$email, 'current_status'=>1];

                if($emailExistCheck == 0){
                    Emails::insert($paramArray);
                }
            }

            return "success";
        }
    }

    public function emailList(){
        $data   =   Emails::where('current_status',1)->first();
        return $data;
    }
}
