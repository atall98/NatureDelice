<?php

// app/Http/Controllers/UtilisateurController.php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    // Affiche tous les utilisateurs
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    // Affiche le formulaire de création d'un utilisateur
    public function create()
    {
        return view('utilisateurs.create');
    }

    // Enregistre un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|min:8',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('utilisateurs.index');
    }

    // Affiche un utilisateur spécifique
    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    // Affiche le formulaire d'édition d'un utilisateur
    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    // Met à jour les informations d'un utilisateur
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'password' => 'nullable|min:8',
        ]);

        $utilisateur->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $utilisateur->password,
        ]);

        return redirect()->route('utilisateurs.index');
    }

    // Supprime un utilisateur
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index');
    }
}

