<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationControllerApi extends Controller
{
    public function index(){
        $publication = Publication::all();
        return response()->json($publication, 200);
    }

    public function store(PublicationRequest $request){


        try {

            $requestValid = $request->all();
            DB::beginTransaction();
            $publications = Publication::create(array_merge($requestValid));

            DB::commit();

            return response()->json(["success" => "Publication enregistrer avec success", "Publication" => $publications  , 200]);
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json(["Error" => "Erreur l'ors de l'enregistrement d'une publication"  . $th->getMessage(), 500]);

        }
    }



    public function show(Publication $publication){
        return response()->json($publication, 200);
    }



    public function update(Publication $publication, PublicationRequest $request){
        try {

            $requestValid = $request->all();
            DB::beginTransaction();
            $publication->update(array_merge($requestValid));

            DB::commit();

            return response()->json(["success" => "Publication mis à jour avec success", "Publication" => $publication  , 200]);
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json(["Error" => "Erreur l'ors de la mise à jour d'une publication"  . $th->getMessage(), 500]);

        }
    }

    public function destroy($id){

        try {

            DB::beginTransaction();
            // $publication = Publication::findOrFail($id);
           Publication::destroy($id);

            DB::commit();
            return response()->json(["success" => "Publication supprimée avec succès"], 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => "Une erreur est survenue lors de la suppression de la publication : " . $th->getMessage()], 500);
        }

    }



}
