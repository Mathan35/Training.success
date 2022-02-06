<?php

namespace App\Helpers;
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

    public function permissions(){
        $user  = User::find(auth()->user()->id);
        $check  = collect($user->roles)->toArray();
        if(!empty($check)){
            $permissions = [];
            foreach ($user->roles as $key => $data)  {
                foreach ($data->permissions as $key => $value) {
                    $permissions[] = $value;
                }
            }  
            $collection  = collect($permissions)->pluck('name')->toArray();
            return $collection;
         }
        else{
             $collection = null;
            return $collection;
            }
    }

    public function CheckPermissions($permission)
    {
        $permissions = [];
        $user  = User::find(auth()->user()->id);
        foreach ($user->roles as $key => $data)  {
            foreach ($data->permissions as $key => $value) {
                $permissions[] = $value;
            }
        }  
        $collection  = collect($permissions);
        $filtered = $collection->pluck('name')->toArray();
        $validatePermission = (in_array($permission,$filtered));
        return $validatePermission;
    

    }
    

}