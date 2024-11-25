<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\OrderConfirmationMail;
use App\Models\Categorie; // Import du modèle Categorie
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    // Afficher les articles en fonction des catégories
    public function index()
    {
        // Récupérer les catégories avec leurs articles
        $categories = Categorie::with('articles')->get();

        return view('commandes.index', compact('categories'));
    }

    // Ajouter un article au panier
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantite' => 'required|integer|min:1',
            
        ]);
    
        $article = Article::findOrFail($request->article_id);
        $quantite = $request->quantite;
    
        // Vérifier si le panier existe déjà dans la session
        $panier = session()->get('panier', []);
    
        // Ajouter l'article au panier ou mettre à jour la quantité si l'article est déjà présent
        if (isset($panier[$article->id])) {
            $panier[$article->id]['quantite'] += $quantite;
        } else {
            $panier[$article->id] = [
                'article' => $article,
                'quantite' => $quantite,
                'prix' => $article->prix
            ];
        }
    
        // Sauvegarder le panier dans la session
        session()->put('panier', $panier);
    
        // Enregistrer dans la base de données (table Commande)
        Commande::create([
            'session_id' => session()->getId(),
            'article_id' => $request->article_id,
            'quantite' => $quantite,
            'nom_client' => $request->nom_client,
            'numero_client' => $request->numero_client,
            'adresse_client' => $request->adresse_client,
            'status' => 'en cours',
        ]);
    
        return redirect()->route('commandes.index')->with('success', 'Article ajouté au panier !');
    }
    



    // Afficher le panier

    public function panier()
{
    // Récupérer les articles du panier depuis la session
    $commandes = Commande::where('session_id', session()->getId())->get();
    $categories = Categorie::all();

    return view('commandes.panier', compact('commandes', 'categories'));
}

    


    // Afficher les détails d'une commande
    public function show($id)
    {
        $commande = Commande::with('articles')->findOrFail($id);
        $commande->total = $commande->articles->sum(function ($article) {
            return $article->pivot->quantite * $article->prix;
        });

        return view('commandes.show', compact('commande'));
    }

    // Valider la commande
    public function valider(Request $request)
{
    // Récupérer les commandes du panier
    $commandes = Commande::where('session_id', session()->getId())->get();

    // Vérifier si le panier est vide
    if ($commandes->isEmpty()) {
        return redirect()->route('commandes.index')->with('error', 'Votre panier est vide.');
    }

    // Préparer les données pour l'e-mail
    $detailsCommande = [
        'articles' => $commandes,
    ];

    // Envoi de l'e-mail
    try {
        Mail::to('tall20aly@gmail.com')->send(new OrderConfirmationMail($detailsCommande));
    } catch (\Exception $e) {
        return redirect()->route('commandes.index')->with('error', 'Erreur lors de l\'envoi de l\'email de confirmation.');
    }

    // Supprimer les commandes liées à la session
    Commande::where('session_id', session()->getId())->delete();

    // Retourner avec un message de succès
    return redirect()->route('clients.create')->with('success', 'Votre commande a été validée et un e-mail de confirmation a été envoyé.');
}

    

    



}
