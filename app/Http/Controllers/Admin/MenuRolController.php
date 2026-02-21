<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MenuRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $menus = Menu::getMenu();
        $menusRoles = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();

        return view('admin.menu-rol.index', compact('roles', 'menus', 'menusRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asignó correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se eliminó correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
