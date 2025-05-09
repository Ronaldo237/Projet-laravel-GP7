<?php

use App\Http\Controllers\ChercherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\ChercheurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\Recherche;

// Dashboard (protégé par auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/', function () {return view('index');})->name('home');

Route::get('/projet/recherche', [Recherche::class, 'index'])->name('projet.recherche');
Route::get('/projet/recherche/create', [Recherche::class, 'create'])->name('create.recherche');
Route::get('/create/recherche', [Recherche::class, 'store'])->name('recherche.store');



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


// Affiche le formulaire d'inscription
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Affiche le formulaire de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Déconnexion
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/page/chercheurs', [ChercheurController::class, 'index'])->name('chercheurs.index');
Route::get('/chercheurs/create', [ChercheurController::class, 'create'])->name('chercheurs.create');
Route::get('/chercheurs/{id}/edit', [ChercheurController::class, 'edit'])->name('chercheurs.edit');
Route::put('/chercheurs/{id}', [ChercheurController::class, 'update'])->name('chercheurs.update');

Route::middleware(['auth'])->group(function () {
    Route::post('/profil/chercheurs', [ChercheurController::class, 'store'])->name('chercheurs.store');
});


// Admin Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/update-role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
});

// Chercheur Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/chercheur/dashboard', [ChercheurController::class, 'index'])->name('chercheur.dashboard');
});

// Visiteur Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/visiteur/dashboard', [VisiteurController::class, 'index'])->name('visiteur.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
