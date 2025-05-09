<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DomaineRecherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\Chercheur;
class ChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $chercheurs = Auth::user()->chercheur;
        return view('chercheurs.index', compact('chercheurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domaines = DomaineRecherche::all();
        return view('chercheurs.create', compact('domaines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
        'photo' => 'nullable|image|max:2048',
        'biographie' => 'nullable|string',
        'cv' => 'nullable|mimes:pdf|max:2048',
        'google_scholar' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'domaines_recherche_id' => 'required|exists:domaines_recherche,domaines_recherche_id',
        ]);

        // Gestion de l'upload de la photo
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }


    $cvPath = null;
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cvs', 'public');
    }

        // Création du Chercheur
            Chercheur::create([
                'photo' => $photoPath,
                'biographie' => $request->biographie,
                'cv' => $cvPath,
                'google_scholar' => $request->google_scholar,
                'linkedin' => $request->linkedin,
                'users_id' => Auth::id(), // On lie au user connecté
                'domaines_recherche_id' => $request->domaines_recherche_id,
            ]);

        return redirect()->route('chercheur.dashboard')->with('success', 'profil ajouté avec succès.');

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
