<?php

use App\Http\Controllers\API\ChercheurControllerApi;
use App\Http\Controllers\API\PublicationControllerApi;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Chercheur;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user',function (LoginRequest $request){
//    return $user = $request->user();

// })->middleware('auth:sanctum');

Route::apiResource('chercheur', ChercheurControllerApi::class);
Route::apiResource('publication', PublicationControllerApi::class);
// Route::apiResource('publication', PublicationControllerApi::class);

Route::post('/register', [ChercheurControllerApi::class, 'register']);
Route::post('login', [ChercheurControllerApi::class, 'login']);
Route::post('logout', [ChercheurControllerApi::class, 'logout']);


?>
