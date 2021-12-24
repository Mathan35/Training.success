<?php

namespace App\Http\Controllers;
use App\Models\RolePermission;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Helpers\General;
use App\Jobs\SendEmailJob;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\StoreUserRequest;

class OrganizationController extends Controller
{
    use General;

    public function OrganizationRole(){
        $organization     = $this->getOrganization();
        $Permission       = RolePermission::where('organization_id',auth()->user()->organization_id)->get()->pluck("permission_id");
        $getPermission    = Permission::whereIn('id',$Permission)->get();
        return view('organization.role',compact('getPermission','organization'));    }

    public function CreateOrganizationRole(StoreRoleRequest $request){
       
        $role                   = new Role;
        $role->name             = $request->name;
        $role->organization_id  = auth()->user()->organization_id;
        $role->save();

        //role attach
        $permissions  = $request->permission_id;
        $role->permissions()->attach($permissions,["user_id" => auth()->user()->id,"organization_id" => auth()->user()->organization_id]);
        return redirect()->back()->with('message','Role successfully created with Permissions');    
    }

    public function ViewOrganizationRole(){
        $organization = $this->getOrganization();
        $getRole = QueryBuilder::for(Role::class)
                ->allowedFilters(['name'])
                ->where('organization_id', auth()->user()->organization_id)
                ->get();
        return view('organization.view-role', compact('getRole','organization'));
    }

    public function EditOrganizationRole(){
        return "you have permission";
    }
    public function OrganizationUsers(){
        $organization = $this->getOrganization();
        $getRole      = Role::where('organization_id', auth()->user()->organization_id)->get();
        return view('organization.organization',compact('getRole','organization'));
    }

    public function CreateOrganizationUsers(StoreUserRequest $request){
       
        $user                   = new User;
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->organization_id  = auth()->user()->organization_id;
        $user->save();

        //role attach
        $role          = Role::find($request->role_id);
        $GetPermission = RolePermission::where('role_id',$role->id)
                                         ->where('organization_id',auth()->user()->organization_id)
                                         ->where('user_id',auth()->user()->id)->get()->pluck('permission_id');

        $PermissionArray      = $GetPermission->toArray();
        $role->permissions()->attach($PermissionArray, ["user_id" => $user->id,"organization_id" => auth()->user()->organization_id]);
        return redirect()->back()->with('message','Role successfully created with Permissions');
    }

    public function ViewOrganizationUsers(){
        $organization = $this->getOrganization();
        $user = QueryBuilder::for(User::class)
                ->allowedFilters(['name','email'])
                ->where('organization_id', auth()->user()->organization_id)
                ->get();
        return view('organization.view-users', compact('user', 'organization'));
    }
    public function testemail(){
        SendEmailJob::dispatch($email = "bmathank555@gmail.com");
        echo "mail sent suuccessfully";
    }
}
