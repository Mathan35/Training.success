<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\helpers\General;

class RolePolicy
{
    use General;

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createRole(){
            return $this->getPermissions($permission = "create-role");
    }

    public function editRole(){

         if($this->getPermissions($permission = "edit-role")==true){
             return true;
         }
             abort(401);
    }


    public function viewRole(){

        if($this->getPermissions($permission = "view-role")==true){
            return true;
        }
            abort(401);
   }


}
