<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        h1 {
            margin: 20px 0;
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

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .empty-message {
            text-align: center;
            margin: 20px 0;
            font-size: 1.2em;
            color: #777;
        }

        .btn-validate,
        .btn-back {
            display: block;
            width: 100%;
            text-align: center;
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .btn-validate {
            background-color: #4CAF50;
            color: white;
        }

        .btn-validate:hover {
            background-color: #45a049;
        }

        .btn-back {
            background-color: #f2f2f2;
            color: #333;
        }

        .btn-back:hover {
            background-color: #ddd;
        }

    </style>
</head>

<body>
    <header>
        <h1>Mon Panier</h1>
    </header>

    <div class="container">
        @if ($commandes->isEmpty())
            <p class="empty-message">Votre panier est vide.</p>
        @else
            <form action="{{ route('commandes.valider') }}" method="POST">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->article->titre }}</td>
                                <td>{{ $commande->quantite }} kg</td>
                                <td>{{ number_format($commande->article->prix, 2) }} FCFA</td>
                                <td>{{ number_format($commande->quantite * $commande->article->prix, 2) }} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn-validate">Valider la commande</button>
            </form>
        @endif
    </div>

    <a href="{{ route('commandes.index') }}" class="btn-back">Retour à la liste des commandes</a>
</body>

</html>
