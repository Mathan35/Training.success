<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;

class GetUser{

    public static function Start($id){
      return self::Project($id);
    }

    public function Project($id){
      $User  =  QueryBuilder::for(User::class)
                ->allowedIncludes(['organization'])
                ->with('organization')
                ->find($id);
      return $User;
    }

}