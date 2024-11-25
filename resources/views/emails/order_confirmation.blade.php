<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
</head>
<body>
    <h1>Merci pour votre commande !</h1>
    <p>Voici les détails de votre commande :</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details['articles'] as $article)
            <tr>
                <td>{{ $article['titre'] }}</td>
                <td>{{ $article['quantite'] }} kg</td>
                <td>{{ number_format($article['prix'], 2) }} FCFA</td>
                <td>{{ number_format($article['quantite'] * $article['prix'], 2) }} FCFA</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Nous espérons vous revoir bientôt !</p>
</body>
</html>
