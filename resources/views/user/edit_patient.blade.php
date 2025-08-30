<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/dashborad.css')}}"> --}}
    <style>

#form {
    background: #eeeeeee8;
    padding: 10px;
    border-radius: 15px;
    width: 400px;
    margin: 60px auto;
    box-shadow: 0 4px 8px rgba(0,0,0,0.4);
}

h3 {
    text-align: center;
    color: #2f2bf8;
    margin-bottom: 15px;
}

#form label {
    display: block;
    margin-bottom: 3px;
    font-weight: 600;
    color: #555;
}

#form input ,
#form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

#form input:focus {
    border-color: #3498db;
    outline: none;
}

#btn {
    width: 30%;
    margin-left:30%;
    padding: 10px;
    border: none;
    background-color: #3498db;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#btn:hover {
    background-color: #2980b9;
}

    </style>



</head>

<body>
    <x-side ></x-side>


    <div class="main-content">
        <div class="dark-toggle" onclick="toggleDarkMode()">🌙</div>
                <h3>Modifier Patient</h3>
                <form action="{{url('update_patient',$data->id)}}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    <label for="nom">Nom :</label>
                    <input type="text" value="{{$data ->nom}}" id="nom" name="nom" placeholder="saisir ton nom" required><br>

                    <label for="prenom">Prénom :</label>
                    <input type="text" value="{{$data ->prenom}}" id="prenom" name="prenom" placeholder="saisir ton prenom" required><br>

                    <label for="">Cin :</label>
                    <input type="text" value="{{$data ->cin}}"  name="cin" placeholder="saisir ton cin" required><br>

                    <label for="age">Âge :</label>
                    <input type="number" value="{{$data ->age}}" id="age" name="age" placeholder="saisir ton age" required><br>

                    <label for="">Mutuelle :</label>
                    <select name="mutuelle" value="{{$data->mutuelle}}">
                        <option value="amo">Amo</option>
                        <option value="sanlam">Sanlam</option>
                        <option value="RMA">RMA</option>
                        <option value="antlanta">antlanta</option>
                        <option value="Axa">Axa</option>
                        <option value="Autre">Autre</option>
                        <option value="Aucun">Aucun</option>
                    </select>

                    <label for="telephone">Téléphone :</label>
                    <input type="number" value="{{$data ->telephone}}" id="telephone" name="telephone" placeholder="saisir ton numero" required><br>

                    <button type="submit" id="btn">Modifier</button>
                </form>

        </div>

    </div>


    <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
</body>

</html>

