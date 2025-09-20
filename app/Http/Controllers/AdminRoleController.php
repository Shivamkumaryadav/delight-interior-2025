<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminRoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Roles/Index',[
            'roles' => AdminRoleResource::collection( Role::latest()->paginate(10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|min:3|string'
        ]);

        Role::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Role has been created.');
        return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
         return Inertia::render('Admin/Roles/Edit',[
            'role' => new AdminRoleResource($role)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|min:3|string|unique:roles,name,' . $role->id
        ]);

        $role->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Role has been updated.');
        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', 'Role has been deleted.');
        return to_route('admin.roles.index');
    }
}
