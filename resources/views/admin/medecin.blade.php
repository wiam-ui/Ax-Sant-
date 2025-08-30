<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashborad/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashborad/dashborad.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <style>
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
        <x-sidebar></x-sidebar>

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
                <h2>Les Medecins: </h2>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>ID: </th>
                            <th>Nom: </th>
                            <th>Prénom: </th>
                            <th>Spécialisté: </th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nom }}</td>
                                <td>{{ $data->prenom }}</td>
                                <td>{{ $data->specialiste }}</td>

                                <td><a href="{{ url('edit_medecin', $data->id) }}"><i
                                            class="fa-solid fa-file-pen"></i></a>
                                </td>
                                <td><a href="{{ url('delete_medecin', $data->id) }}"
                                        onclick="confirmation(event)"><ion-icon name="trash"
                                            id="ion-icon"></ion-icon></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button onclick="ouvrirFormulaire()">Afficher le formulaire</button>

            <div id="overlay" class="overlay">
                <div class="modal">
                    <span class="close-btn" onclick="fermerFormulaire()">×</span>
                    <h3>Ajouter un medecin</h3>
                    <form action="{{ url('add_medecin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" placeholder="saisir ton nom" required><br>

                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" placeholder="saisir ton prenom"
                            required><br>

                        <label for="specialiste">Choisissez une spécialité :</label>
                        <select id="specialiste" name="specialiste">
                            <option value="generaliste">généraliste</option>
                            <option value="cardiologie">Cardiologie</option>
                            <option value="gynecologie">Gynécologie</option>
                            <option value="psychiatrie">Psychiatrie</option>
                        </select>

                        <button id="btn" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        function confirmation(ev) {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="module" src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') }}"></script>
    <script nomodule src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js') }}"></script>
    <script src="{{ asset('Dashborad/chart.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.4.min.js') }}"></script>
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <script>
        // Menu Toogle
        let toogle = document.querySelector('.toogle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toogle.onclick = function() {
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
