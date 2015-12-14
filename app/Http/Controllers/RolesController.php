<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('authorization:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $roles, User $users)
    {
        $roles = $roles->with('users')->paginate(15);
        $usersWithoutRoles = $users->whereRoleId(null)->get();

        return view('roles.index', compact('roles', 'usersWithoutRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Role $role, Request $request)
    {
        $this->validate($request, [
            'role'        => 'required|min:3|max:80',
            'description' => 'min:8|max:480',
            ]);
        
        $role->create($request->all());

        return redirect()->route('admin.roles.index')
            ->withSuccess("The role $role->role was created...");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'role'        => 'required|min:3|max:80',
            'description' => 'min:8|max:480',
            ]);
        
        $role->update($request->all());

        return redirect()->route('admin.roles.index')
            ->withInfo("The role $role->role was updated...");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Set role to null for each user
        foreach ($role->users as $user) {
            $user->role_id = null;
            $user->save();
        }

        //destroy the role
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->withWarning("The Role $role->role has been removed!");
    }

    public function detatchUser($user, $role, User $users, Role $roles)
    {
        $user = $users->findOrFail($user);
        $role = $roles->findOrFail($role);

        $user->role_id = null;
        $user->save();

        return redirect()->route('admin.roles.index')
            ->withSuccess("User $user->name no longer has the role $role->role.");
    }
}
