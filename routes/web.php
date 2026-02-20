<?php

use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // rutas para los menúes
    Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::get('/admin/menus/{id}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::get('/admin/menus/{id}/destroy', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
    Route::post('/admin/menus/guardar-orden', [MenuController::class, 'guardarOrden'])->name('admin.menus.guardar_orden');

    // rutas para roles
    Route::get('/admin/roles', [RolController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [RolController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles', [RolController::class, 'store'])->name('admin.roles.store');
    Route::get('/admin/roles/{id}/edit', [RolController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/admin/roles/{id}', [RolController::class, 'update'])->name('admin.roles.update');
    Route::delete('/admin/roles/{id}', [RolController::class, 'destroy'])->name('admin.roles.destroy');

    // rutas para las configuraciones
    Route::get('/admin/institutions', [ConfigurationController::class, 'index'])->name('admin.institutions.index');

});
