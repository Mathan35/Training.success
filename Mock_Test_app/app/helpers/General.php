<?php

namespace App\helpers;
use App\Models\User;
use Illuminate\Http\Request;


trait General{

    public function Random(){

        $create_id   = "US".rand();
        $check_id = User::where('user_id',$create_id)->first();

        if($check_id != null){
            $this->random();
        }
        else{
            return $create_id;
        }
    }

    public function getIp(){
        return request()->ip();  
    }

}