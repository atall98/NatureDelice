<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="file"] {
            padding: 0;
        }
        button {
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #0056b3;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Modifier l'Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $article->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="Image actuelle">
            @endif
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $article->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control" step="0.01" value="{{ old('prix', $article->prix) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $article->description) }}</textarea>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
</div>

</body>
</html>
