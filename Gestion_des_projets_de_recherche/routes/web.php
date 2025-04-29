<?php

use App\Http\Controllers\ChercherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
})->name('home');  


Route::get('/create/publication', [PublicationController::class, 'create'])->name('create.publication');
Route::post('/create/publication', [PublicationController::class, 'store'])->name('create.publication');
Route::get('/list/publication', [PublicationController::class, 'show'])->name('show.publication');
Route::get('/update/publication/{id}', [PublicationController::class, 'put'])->name('put.publication');
Route::put('/update/publication/{id}', [PublicationController::class, 'update'])->name('put.publication');
Route::delete('/delete/publication/{id}', [PublicationController::class, 'destroy'])->name('delete.publication');
// Route::post('/create/publication', [PublicationController::class, 'store'])->name('store.publication');

Route::get('/create/chercheur', [ChercherController::class, 'create'])->name('create.chercheur');
Route::post('/create/chercheur', [ChercherController::class, 'store'])->name('create.chercheur');
Route::get('/list/chercheur', [ChercherController::class, 'show'])->name('show.chercheur');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
