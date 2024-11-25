<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f1f1f1;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .card-body {
            padding: 15px;
        }
        .card-footer {
            padding: 10px;
            text-align: right;
            background-color: #f1f1f1;
            border-top: 1px solid #ddd;
        }
        .btn {
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Détails de l'Article</h1>

    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $article->titre }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Catégorie :</strong> {{ $article->categorie->name }}</p>
            <p><strong>Prix :</strong> {{ $article->prix }} FCFA</p>
            <p><strong>Description :</strong> {{ $article->description }}</p>
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article">
            @else
                <p>Aucune image disponible</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
