<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Afficher la liste des catégories
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    // Afficher le formulaire de création d'une catégorie
    public function create()
    {
        return view('categories.create');
    }

    // Sauvegarder une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categorie::create(['name' => $request->name]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    // Afficher les détails d'une catégorie
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    // Afficher le formulaire d'édition d'une catégorie
    public function edit($id)
{
    $categorie = Categorie::findOrFail($id);
    return view('categories.edit', compact('categorie'));
}


    // Mettre à jour une catégorie
    public function update(Request $request, Categorie $categorie)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Mise à jour de la catégorie
    $updated = $categorie->update(['name' => $request->name]);

    // Vérifier si la mise à jour a réussi
    if ($updated) {
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    } else {
        return back()->with('error', 'La mise à jour de la catégorie a échoué.');
    }
}

    

    // Supprimer une catégorie
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
