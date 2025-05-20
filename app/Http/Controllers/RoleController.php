<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->with('Permissions')->paginate(5);
        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
     
    public function create()
    {
        $permissions = Permission::get();
        return view('pages.roles.create', compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $permissionId = array_map('intval', $request->input('permission'));
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionId);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissoes = Permission::all();
        $role = Role::with('permissions')->find($id);
        $rolePermissoes = $role->permissions->pluck('id')->all();
        return view('pages.roles.edit', compact('role', 'permissoes', 'rolePermissoes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionId = array_map('intval', $request->input('permission'));
        $role->syncPermissions($permissionId);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        $role = Role::find($id)->delete();
        return redirect()->back();
    }
}



