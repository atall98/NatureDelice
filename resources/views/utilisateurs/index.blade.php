<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
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
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-buttons a, .action-buttons form button {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .action-buttons form button {
            background-color: #dc3545;
        }
        .action-buttons a:hover, .action-buttons form button:hover {
            background-color: #0056b3;
        }
        .add-user {
            display: inline-block;
            background-color: #28a745;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .add-user:hover {
            background-color: #218838;
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

    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <a href="{{ route('utilisateurs.create') }}" class="add-user">Ajouter un utilisateur</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateurs as $utilisateur)
                    <tr>
                        <td>{{ $utilisateur->nom }}</td>
                        <td>{{ $utilisateur->email }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}">Éditer</a>
                            <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
