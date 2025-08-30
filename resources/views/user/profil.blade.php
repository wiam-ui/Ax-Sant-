<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Corps de la page avec image de fond */
body {
    background-image: url('{{asset('assets/img/m (2).jpg')}}');
    background-size: cover; /* Couvre toute la page */
    background-position: center; /* Centre l'image */
    background-attachment: fixed; /* Fixe l'image lors du défilement */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: #fff; /* Texte en blanc pour contraster avec l'arrière-plan */
}

/* Conteneur du formulaire */
.form-container {
    background-color: rgba(255, 255, 255, 0.7); /* Fond blanc avec opacité */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}


h2 {
    font-size: 24px;
    /* margin-bottom: 1px; */
    color: #333;
}

.form-group {
    margin-bottom: 6px;
    text-align: left;
}

/* Label */
label {
    font-size: 14px;
    color: #555;
    margin-bottom: 3px;
    display: block;
}

/* Champs de texte */
input[type="text"],
input[type="Number"] {
    width: 100%;
    padding: 8px;
    font-size: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s;
}

/* Focus sur les champs */
input[type="text"]:focus,
input[type="number"]:focus{
    border-color: #5e72e4;
    outline: none;
}

/* Bouton de soumission */
.btn-submit {
    background-color: #5e72e4;
    color: #fff;
    border: none;
    padding: 12px 15px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Hover sur le bouton */
.btn-submit:hover {
    background-color: #4b5bbd;
}

.btn-close {
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 20px;
    cursor: pointer;
}
.button {
    position: absolute;
    right: 92%;
    bottom: 90%;
}

    </style>
</head>
<body>
    <div class="button">
     <button class="btn-close" onclick="window.history.back();"></button>
    </div>

    <div class="form-container">
        <h2>Inscription</h2>
        <form action="{{ route('patient') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="">Prenom :</label>
                <input type="text" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="">Cin :</label>
                <input type="text" name="cin" required>
            </div>

            <div class="form-group">
                <label for="">Âge :</label>
                <input type="number" name="age" required>
            </div>

            <div class="form-group">
                <label for="mutuelle">Mutuelle:</label>
                    <select name="mutuelle">
                        <option value="amo">Amo</option>
                        <option value="sanlam">Sanlam</option>
                        <option value="RMA">RMA</option>
                        <option value="antlanta">antlanta</option>
                        <option value="Axa">Axa</option>
                        <option value="Autre">Autre</option>
                        <option value="Aucun">Aucun</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="">Téléphone :</label>
                <input type="text" name="telephone" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">S'inscrire</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.css"></script>

</body>
</html>
