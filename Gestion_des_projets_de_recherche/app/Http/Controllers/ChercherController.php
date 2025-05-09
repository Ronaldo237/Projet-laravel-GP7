<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChercheurRequest;
use App\Models\Chercheur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChercherController extends Controller
{
    public function create()
    {

        $domaines_recherche = DB::table('domaines_recherche')->get();
        $user = DB::table('users')->get();
        return view('Chercheurs.create', compact('domaines_recherche', 'user'));
    }

    public function store(ChercheurRequest $request)
    {

        try {

            $requestvalid = $request->validated();
            DB::beginTransaction();
            Chercheur::created($requestvalid);
            DB::commit();

            return redirect('Chercheurs.show')->with('success', 'Chercheur Enregistrer avec success');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back(500)->with('echec', 'Echec lors de l\'enregistrement d\'un chercheur');
        }
    }

    public function show()
    {
        $chercheurs = Chercheur::with('user')->get();
        return view('Chercheurs.show', compact('chercheurs'));
    }


    public function destroy(string $id)
    {
        Chercheur::destroy($id);
        return redirect()->route("Chercheurs.show");
    }

}
