<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\UserPgDegree;

class PgPolicy
{
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

    public function CheckPgDegree(){
        $CheckUser = UserPgDegree::where('user_id',auth()->user()->id)->first();
        if($CheckUser ){
            return true;
        }
    }
}
