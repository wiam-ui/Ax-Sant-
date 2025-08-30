<!DOCTYPE >
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

</style>
</head>

<body>
    <div class="container">
        <x-sidebar > </x-sidebar>

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
                <h2>Les rendez-vous: </h2>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>ID: </th>
                            <th>Heure: </th>
                            <th>Date: </th>
                            <th>Etat: </th>
                            <th>Id de patient: </th>
                            <th>Id de medecin: </th>
                            <th>Supprimer</th>
                            <th>Action:</th>
                            <th>Action:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                            <tr>
                              <td>{{$data->id}}</td>
                              <td>{{$data->heure}}</td>
                              <td>{{$data->date}}</td>
                              <td>{{$data ->etat}}</td>
                              <td>{{$data ->patient_id}}</td>
                              <td>{{$data ->medecin_id}}</td>

                              <td><a href="{{ route('rendezvous.destroy', $data->id) }} " onclick="confirmation(event)"><ion-icon name="trash" id="ion-icon"></ion-icon></a></td>
                                <!-- Bouton VALIDER -->
                             <td>
                                <form action="{{ route('changerEtat', $data->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="etat" value="valide">
                                    <button type="submit" style="background:none; color:green; cursor:pointer;">
                                        ✔️ Valider
                                    </button>
                                </form>
                             </td>

                                <!-- Bouton ANNULER -->
                             <td>
                                <form action="{{ route('changerEtat', $data->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="etat" value="annulée">
                                    <button type="submit" style="background:none;color:red; cursor:pointer;">
                                        ❌ Annuler
                                    </button>
                                </form>
                             </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
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
        let table = new DataTable('#myTable');

        let toogle = document.querySelector('.toogle');
 let navigation = document.querySelector('.navigation');
 let main = document.querySelector('.main');

 toogle.onclick = function(){
     navigation.classList.toggle('active');
     main.classList.toggle('active');
 }

 function ouvrirFormulaire() {
        document.getElementById('overlay').style.display = 'flex';
    }

    function fermerFormulaire() {
        document.getElementById('overlay').style.display = 'none';
    }
    </script>


</body>

</html>
