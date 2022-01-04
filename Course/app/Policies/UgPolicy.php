<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserUgDegree;
use Illuminate\Auth\Access\HandlesAuthorization;

class UgPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    
    }
    public function CheckUgDegree(){
        $CheckUser = UserUgDegree::where('user_id',auth()->user()->id)->first();
        if($CheckUser){
            return true;
        }
   }
}
