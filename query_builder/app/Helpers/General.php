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

trait General{

    public function Task($id){
        $task  = QueryBuilder::for(Project::class)
                 ->allowedIncludes(['tasks'])->where('organization_id', $id)
                 ->withCount('tasks')->get();
        return $task;
    }
    public function getOrganization($id){
        $organization = QueryBuilder::for(Organization::class)
                        ->allowedIncludes(['workspaces','roles', 'users'])
                        ->withCount('workspaces','roles', 'users')->find($id);
                        
        return $organization;
    }

    public function getWorkspace($id){
        $workspace   = QueryBuilder::for(Workspace::class)
                     ->allowedIncludes(['projects'])
                     ->with('projects')
                     ->find($id);
        return $workspace;
    }

    public function getRole($id){
         $role = QueryBuilder::for(Role::class)
                 ->allowedIncludes(['permissions'])
                 ->with('permissions')
                 ->find($id);
         return $role;
    }

    public function getProject($id){
        $project = QueryBuilder::for(Project::class)
                   ->allowedIncludes(['tasks','organization','workspace'])
                   ->with('organization','workspace','tasks')
                   ->find($id);
        return $project;
   }

   public function findTask($id){
        $getTask = QueryBuilder::for(Task::class)
                   ->allowedIncludes(['project'])
                   ->with('project')
                   ->find($id); 
        return $getTask;

   }
   
   public function getUser($id){
        $user = QueryBuilder::for(User::class)
                ->allowedIncludes(['organization'])
                ->with('organization')
                ->find($id);
        return $user;
   }

}