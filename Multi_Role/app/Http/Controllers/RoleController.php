<?php

namespace App\Http\Controllers;
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

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRole = QueryBuilder::for(Role::class)
        ->allowedIncludes(['permissions'])
        ->allowedFilters(['name'])
        ->get();
        return view('admin.view-roles', compact('getRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getPermission = Permission::get();
        return view('admin.role', compact('getPermission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role                   = new Role;
        $role->name             = $request->name;
        $role->organization_id  = 1;
        $role->save();
       
        //role attach
        $roles  = $request->permission_id;
        $role->permissions()->attach($roles,["user_id" => 1,"organization_id" => 1]);
        return redirect()->back()->with('message','Role successfully created with Permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role               = Role::find($id);
        $getPermissions     = Permission::get();
        $checkedPermissions = collect($role->getPermissions)->pluck('id')->toArray();
        return view('admin.edit-role', compact('role','getPermissions','checkedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, $id)
    {
        $role           = Role::find($id);
        $role->name     = $request->name;
        $role->save();

        $permission     = $request->permission_id;
        $role->getPermissions()->sync($permission);
        return redirect()->back()->with('message','Roles successfully updated with Permission'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
