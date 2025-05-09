<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chercheur;

class AdminController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        $chercheurs = Chercheur::with('user')->get();
        return view('admin.dashboard',  compact('utilisateurs', 'chercheurs')); // On retournera la vue admin/dashboard.blade.php
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate(['role' => 'required|string']);
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Rôle mis à jour.');
    }
}
