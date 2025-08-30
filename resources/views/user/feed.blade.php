<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css')}}">

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
    </style>
</head>
<body>
    <x-side></x-side>
    <div class="main-content">
        <div class="dark-toggle" onclick="toggleDarkMode()">🌙</div>

        <div class="patients-table">
            <h2 >Mes feedbacks</h2>

            <table id="myTable">
                <thead >
                    <tr>
                        <th>ID: </th>
                        <th>Message: </th>
                        <th>Reponse: </th>
                        <th>Id user: </th>
                        <th>supprimer: </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)

                        <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->message }}</td>
                            @if ($feedback->reponse)
                                <td class="mt-2 text-green-600"><strong>Réponse Admin :</strong> {{ $feedback->reponse}}</td>
                            @else
                                <td class="mt-2 text-gray-500">Aucune réponse de l'admin pour le moment.</td>
                            @endif
                            <td>{{$feedback->user_id}}</td>
                            <td><a href="{{url('destroyFeedback',$feedback->id)}}" onclick="confirmation(event)"><ion-icon name="trash" id="ion-icon"></ion-icon></a></td>


                        </tr>

                    @endforeach
                </tbody>
            </table>







        </div>
    </div>


    <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
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


</body>
</html>
