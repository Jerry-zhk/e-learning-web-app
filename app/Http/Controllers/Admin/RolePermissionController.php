<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RolePermissionController extends Controller
{

    public function roleIndex(){
        $roles = Role::get();
        return view('admin.role-permission.role-index', compact('roles'));
    }

    public function roleShow(Role $role){
        return view('admin.role-permission.role-details', compact('role'));
    }

    public function roleCreate(){
        $permissions = Permission::get();
        return view('admin.role-permission.role-create', compact('permissions'));
    }

    public function roleStore(Request $request){
        $validatedData = $request->validate([
            'display_name' => 'required|string|max:50|unique:roles,display_name',
            'name' => 'required|string|max:50|unique:roles,name',
            'description' => 'required|string|max:191',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $role = new Role();
        $role->display_name = $validatedData['display_name'];
        $role->name = $validatedData['name'];
        $role->description = $validatedData['description'];
        $role->save();
        if(!empty($validatedData['permissions']))
            $role->syncPermissions($validatedData['permissions']);
        return redirect()->route('role.index');
    }

}
