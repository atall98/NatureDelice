<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        h1 {
            margin: 20px 0;
            text-align: center;
            color: #4CAF50;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>Détails de la Commande</h1>
    </header>
    <div class="container">
        <h2>Commande #{{ $commande->id }}</h2>
        <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y') }}</p>
        <p><strong>Statut :</strong> {{ $commande->status }}</p>

        @if($commande->articles->isEmpty())
            <p>Aucun article dans cette commande.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commande->articles as $article)
                    <tr>
                        <td>{{ $article->titre }}</td>
                        <td>{{ $article->pivot->quantite }} kg</td>
                        <td>{{ number_format($article->prix, 2) }} FCFA</td>
                        <td>{{ number_format($article->pivot->quantite * $article->prix, 2) }} FCFA</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><strong>Total de la commande :</strong> {{ number_format($commande->total, 2) }} FCFA</p>
        @endif

        <a href="{{ route('commandes.index') }}" class="btn-back">Retour aux commandes</a>
    </div>
</body>
</html>
