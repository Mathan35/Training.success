<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Project;

class GetProject{

    public static function Start($id){
      return self::Project($id);
    }

    public function Project($id){
      $Project  =   QueryBuilder::for(Project::class)
                    ->allowedIncludes(['tasks','organization','workspace'])
                    ->with('organization','workspace','tasks')
                    ->find($id);
      return $Project;
    }

}