<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Afficher la liste des personnes
    public function index()
    {
        $people = Person::all();  // Récupérer toutes les personnes
        return view('people.index', compact('people'));
    }

    // Afficher une personne spécifique
    public function show($id)
    {
        $person = Person::with(['parents', 'children', 'createdBy'])->findOrFail($id); // Récupérer la personne avec ses parents et enfants
        return view('people.show', compact('person'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('people.create');
    }

    // Enregistrer une nouvelle personne
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_name' => 'nullable|max:255',
            'middle_names' => 'nullable|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        // Créer une nouvelle personne
        Person::create([
            'created_by' => auth()->id(), // L'ID de l'utilisateur connecté
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_name' => $request->birth_name,
            'middle_names' => $request->middle_names,
            'date_of_birth' => $request->date_of_birth,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('people.index')->with('success', 'Personne créée avec succès!');
    }
}

