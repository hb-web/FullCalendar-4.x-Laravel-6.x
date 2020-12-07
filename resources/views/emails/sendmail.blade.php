<!DOCTYPE html>
<html>
<head>
    <title>Real Programmer</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <h3>Nom : {{ $details['name'] }}</h3>
    <h3>Nom : {{ $details['email'] }}</h3>
    <h3>Téléphone : {{ $details['tel'] }}</h3>
    <h3>Sujet : {{ $details['subject'] }}</h3>
    <p>{{ $details['body'] }}</p>
    <p>Cet e-mail a été envoyé via le formulaire de contact de (https://domaine.com)

    </p>
</body>
</html>