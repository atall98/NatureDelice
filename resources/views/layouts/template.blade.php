<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Fruits</title>
    <style>
        /* Style global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        
        /* Barre de navigation */
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

        /* Style du conteneur principal */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        h2 {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        
        /* Style pour le contenu */
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Barre de navigation -->
    <nav class="navbar">
        <h1>Gestion de Fruits</h1>
        <ul>
            <li><a href="{{ route('articles.index') }}">Article</a></li>
            <li><a href="{{ route('categories.index') }}">Catégorie</a></li>
            <li><a href="{{ route('clients.index') }}">Client</a></li>
            <li><a href="{{ route('commandes.index') }}">Commande</a></li>
            <li><a href="{{ route('utilisateurs.index') }}">Utilisateur</a></li>
        </ul>
    </nav>

    <!-- Conteneur principal -->
    <div class="container">
        <h2>Bienvenue dans la gestion de fruits</h2>
        <div class="content">
            <p>Sélectionnez une section dans le menu pour gérer vos données.</p>
            <p>Utilisez cet outil pour gérer efficacement les articles, clients, utilisateurs, catégories, permissions, et rôles associés à la vente de fruits.</p>
        </div>
    </div>

</body>
</html>
