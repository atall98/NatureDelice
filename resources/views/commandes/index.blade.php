<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <style>
        .navbar {
            display: flex;
            background-color: #4CAF50;
            padding: 10px;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            color: white;
            font-size: 24px;
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #ffdd57;
        }

        .categories-buttons {
            margin: 20px 0;
            text-align: center;
        }

        .categories-buttons a {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
            display: inline-block;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .categories-buttons a:hover {
            background-color: #45a049;
        }

        .panier-button {
            background-color: #ffdd57;
            color: black;
            border: none;
            padding: 8px 15px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .panier-button:hover {
            background-color: #ffc107;
        }

        .categorie {
            margin: 20px 0;
        }

        .categorie h2 {
            color: #4CAF50;
        }

        .article {
            display: inline-block;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            width: 200px;
        }

        .article img {
            width: 100%;
            height: 20vh;
        }

        .search-button,
        .back-to-index-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .search-button:hover,
        .back-to-index-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <h1>Gestion de Fruits</h1>

        <!-- Boutons pour les catégories -->
        <div class="categories-buttons">
            @foreach ($categories as $categorie)
                <a href="#categorie_{{ $categorie->id }}">{{ $categorie->name }}</a>
            @endforeach
        </div>

        <!-- Formulaire de recherche -->
        <form action="{{ route('commandes.search') }}" method="GET" style="display: flex; align-items: center;">
            <input type="text" name="query" placeholder="Rechercher un article..."
                style="padding: 5px; border-radius: 5px; border: 1px solid #ccc; margin-right: 10px;">
            <button type="submit"
                style="background-color: #ffdd57; color: black; border: none; padding: 5px 10px; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                Rechercher
            </button>
        </form>

        <a href="{{ route('commandes.panier') }}" class="panier-button">Voir le panier</a>
    </nav>

    <!-- Affichage des résultats de recherche par catégorie -->
    @foreach ($categories as $categorie)
        <!-- Vérifier si la catégorie contient des articles correspondant à la recherche -->
        @if($categorie->articles->isNotEmpty())
            <div class="categorie" id="categorie_{{ $categorie->id }}">
                <h2>{{ $categorie->nom }}</h2>
                <div>
                    @foreach ($categorie->articles as $article)
                        <div class="article">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article">
                            <h3>{{ $article->titre }}</h3>
                            <p>{{ $article->prix }} FCFA</p>
                            <form action="{{ route('commandes.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <label for="quantite_{{ $article->id }}">Quantité en Kg:</label>
                                <input type="number" name="quantite" id="quantite_{{ $article->id }}" min="1"
                                    required>
                                <button type="submit">Ajouter au panier</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach

    <!-- Affichage si aucun article n'est trouvé -->
    @if(isset($articles) && $articles->isEmpty())
        <p>Aucun article trouvé pour cette recherche.</p>
    @endif

    <!-- Bouton retour à l'index -->
    @if(isset($articles) && $articles->isNotEmpty())
        <a href="{{ route('commandes.index') }}" class="back-to-index-button">Retour aux commandes</a>
    @endif
</body>

</html>
