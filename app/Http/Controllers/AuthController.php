<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
    'name' => 'required',
    'username' => 'required|unique:users,username',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6|confirmed'
]);

        $user = User::create([
    'name' => $request->name,
    'username' => $request->username, // ✅ IMPORTANT
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
