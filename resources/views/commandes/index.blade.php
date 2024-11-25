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
    </style>
</head>

<body>
    <nav class="navbar">
        <h1>Gestion de Fruits</h1>
        <ul>
            <li><a href="{{ route('articles.index') }}">Article</a></li>
            <!-- Boutons pour les catégories -->
    <div class="categories-buttons">
        @foreach ($categories as $categorie)
            <a href="#categorie_{{ $categorie->id }}">{{ $categorie->name }}</a>
        @endforeach
    </div>
        </ul>
        <a href="{{ route('commandes.panier') }}" class="panier-button">Voir le panier</a>
    </nav>

    

    <h1>Liste des Articles</h1> 

    @foreach ($categories as $categorie)
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
                            <input type="number" name="quantite" id="quantite_{{ $article->id }}" min="1" required>
                            <button type="submit">Ajouter au panier</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</body>

</html>
