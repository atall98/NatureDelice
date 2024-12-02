<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
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
        .btn-primary { background-color: #007bff; }
        .btn-warning { background-color: #f0ad4e; }
        .btn-danger { background-color: #dc3545; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-warning:hover { background-color: #ec971f; }
        .btn-danger:hover { background-color: #c82333; }
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
        th { background-color: #f1f1f1; }
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
            <li><a href="{{ route('users.index') }}">Utilisateur</a></li>
        </ul>
    </nav>

<div class="container">
    <h1>Liste des Clients</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adreese</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Éditer</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
