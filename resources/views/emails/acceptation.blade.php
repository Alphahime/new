<!DOCTYPE html>
<html>
<head>
    <title>Notification de Candidature</title>
</head>
<body>
    <h1>Bonjour {{ $reservation->user->name }},</h1>
    <p>Votre reservation pour {{ $reservation->evenement->nom }} a été acceptée.</p>
    <p>Merci d'utiliser notre application.</p>
</body>
</html>