<?php

namespace App\Helpers;
use App\Models\RolePermission;
use App\Models\Permission;
use App\Models\Organization;
trait General{


    public function getPermissions($permission){
        $getPermission = RolePermission::where('user_id',auth()->user()->id)->get()->pluck("permission_id")->unique();
        $permissionArray    = Permission::whereIn("id",$getPermission)->get()->pluck('name')->toArray();
        $validatePermission = (in_array($permission,$permissionArray));
        return $validatePermission;
    }

    public function checkAdmin($checkAdmin){
        $organization = Organization::find(auth()->user()->organization_id);
        if($organization->name == $checkAdmin){
            return true;
        }
        else{
            return false;
        }
    }

    public function getOrganization()
    {
        $organization = Organization::find(auth()->user()->organization_id);
        return $organization->name;
    }


}