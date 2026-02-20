<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles'
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();

        return redirect('/admin/roles')->with('mensaje', 'Rol creado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $id
        ]);

        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();

        return redirect('/admin/roles')->with('mensaje', 'Rol actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();

        return redirect('/admin/roles')->with('mensaje', 'Rol eliminado con éxito.');
    }
}
