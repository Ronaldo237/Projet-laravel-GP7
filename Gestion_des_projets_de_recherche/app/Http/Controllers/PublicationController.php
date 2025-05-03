<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Publication;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    public function create()
    {
        $domaines_recherche = DB::table('domaines_recherche')->get();
        $auteurs = DB::table('chercheurs')->get();
        $publication = DB::table('publications')->get();
        return view('Publications.post',compact('domaines_recherche','auteurs','publication'));
    }

public function store(PublicationRequest $request){


    try {

        $requestvalid = $request->validated();
        $publication =  new Publication();

        DB::beginTransaction();
        Publication::create($requestvalid);
        DB::commit();
       // $publication = Publications::all();

        return redirect('Publications.show')->with('success','Enregistrement reuissi');

    } catch (\Throwable $th) {

       DB::rollBack();
       return back()->with('echec', 'Echec lors de l\'enregistrement');

    }


}

public function show(){

    $publication = DB::table('Publications')->get();
    return view('Publications.show',compact('publication'));

}

public function put($id){
    $publication = DB::table('publications')->where('publications_id',$id)->first();
    // $domaines_recherche = DB::table('domaines_recherche')->get();
    // $auteurs = DB::table('chercheurs')->get();
    return view('Publications.update',compact('publication','domaines_recherche','auteurs'));
}

public function destroy($id){

     try {
            DB::beginTransaction();
            Publication::destroy($id);
            DB::commit();
            return redirect()->with('success', 'Publication Supprimer avec success');
     } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Echec lors de la suppression d\'une publication ');
     }

}



}
