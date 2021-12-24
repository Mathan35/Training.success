<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\helpers\General;

class OrganizationPolicy
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


    public function viewOrganization(){

        if($this->getPermissions($permission = "view-organization")==true){
            return true;
        }
            abort(419);
   }

   public function editOrganization(){
        return $this->getPermissions($permission = "edit-organization");
   }

   public function createOrganization(){
        return $this->getPermissions($permission = "create-organization");
   }

}
