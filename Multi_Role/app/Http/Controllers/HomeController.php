<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Organization;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Hash;
use App\Helpers\General;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\StoreUserRequest;

class HomeController extends Controller
{
    use General;
    public function Index(){
        return view('welcome');
    }

    public function Dashboard(){
        $organization = $this->getOrganization();
        return view('dashboard', compact('organization'));
    }
    

    //organization
    public function Organization(){
        $getRoles = Role::get();
        return view('admin.organization', compact('getRoles'));
    }
    public function CreateOrganization(StoreOrganizationRequest $request){

        $organization           = new Organization;
        $organization->name     = $request->name;
        $organization->save();
       
        $user                   = new User;
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->organization_id  = $organization->id;
        $user->save();

        //role attach
        $role          = Role::find($request->role_id);
        $GetPermission = RolePermission::where('role_id',$role->id)
                                         ->where('organization_id',1)
                                         ->where('user_id',1)->get()->pluck('permission_id');

        $PermissionArray      = $GetPermission->toArray();
        $role->permissions()->attach($PermissionArray, ["user_id" => $user->id,"organization_id" => $organization->id]);
        return redirect()->back()->with('message','Role successfully created with Permissions');
    }
    public function ViewOrganization(){
        $getOrganization = QueryBuilder::for(Organization::class)
                ->allowedSorts('name')
                ->get();
        return view('admin.view-organization', compact('getOrganization'));
    }

    public function EditOrganization($id){
        $findOrganization  =  Organization::find($id);
        $findUser          =  User::with('users')->where('organization_id',$id)->first();
        $checkedRole       =  $findUser->users()->first()->toArray();
        $getRole           =  Role::get();
        return view('admin.edit-organization',compact('findOrganization','findUser','getRole','checkedRole')) ;
       }

       public function UpdateOrganization(StoreOrganizationRequest $request, $id){

        $organization           = Organization::find($id);
        $organization->name     = $request->name;
        $organization->save();
       
        $user                   = User::find($request->user_id);
        $user->name             = $request->user_name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->organization_id  = $id;
        $user->save();

        //role attach
        $role          = Role::find($request->role_id);
        $GetPermission = RolePermission::where('role_id',$role->id)
                                         ->where('organization_id',1)
                                         ->where('user_id',1)->get()->pluck('permission_id');
        $PermissionArray      = $GetPermission->toArray();
        $user->roles()->sync($request->role_id, ["permission_id"=>$PermissionArray,"user_id" => $request->user_id,"organization_id" => $id]);
        return redirect()->back()->with('message','Role successfully created with Permissions');
       }

    public function InternalUser(){
         $getOrganization = Organization::get();
         $getRole = Role::get();
         return view('admin.internal-user', compact('getOrganization','getRole'));
    }

    public function CreateInternalUser(StoreUserRequest $request){
        $errors = [
            'name.required'      => 'The name field is required..',
            'email.required'     => 'The email field is required..',
            'password.required'  => 'The password field is required..',
        ];

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ],$errors);

        $user                  =   new User;
        $user->name            = $request->name;
        $user->email           = $request->email;
        $user->password        = Hash::make($request->password);
        $user->organization_id = $request->organization_id;
        $user->save();

        $role                 = Role::find($request->role_id);
        $GetPermission        = RolePermission::where('role_id',$role->id)->get()->pluck('permission_id');
        $PermissionArray      = $GetPermission->toArray();
        $role->permissions()->attach($PermissionArray, ["user_id" => $user->id,"organization_id" => $request->organization_id]);
        return redirect()->back()->with('message','User successfully created with Organization and Role');
    }

    public function ViewInternalUser(){

        $getInternalUser = QueryBuilder::for(User::class)
                        ->allowedFilters(AllowedFilter::exact('name'))
                        ->where('organization_id',1) 
                        ->get();
        return view('admin.view-internal-users',compact('getInternalUser'));
    }

    public function ViewOrganizations(){
        $getOrganization = QueryBuilder::for(Organization::class)
                ->allowedSorts('name')
                ->get();
        return view('admin.view-organizations', compact('getOrganization'));
    }
}
