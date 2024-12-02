<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Client</title>
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
    </style>
</head>
<body>

<div class="container">
    <h1>Détails du Client</h1>

    <div class="card">
        <div class="card-header">Client : {{ $client->nom }}</div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $client->nom }}</p>
            <p><strong>Email :</strong> {{ $client->email }}</p>
            <p><strong>Téléphone :</strong> {{ $client->telephone }}</p>
            <p><strong>Téléphone :</strong> {{ $client->adresse }}</p>
            <p><strong>Créé le :</strong> {{ $client->created_at->format('d-m-Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet client ?')">Supprimer</button>
            </form>
        </div>

</body>
</html>
