<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche tous les users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Affiche le formulaire de création d'un user
    public function create()
    {
        return view('users.create');
    }

    // Enregistre un nouvel user
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }

    // Affiche un user spécifique
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Affiche le formulaire d'édition d'un user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Met à jour les informations d'un user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index');
    }

    // Supprime un user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

