<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DomaineRecherche;
use Illuminate\Http\Request;
use  App\Models\Chercheur;
class ChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chercheurs = Chercheur::with('user')->get();
        return view('chercheurs.index', compact('chercheurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $domaines = DomaineRecherche::all();

    return view('chercheurs.create', compact('users', 'domaines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'photo' => 'nullable|image|max:2048',
            'biographie' => 'required|string',
            'specialisation' => 'required|string|max:255',
            'lien_google_scholar' => 'nullable|url',
            'lien_linkedin' => 'nullable|url',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $chercheur = new Chercheur();
        $chercheur->user_id = 1; // User prédéfini
        $chercheur->domaine_recherche_id = 2; // Domaine prédéfini

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $chercheur->photo = $photoPath;
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
            $chercheur->cv = $cvPath;
        }

        $chercheur->biographie = $request->biographie;
        $chercheur->specialisation = $request->specialisation;
        $chercheur->lien_google_scholar = $request->lien_google_scholar;
        $chercheur->lien_linkedin = $request->lien_linkedin;

        $chercheur->save();

        return redirect()->route('chercheurs.index')->with('success', 'Chercheur ajouté avec succès.');

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
