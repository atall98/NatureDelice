<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Affiche la liste des catégories.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle catégorie.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->only(['name', 'description']));

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Affiche les détails d'une catégorie spécifique.
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Affiche le formulaire de modification d'une catégorie existante.
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Met à jour une catégorie existante.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie->update($request->only(['name', 'description']));

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
