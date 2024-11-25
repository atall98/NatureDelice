<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Catégorie</title>
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
            margin: 40px auto;
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
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-size: 1.2rem;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .card-body {
            padding: 20px;
        }
        .card-body p {
            font-size: 1.1rem;
        }
        .btn {
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
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
            color: black;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de la Catégorie</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nom : {{ $categorie->name }}</h5>
                <p class="card-text">ID : {{ $categorie->id }}</p>
                {{-- Uncomment below if timestamps are necessary --}}
                {{-- <p class="card-text">Créée le : {{ $categorie->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text">Modifiée le : {{ $categorie->updated_at->format('d/m/Y H:i') }}</p> --}}
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
    </div>
</body>
</html>
