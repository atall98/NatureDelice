<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
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
            max-width: 900px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
        }
        .alert {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
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
    <h1>Liste des Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-warning">Modifier</a>
                        
                        
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
