<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }
        .email-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        p { color: #555; }
        .footer { margin-top: 20px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Bonjour {{ $details['patientName'] }} </h1>
        <p> Ceci est un rappel de votre prochain rendez-vous prévu le {{ $details['date'] }} à {{ $details['heure'] }} au nos cabinet Axé Santé.
            Merci de bien vouloir nous confirmer votre présence ou nous contacter en cas d’empêchement.
        </p>

        <h4>À bientôt ! et bon journée</h4>




        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
