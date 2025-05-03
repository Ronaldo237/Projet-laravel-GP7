<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChercheurRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Chercheur;
use Illuminate\Http\Request;

class ChercheurControllerApi extends Controller
{
    public function index(){
       $chercheurs = Chercheur::all();
        return response()->json($chercheurs, 200);
    }

    public function store(ChercheurRequest $request){

        try {

            $requestvalid = $request->all();

            DB::beginTransaction();
            $Chercheur = Chercheur::create(array_merge($requestvalid));


            return response()->json(['success' => 'Chercheur enregistrer avec success', "chercheur" => $Chercheur],200);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["error" => "Une erreur est survenue lors de l'enregistrement de ce chercheur : " . $th->getMessage()], 500);
        }
    }

    public function update(ChercheurRequest $request, Chercheur $Chercheur){
        try {

            $requestvalid = $request->all();

            DB::beginTransaction();
            $Chercheur = Chercheur::update(array_merge($requestvalid));
            return response()->json(["success" => "Chercheur mis à jour avec succès", "chercheur" => $Chercheur], 200);

        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json(["error" => "Une erreur est survenue lors de la mise à jour de ce Chercheur : " . $th->getMessage()], 500);

        }
    }

    public function show(Chercheur $chercheur){
        return response()->json($chercheur, 200);
    }

    public function delete($id){
       try {
            $chercheur = Chercheur::findOrFail($id);
            $chercheur->delete();
            return response()->json(["success" => "Étudiant supprimé avec succès", 200]);
       } catch (\Throwable $th) {
            return response()->json(["error" => "Une erreur est survenue lors de la suppression : " . $th->getMessage()], 500);
       }
    }







}
