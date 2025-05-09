<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Redirection basée sur le rôle

        if (!session()->has('user_id')) {
            return redirect()->route('login')->withErrors(['email' => 'Utilisateur non trouvé.']);
        }
            $user = User::find(session('user_id'));
            $role = $user->role;

            if ($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'chercheur') {
                return redirect()->route('chercheur.dashboard');
            } else {
                return redirect()->route('visiteur.dashboard');
            }


        //return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
