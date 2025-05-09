<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');
        }



    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valider les entrées
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenter l'authentification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'chercheur') {
                return redirect()->route('chercheur.dashboard');
            } elseif ($user->role === 'visiteur') {
                return redirect()->route('visiteur.dashboard');
            } else {
                // En cas d'erreur ou rôle inconnu
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Votre rôle est invalide. Contactez l\'administrateur.',
                ]);
            }
        }

        // Sinon, retour avec erreur
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->route('logout')->with('success', 'User deconnecté avec succès.');

    }
}
