<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/dashborad.css')}}">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
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
            <!--  Patients -->

            <div class="patients-table">
                <h2>Mes Patients</h2>
                <table id="myTable">
                    <thead >
                        <tr>
                            <th>ID: </th>
                            <th>Nom: </th>
                            <th>Prénom: </th>
                            <th>CIN: </th>
                            <th>Âge</th>
                            <th>Mutuelle: </th>
                            <th>Téléphone: </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                            <tr>
                              <td>{{$data->id}}</td>
                              <td>{{$data->nom}}</td>
                              <td>{{$data ->prenom}}</td>
                              <td>{{$data ->cin}}</td>
                              <td>{{$data ->age}}</td>
                              <td>{{$data->mutuelle}}</td>
                              <td>{{$data->telephone}}</td>

                            </tr>

                          @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js')}}"></script>
    <script src="{{asset('Dashborad/chart.js')}}"></script>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
    {{-- <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script> --}}
    <script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
         // Menu Toogle
 let toogle = document.querySelector('.toogle');
 let navigation = document.querySelector('.navigation');
 let main = document.querySelector('.main');

 toogle.onclick = function(){
     navigation.classList.toggle('active');
     main.classList.toggle('active');
 }
    // DataTable
    let table = new DataTable('#myTable');

    </script>
</body>

</html>
