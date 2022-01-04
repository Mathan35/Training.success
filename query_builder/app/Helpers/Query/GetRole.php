<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;

class GetRole{

    public static function Start($id){
      return self::Role($id);
    }

    public function Role($id){
      $Role  =   QueryBuilder::for(Role::class)
                ->allowedIncludes(['permissions'])
                ->with('permissions')
                ->find($id);
      return $Role;
    }

}
