<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class HomeController extends Controller
{
    //

    public function Users(){
        $getUsers = User::get();
        $getRoles  = Role::get();
        return view("create_users", compact('getUsers','getRoles'));
    }

    public function createUser(Request $request){
        $user = User::find($request->user_id);	
        $role = $request->role;
        $user->roles()->attach($role);
        return redirect()->back()->with('message','users successfully created with roles');
    }

    public function viewUsers(){
        $user = User::with('roles')->get();	
        return view('view_users',compact('user'));
    }

    public function Roles(){
        $getRoles = Role::get();
        $getUsers  = User::get();
        return view("create_roles", compact('getUsers','getRoles'));
    }

    public function createRoles(Request $request){
        $role = Role::find($request->role_id);	
        $user = $request->user;
        $role->users()->attach($user);
        return redirect()->back()->with('message','roles successfully created with users');
    }

    public function viewRoles(){
        $role = Role::with('users')->get();	
        return view('view_roles',compact('role'));
    }
}
