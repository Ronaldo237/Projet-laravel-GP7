<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthControllerApi extends Controller
{
    public function register(){
        return 'register';
    }

    public function login(){
        return 'login';
    }

    public function logout(){
        return 'logout';
    }
}
