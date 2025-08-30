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

form {
    background: #eeeeeee8;
    padding: 10px;
    border-radius: 15px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.4);
}

form label {
    display: block;
    margin-bottom: 3px;
    font-weight: 600;
    color: #555;
}

form textarea {
    width: 90%;
    height: 80px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

form textarea:focus {
    border-color: #3498db;
    outline: none;
}

#btn {
    width: 55%;
    border: none;
    background-color: #3498db;
    color: white;
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
    <div class="container">
        <x-sidebar ></x-sidebar>

        <div class="main">
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- user image -->
                <div class="d-flex align-items-center">
                    <div class="avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="ms-2">{{ Auth::user()->name }}</span>

                </div>
            </div>

            <div class="patients-table">
                <h2>Les feedback: </h2>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>ID: </th>
                            <th>Message: </th>
                            <th>Id de user: </th>
                            <th>Réponse de l'Admin: </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                         <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->message }}</td>
                            <td>{{$feedback->user_id}}</td>
                            <td>
                                <form action="{{ route('admin.feedback.reply', $feedback->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="reponse_{{ $feedback->id }}">Réponse de l'Admin :</label>
                                    <textarea name="reponse" id="reponse_{{ $feedback->id }}">{{ old('reponse', $feedback->reponse) }}</textarea>
                                    <button type="submit" id="btn">
                                        {{ $feedback->reponse ? 'Modifier la réponse' : 'Envoyer une réponse' }}
                                    </button>
                                </form>
                            </td>

                            {{-- <td><a href="{{url('destroyFeedback',$data->id)}}" onclick="confirmation(event)"><ion-icon name="trash" id="ion-icon"></ion-icon></a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    {{-- <script type="text/javascript">
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
        } --}}
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

    </script>
</body>

</html>
