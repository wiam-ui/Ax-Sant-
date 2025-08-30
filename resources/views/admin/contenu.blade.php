<!DOCTYPE html >
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <style>
         .patients-table {
    margin-top: 30px;
    border: 4px solid #3498db;
    padding: 30px;
    margin: 30px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.9);
}

.patients-table h2 {
    margin-bottom: 20px;
    text-align: center;
}

#myTable {
    width: 100%;
    border: 3px solid gainsboro;
    font-size: 14px;
}

#myTable thead {
    background-color: #3498db;
    color: white;
}

#myTable th, #myTable td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

#ion-icon{
    font-size: 20px;
    color: red;
    cursor: pointer;
}

body {
    font-family: Arial, sans-serif;
}

.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
}

/* Boîte du formulaire */
.modal {
    background: white;
    padding: 20px;
    border-radius: 8px;
    width: 450px;
    height: 550px;
    box-shadow: 0 0 15px rgba(0,0,0,0.9);
}

/* Bouton de fermeture */
.close-btn {
    float: right;
    cursor: pointer;
    font-weight: bold;
    color: red;
    font-size: 30px;
}

#button {
    background-color: #0097fc;
    margin-left: 80%;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#button:hover {
    background-color: #2980b9;
}

#form {
    background: #eeeeeee8;
    padding: 10px;
    border-radius: 15px;
    width: 400px;
    /* margin: 60px auto; */
    box-shadow: 0 4px 8px rgba(0,0,0,0.4);
}

h3 {
    text-align: center;
    color: #2f2bf8;
    margin-bottom: 10px;
}

#form label {
    display: block;
    margin-bottom: 1px;
    font-weight: 600;
    color: #555;
}

#form input,
#form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 8px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

#form input:focus,
#form select:focus {
    border-color: #3498db;
    outline: none;
}

#btn {
    width: 30%;
    margin-left:30%;
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

.avatar-circle {
            width: 35px;
            height: 35px;
            background-color: skyblue;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2)
}

    </style>
</head>

<body>
    <div class="container">
        <x-sidebar ></x-sidebar>

        <div class="main">
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="d-flex align-items-center">
                    <div class="avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="ms-2">{{ Auth::user()->name }}</span>

                </div>
            </div>

            <div class="patients-table">
                <h2>Les Contenu: </h2>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>ID: </th>
                            <th>Tension: </th>
                            <th>Poids: </th>
                            <th>Taille: </th>
                            <th>Temperature: </th>
                            <th>Sexe: </th>
                            <th>Rapport: </th>
                            <th>Id de consultation: </th>
                            <th>Modifier: </th>
                            <th>Supprimer: </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                         <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->tension}}</td>
                            <td>{{$data->poids}}</td>
                            <td>{{$data->taille}}</td>
                            <td>{{$data->temperature}}</td>
                            <td>{{$data->sexe}}</td>
                            <td>{{$data->rapport}}</td>
                            <td>{{$data ->consultation_id}}</td>


                            <td><a href="{{url('edit_contenu',$data->id)}}"><i class="fa-solid fa-file-pen"></i></a></td>
                            <td><a href="{{url('delete_contenu',$data->id)}}" onclick="confirmation(event)"><ion-icon name="trash" id="ion-icon"></ion-icon></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button id="button" onclick="ouvrirFormulaire()">Afficher le formulaire</button>

            <div id="overlay" class="overlay">
                <div class="modal">
                    <span class="close-btn" onclick="fermerFormulaire()">×</span>
                    <h3>Ajouter un contenu</h3>
                    <form id="form" action="{{url('add_contenu')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="">Tension :</label>
                        <input type="Number" name="tension" placeholder="saisir la tension" required><br>

                        <label for="">Poids :</label>
                        <input type="number" name="poids" placeholder="saisir le poids" required><br>

                        <label for="">Taille :</label>
                        <input type="number" name="taille" placeholder="saisir la taille" required><br>

                        <label for="">Temperature :</label>
                        <input type="number" name="temperature" placeholder="saisir la temperature" required><br>

                        <label for="">Sexe :</label>
                        <select name="sexe" id="">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select><br>

                        <label for=""> Rapport :</label>
                        <input type="text" name="rapport" placeholder="saisir le rapport" required><br>


                        <label for="prix">Id de consultation :</label>
                        <input type="number"  name="consultation_id" placeholder="saisir id de consultation" ><br>

                        <button id="btn" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect)

            swal({

                title: "Êtes-vous sûr?",
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: "warning",
                buttons: true,
                dangerMode: true,

            })

            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect
                }
            });
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js')}}"></script>
    <script src="{{asset('Dashborad/chart.js')}}"></script>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <script>
         // Menu Toogle
 let toogle = document.querySelector('.toogle');
 let navigation = document.querySelector('.navigation');
 let main = document.querySelector('.main');

 toogle.onclick = function(){
     navigation.classList.toggle('active');
     main.classList.toggle('active');
 }
 let table = new DataTable('#myTable');

 function ouvrirFormulaire() {
        document.getElementById('overlay').style.display = 'flex';
    }

    function fermerFormulaire() {
        document.getElementById('overlay').style.display = 'none';
    }

    </script>
</body>

</html>













