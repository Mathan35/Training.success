<?php

namespace App\helpers;
use App\Models\RolePermission;
use App\Models\User;
trait General{
    
    public function findUser(){
        $authUser = User::find(auth()->user()->id); 
        foreach ($authUser->roles as $key => $data){
            if($data->name == "superAdmin"){
                return true;
            }
            else{
                return false;
            }
        }   
    }
    

}