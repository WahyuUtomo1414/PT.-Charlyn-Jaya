<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class FrontendAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // super-admin or user id 1 -> /admin
            if ($user->id === 1 || $user->hasRole('super-admin')) {
                return redirect()->intended('/admin');
            }

            // customer -> /penawaran/create
            if ($user->hasRole('customer')) {
                return redirect()->intended('/penawaran/create');
            }

            return redirect()->intended('/penawaran/create');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_tlpn' => ['required', 'string', 'max:18'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_tlpn' => $request->no_tlpn,
            'password' => Hash::make($request->password),
        ]);

        // Auto assign role_id 2 (customer)
        if (method_exists($user, 'assignRole')) {
            $role = Role::findById(2);
            if ($role) {
                $user->assignRole($role);
            }
        }

        Auth::login($user);

        return redirect('/penawaran/create');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
