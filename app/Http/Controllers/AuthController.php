<?php

namespace App\Http\Controllers;

use App\Models\Admin\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        $setting = Setting::where('id', 1)->first();
        return view('auth.login', compact('setting'));
    }

    // Handle login post
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Seteo las variables de session
            // Array de nombres
            $roles = Auth::user()->roles->pluck('name')->toArray();
            // Array de IDs
            $roleIds = Auth::user()->roles->pluck('id')->toArray();
            $user = new User;
            $user->setSession($roles, $roleIds);
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
