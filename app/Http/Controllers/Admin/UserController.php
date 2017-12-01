<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class UserController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->middleware('role:superadmin|admin');
        $this->middleware('permission:user-role-perm-update', ['only' => ['edit', 'roleUpdate', 'permissionUpdate']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword') && trim($request->input('keyword')) != '') {
            $users = User::MatchKeyword($request->input('keyword'))->paginate(15);
        }else{
            $users = User::paginate(15);
        }

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.user.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRoles = $user->roles->pluck('id')->toArray();
        $permissions = Permission::get();
        $userPermissions = $user->permissions->pluck('id')->toArray();
        return view('admin.user.settings', compact(['user','roles', 'userRoles', 'permissions', 'userPermissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function roleUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id'
        ]);

        if (empty($validatedData['roles'])){
            $user->roles()->detach();
        } else {
            $user->syncRoles($validatedData['roles']);
        }   
        return redirect()->route('user.edit', ['user'=>$user->id]);
    }

    public function permissionUpdate(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);
        
        if (empty($validatedData['permissions'])){
            $user->permissions()->detach();
        } else {
            $user->syncPermissions($validatedData['permissions']);
        }   
        return redirect()->route('user.edit', ['user'=>$user->id]);
    }
}
