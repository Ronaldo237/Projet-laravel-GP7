<?php
use App\Http\Controllers\ChercheurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/chercheurs', [ChercheurController::class, 'index'])->name('chercheurs.index');

Route::get('/chercheurs/create', [ChercheurController::class, 'create'])->name('chercheurs.create');
//Route::resource('chercheurs', ChercheurController::class);
Route::post('/chercheurs', [ChercheurController::class, 'store'])->name('chercheurs.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
