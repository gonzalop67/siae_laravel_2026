<?php

namespace App\Http\Controllers;

use App\Models\Admin\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        $configuration = Configuration::where('id', 1)->first();
        return view('auth.login', compact('configuration'));
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
