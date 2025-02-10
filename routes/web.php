<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NiveauScolaireController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// routes/web.php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/niveau-scolaire', [NiveauScolaireController::class, 'index'])->name('niveau-scolaire.index');
    Route::post('/niveau-scolaire/store', [NiveauScolaireController::class, 'store'])->name('niveauScolaire.store');

    // Route pour afficher le formulaire d'édition (si vous souhaitez une page dédiée)
    Route::get('/niveau-scolaire/{niveauScolaire}/edit', [NiveauScolaireController::class, 'edit'])->name('niveauScolaire.edit');

    // Route pour la mise à jour (méthode PUT)
    Route::put('/niveau-scolaire/{niveauScolaire}', [NiveauScolaireController::class, 'update'])->name('niveauScolaire.update');
    Route::delete('/niveau-scolaire/{niveauScolaire}', [NiveauScolaireController::class, 'destroy'])->name('niveauScolaire.destroy');

    Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';