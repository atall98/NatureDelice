<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Récupérer l'ID de la catégorie 'fruit'
    $fruitCategoryId = Categorie::where('name', 'fruit')->first()->id;

    // Récupérer les articles associés à cette catégorie
    $articles = Article::where('categorie_id', $fruitCategoryId)->get();

    return view('welcome', compact('articles'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategorieController::class);
    Route::put('/categories/{category}', [CategorieController::class, 'update'])->name('categories.update');




    Route::resource('clients', ClientController::class);
    Route::resource('utilisateurs', UtilisateurController::class);

    Route::prefix('commandes')->name('commandes.')->group(function () {
        Route::get('/', [CommandeController::class, 'index'])->name('index');
        Route::post('/', [CommandeController::class, 'store'])->name('store');
        Route::get('panier', [CommandeController::class, 'panier'])->name('panier');
        Route::get('show/{id}', [CommandeController::class, 'show'])->name('show');
        Route::post('valider', [CommandeController::class, 'valider'])->name('valider');
    });
});

require __DIR__ . '/auth.php';
