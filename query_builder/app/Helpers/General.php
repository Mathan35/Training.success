<?php
namespace App\Helpers;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\RolePermission;
use App\Models\Permission;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Workspace;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Helpers\Query\GetOrganization;
use App\Helpers\Query\GetWorkspace;
use App\Helpers\Query\GetRole;
use App\Helpers\Query\GetProject;
use App\Helpers\Query\GetTask;
use App\Helpers\Query\GetUser;

trait General{

    public function FindOrganization($id){
        return GetOrganization::Start($id);
    }

    public function FindWorkspace($id){
        return GetWorkspace::Start($id);
    }

    public function FindRole($id){
        return GetRole::Start($id);
    }

    public function FindProject($id){
        return GetProject::Start($id);
   }

   public function FindTask($id){
        return GetTask::Start($id);

   }
   
   public function FindUser($id){
        return GetUser::Start($id);
        
   }

}