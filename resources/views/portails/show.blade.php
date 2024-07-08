<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Détail Événement</title>
</head> 
<body>
    <div class="banniere">
        <img src="{{ asset('imgs/a_propos.png')}}" alt="Bannière">
    </div>
    <section class="contenu">
        <div class="popup">
            <p>Détails de l'événement : {{ $evenement->nom }}</p>
            
            <div>
                <p>Description : {{ $evenement->description }}</p>
                <p>Lieu : {{ $evenement->lieu }}</p>
                <p>Date : {{ $evenement->date }}</p>
                <p>Date limite d'inscription : {{ $evenement->date_limite_inscription }}</p>
            </div>
    
            @if(Auth::check())
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                    <button type="submit" class="btn">Confirmer ma réservation</button>
                </form>
            @else
                <a id="loginLink" href="{{ route('login') }}" class="btn">Se connecter pour réserver</a>
                <form action="{{ route('reservations.store') }}" method="POST" id="reservationForm" style="display: none;">
                    @csrf
                    <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                    <button type="submit" class="btn">Réserver ma place</button>
                </form>
            @endif
        </div>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginLink = document.getElementById('loginLink');
            const reservationForm = document.getElementById('reservationForm');
    
            loginLink.addEventListener('click', function(event) {
                event.preventDefault();
                reservationForm.style.display = 'block'; // Afficher le formulaire de réservation
                loginLink.style.display = 'none'; // Cacher le lien de connexion
            });
        });
    </script>
    
</body>
</html>
