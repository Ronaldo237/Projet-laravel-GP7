<?php

namespace App\Http\Controllers;

use App\Models\Projets_Recherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Recherche extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projet_recherche = Projets_Recherche::with('chercheur')->get();
        $user = Auth::user();
        $chercheurs = $user->chercheur;
        $mes_projet_recherche = Projets_Recherche::where('chercheurs_id', $chercheurs->chercheurs_id)->get();
        return view('projetrecherche.index', compact('chercheurs', 'mes_projet_recherche'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projetrecherche.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'financement' => 'nullable|string|max:255',
            'etat' => 'required|in:En cours,Terminé,Suspendu',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'equipe_recherche' => 'nullable|string',
        ]);

        // Récupération du chercheur lié à l'utilisateur connecté
        $chercheur = Auth::user()->chercheur;

        // Vérifie si l'utilisateur a un profil chercheur
        if (!$chercheur) {
            return redirect()->back()->withErrors(['message' => 'Vous devez avoir un profil chercheur pour enregistrer un projet.']);
        }

        // Création du projet
        Projets_Recherche::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'financement' => $request->financement,
            'etat' => $request->etat,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'equipe_recherche' => $request->equipe_recherche,
            'chercheur_id' => $chercheur->chercheurs_id, // ou 'id' selon ton nom de clé primaire
        ]);

        return redirect()->route('recherche.index')->with('success', 'Projet de recherche enregistré avec succès.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
