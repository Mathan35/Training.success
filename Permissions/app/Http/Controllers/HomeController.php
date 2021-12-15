<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Auth;
use App\helpers\General;

class HomeController extends Controller
{
    use General;

    public function Home(){
        if(Auth::check()){
            $roleCheck = $this->findUser();        
            $user  = User::find(auth()->user()->id);
            $check  = collect($user->roles)->toArray();
            if(!empty($check)){
                $permissions = [];
                foreach ($user->roles as $key => $data)  {
                    foreach ($data->permissions as $key => $value) {
                        $permissions[] = $value;
                    }
                }  
                $collection  = collect($permissions)->pluck('name')->toArray();
             }
            else{
                    $collection = null;
                }
                    return view('welcome', compact('roleCheck','user', 'collection'));
        }
        else{
            $collection = null;
            return view('welcome',compact('collection'));
        }
    }
    public function Dashboard(){
         return view('dashboard');
    }

    public function viewRolesPermissions(){
        $roleCheck = $this->findUser();        
        $role      = Role::with('permissions')->get();	
        return view('permission.view-roles-permission',compact('role','roleCheck'));
    }
    public function Users(){
        $roleCheck = $this->findUser();        
        $getRoles  = Role::get();
        return view('permission.users', compact('getRoles','roleCheck'));
    }
    public function createUsers(Request $request){
 
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

        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user  = User::find(User::latest('id')->first()->id);
        $role  = $request->role_id;
        $user->roles()->attach($role);
        return redirect()->back()->with('message','User successfully created with Roles');
    }
    public function editUsers($id){
        $roleCheck    = $this->findUser(); 
        $user         = User::find($id);
        $getRoles     = Role::get();
        $checkedRoles = collect($user->roles)->pluck('id')->toArray();
        return view('permission.edit-users', compact('user','getRoles','roleCheck', 'checkedRoles'));
    }
    public function updateUsers(Request $request, $id){
        $user         = User::find($id);
        $user->roles()->sync($request->role_id);
        return redirect()->back()->with('message','User Roles successfully updated');

    }

    public function Roles(){
        $roleCheck = $this->findUser(); 
        $getPermission = Permission::get();
        return view('permission.roles', compact('roleCheck', 'getPermission'));
    }
    public function createRoles(Request $request){
 
        $errors = [
            'name.required' => 'The Role Name field is required..',
        ];
        $request->validate([
            'name'         => 'required',
        ],$errors);

        $role           = new Role;
        $role->name     = $request->name;
        $role->save();
        $roleCheck = $this->findUser(); 
        $rolet       = Role::find(Role::latest('id')->first());	
        $permission = $request->permission_id;
        $role->permissions()->attach($permission);
        return redirect()->back()->with('message','Roles successfully created and Permission Assigned');   


    }
    public function editRoles($id){
        $role = Role::find($id);
        $getPermissions  = Permission::get();
        $checkedPermissions = collect($role->permissions)->pluck('id')->toArray();
        $roleCheck = $this->findUser();        
        return view('permission.edit-roles', compact('role','roleCheck','getPermissions','checkedPermissions'));
    }
    public function updateRoles(Request $request, $id){
        $errors = [
            'name.required' => 'The Role Name field is required..',
        ];
        $request->validate([
            'name'         => 'required',
        ],$errors);

        $role           = Role::find($id);
        $role->name     = $request->name;
        $role->save();
        $roleCheck = $this->findUser(); 
        $rolet       = Role::find($id);	
        $permission = $request->permission_id;
        $role->permissions()->sync($permission);
        return redirect()->back()->with('message','Roles successfully updated with Permission');  
    }

    public function viewRoles(){
        $role = Role::get();
        $roleCheck = $this->findUser();        
        return view('permission.view-roles',compact('role','roleCheck'));
    }
    

    public function userRoles(){
        $roleCheck = $this->findUser();        
        $user      = User::get();
        $role      = Role::get();  
        return view('permission.user-roles', compact('user','role', 'roleCheck'));
    }

    public function createUserRoles(Request $request){
        $user  = User::find($request->user);	
        $role  = $request->role_id;
        $user->roles()->attach($role);
        return redirect()->back()->with('message','User successfully created with Roles');
    }
    public function viewRolesUsers(){
        $roleCheck = $this->findUser();        
        $user      = User::with('roles')->get();	
        return view('permission.view-users',compact('user', 'roleCheck'));
    }
}
