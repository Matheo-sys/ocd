<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirige la page d'accueil vers la page des personnes
Route::get('/', function () {
    return redirect()->route('people.index');
});

// Routes protégées par le middleware 'auth' (pour être connecté)
Route::middleware(['auth'])->group(function () {
    
    // Affiche la liste des personnes
    Route::get('/people', [PersonController::class, 'index'])->name('people.index');
    
    // Affiche le formulaire de création d'une nouvelle personne
    Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
    
    // Enregistre une nouvelle personne dans la base de données
    Route::post('/people', [PersonController::class, 'store'])->name('people.store');
    
    // Affiche une personne spécifique avec ses parents et enfants
    Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
});

// Authentification (connexion, inscription, etc.)
Auth::routes();  // Ceci génère toutes les routes nécessaires pour l'authentification

// Route d'exemple pour la page d'accueil 
Route::get('/home', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
