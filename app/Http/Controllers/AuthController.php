<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. TAMPILKAN FORM LOGIN
    public function showLogin(Request $request)
    {
        $previous = url()->previous();

        if (
            !$request->session()->has('url.intended') &&
            $previous !== route('login') &&
            $previous !== route('register')
        ) {
            $request->session()->put('url.intended', $previous);
        }

        return view('auth.login');
    }

    // 2. PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // 3. TAMPILKAN FORM REGISTER
    public function showRegister(Request $request)
    {
        $previous = url()->previous();

        if (
            !$request->session()->has('url.intended') &&
            $previous !== route('login') &&
            $previous !== route('register')
        ) {
            $request->session()->put('url.intended', $previous);
        }

        return view('auth.register');
    }

    // 4. PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // butuh field password_confirmation di view
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donor'
        ]);

        Auth::login($user);

        return redirect()->intended('dashboard');
    }

    // 5. PROSES LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
