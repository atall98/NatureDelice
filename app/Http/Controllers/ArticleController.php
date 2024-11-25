<?php

// app/Http/Controllers/ArticleController.php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Afficher la liste des articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    

    // Afficher le formulaire de création d'un article
    public function create()
    {
        $categories = Categorie::all();  // Liste des catégories
        return view('articles.create', compact('categories'));
    }

    // Sauvegarder un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
        }

        Article::create([
            'titre' => $request->titre,
            'image' => $imagePath,
            'categorie_id' => $request->categorie_id,
            'prix' => $request->prix,
            'description' => $request->description,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès');
    }

    // Afficher le formulaire d'édition d'un article
    public function edit(Article $article)
    {
        $categories = Categorie::all();  // Liste des catégories
        return view('articles.edit', compact('article', 'categories'));
    }

    // Mettre à jour un article existant
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
        }

        $article->update([
            'titre' => $request->titre,
            'image' => $imagePath,
            'categorie_id' => $request->categorie_id,
            'prix' => $request->prix,
            'description' => $request->description,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

    // Afficher les détails d'un article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Supprimer un article
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}

