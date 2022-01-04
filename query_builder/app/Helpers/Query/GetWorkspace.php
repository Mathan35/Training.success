<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Workspace;

class GetWorkspace{

    public static function Start($id){
      return self::Workpace($id);
    }

    public function Workpace($id){
      $Workpace  =  QueryBuilder::for(Workspace::class)
                ->allowedIncludes(['projects'])
                ->with('projects')
                ->find($id);
      return $Workpace;
    }

}