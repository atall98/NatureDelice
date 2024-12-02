<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #4CAF50;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .navbar h1 {
            margin-left: 20px;
            font-size: 24px;
            color: white;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
            margin-right: 20px;
        }
        .navbar ul li {
            display: inline;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .navbar ul li a:hover {
            background-color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        .btn {
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-warning {
            background-color: #f0ad4e;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-warning:hover {
            background-color: #ec971f;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: auto;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Gestion de Fruits</h1>
        <ul>
            <li><a href="{{ route('articles.index') }}">Article</a></li>
            <li><a href="{{ route('categories.index') }}">Catégorie</a></li>
            <li><a href="{{ route('clients.index') }}">Client</a></li>
            <li><a href="{{ route('commandes.index') }}">Commande</a></li>
            <li><a href="{{ route('users.index') }}">Utilisateur</a></li>
        </ul>
    </nav>

<div class="container">
    <h1>Gestion des Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Ajouter un article</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Image</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->titre }}</td>
                    <td>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>{{ $article->categorie->name }}</td>
                    <td>{{ $article->prix }} FCFA</td>
                    <td>{{ $article->description }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Éditer</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
