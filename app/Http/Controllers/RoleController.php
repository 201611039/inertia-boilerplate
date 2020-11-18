<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Inertia\Inertia;
use App\Models\Permission;
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
        $this->authorize('role-view');

        return Inertia::render('Role/List', [
            'roles' => Role::where('id', '!=', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role-create');

        return Inertia::render('Role/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('role-create');

        $request->validate([
            'name' => ['required', 'string', 'unique:roles']
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        $request->session()->flash('message', 'Role created successfully');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('role-grant-permission');

        $permissions = Permission::all();
        $permissions = $permissions
        ->groupBy(function ($item, $key) {
            return str_before($item['name'], '-', 0);
        })->sortKeys();

        return Inertia::render('Role/GrantPermission', [
            'role' => $role,
            'permissions' => $permissions,
            'oldInputs' => $role->permissions->pluck('id')
        ]);
    }

    public function grantPermission(Request $request, Role $role)
    {
        $this->authorize('role-grant-permission');

        $permissions = Permission::whereIn('id', collect($request->ids))->get()->pluck('name');

        $role->syncPermissions($permissions);
        $roleName = title_case($role->name);

        $request->session()->flash('message', "$roleName permissions set successfully");
        return redirect()->route('role.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('role-edit');

        return Inertia::render('Role/Edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('role-edit');

        $request->validate([
            'name' => ['required', 'string', "unique:roles,name,$role->id,id"]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $request->session()->flash('message', 'Role updated successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
        $this->authorize('role-delete');

        $role->delete();
        $request->session()->flash('message', 'Role deleted successfully');
        return redirect()->route('role.index');
    }
}
