<?php

namespace App\Helpers\Query;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Project;
use App\Models\Organization;

class GetOrganization{
    public static function Start($id){
      return self::Organization($id);
    }

    public function Organization($id){
      $Organization  = QueryBuilder::for(Organization::class)
                      ->allowedIncludes(['workspaces','roles', 'users'])
                      ->withCount('workspaces','roles', 'users')->find($id);
      return $Organization;
    }
}