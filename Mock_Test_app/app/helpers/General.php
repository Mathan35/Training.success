<?php

namespace App\helpers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
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
    //validating id in ne table
    public function validateId($id,$fId,$tableName){
        $validate = DB::table($tableName)->where($fId,$id)->first();
        if($validate){
           return true;
        }
        else{
            return false;
        }
    }

}