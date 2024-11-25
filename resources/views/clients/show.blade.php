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
    </div>

    <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>

</body>
</html>
