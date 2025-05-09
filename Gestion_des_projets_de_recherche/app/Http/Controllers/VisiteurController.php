<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiteurController extends Controller
{
    public function index()
    {
        $publication = DB::table('Publications')->get();
        return view('Publications.show',compact('publication'));
    }
}
