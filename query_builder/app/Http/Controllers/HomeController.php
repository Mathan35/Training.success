<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Workspace;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Helpers\General;

class HomeController extends Controller
{
    use General;

    public function Dashboard()
    {
        return view('dashboard');
    }

    //view Organization
    public function Organization()
    {
        $Organization = QueryBuilder::for(Organization::class)->get();
        return view('organization.organization', compact('Organization'));
    }
    public function ViewOrganization($id)
    {
        $organization = $this->FindOrganization($id);
        return view('organization.view-organization', compact('organization'));
    }

    //workspaces
    public function Workspace()
    {
        $workspace = QueryBuilder::for(Workspace::class)
                    ->withCount('projects')
                    ->get();
        return view('workspace.workspace',compact('workspace'));
    }
    public function ViewWorkspace($id){
        $workspace = $this->FindWorkspace($id);
        return view('workspace.view-workspace', compact('workspace'));
    }

    //role
    public function Role(){
        $Role = QueryBuilder::for(Role::class)->get();
        return view('role.role', compact('Role'));
    }
    public function ViewRole($id){
        $Role = $this->FindRole($id);
        return view('role.view-role', compact('Role'));
    }

    //project
    public function project(){
        $Project = QueryBuilder::for(Project::class)->get();
        return view('project.project', compact('Project'));
    }
    public function ViewProject($id){
        $Project = $this->FindProject($id);
        return view('project.view-project', compact('Project'));
    }

    //task
    public function getTask(){
        $Task = QueryBuilder::for(Task::class)->get();
        return view('task.task', compact('Task'));
    }
    public function ViewTask($id){
        $Task = $this->FindTask($id);
        return view('task.view-task', compact('Task'));
    }

    //User
    public function User(){
        $User = QueryBuilder::for(User::class)->get();
        return view('user.user', compact('User'));
    }
    public function ViewUser($id){
        $User = $this->FindUser($id);
        return view('user.view-user', compact('User'));
    }
}
