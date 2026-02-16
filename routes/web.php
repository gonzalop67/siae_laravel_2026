<?php

use App\Http\Controllers\Admin\ConfigurationController;
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
});

// rutas para las configuraciones
Route::get('/admin/institutions', [ConfigurationController::class, 'index'])->name('admin.institutions.index')->middleware('auth');

