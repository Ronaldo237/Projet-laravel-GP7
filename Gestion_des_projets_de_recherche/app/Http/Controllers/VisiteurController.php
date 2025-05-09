<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function index()
    {
        return view('visiteur.dashboard'); // Vue visiteur/dashboard.blade.php
    }
}
