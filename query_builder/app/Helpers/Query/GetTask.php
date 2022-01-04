<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Task;

class GetTask{

    public static function Start($id){
      return self::Project($id);
    }

    public function Project($id){
      $Task  =   QueryBuilder::for(Task::class)
                ->allowedIncludes(['project'])
                ->with('project')
                ->find($id); 
      return $Task;
    }

}