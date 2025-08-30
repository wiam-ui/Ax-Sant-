<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/dashborad.css')}}">
    <style>
        .radio-group {
  display: flex;
  gap: 1rem;
  align-items: center;
  margin: 1rem 0;
}

/* Style général des labels */
.radio-group label {
  font-weight: 500;
  margin-left: 0.5rem;
  cursor: pointer;
}

.radio-group input[type="radio"] {
    display: inline-block;
    width: 18px;
    height: 18px;
    border-radius: 50%;
}


    </style>
</head>

<body>
    <div class="container">
        <x-sidebar >

        </x-sidebar>

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
            <!--  cards -->


                <h3>Modifier consultation</h3>
                <form action="{{url('update_consultation',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Prix :</label>
                    <input type="text" value="{{$data ->prix}}" name="prix" placeholder="saisir prix" required><br>

                    <label for="">type:</label>
                    <div class="radio-group">
                    <input type="radio" id="consultation" name="type" value="{{$data->type}}" value="consultation">
                    <label for="consultation">Consultation initiale</label><br>

                    <input type="radio" id="controle" name="type" value="controle" value="{{$data->type}}">
                    <label for="controle">Contrôle</label><br>
                    </div>

                    <label for="prix">Id de patient :</label>
                    <input type="number"  name="patient_id"  value="{{$data->patient_id}}" placeholder="saisir id de patient" required><br>

                    <label for="prix">Id de medecin :</label>
                    <input type="number"  name="medecin_id" value="{{$data->medecin_id}}" placeholder="saisir id de medecin" required><br>

                    <button type="submit">Modifier</button>
                </form>

        </div>

    </div>








    <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js')}}"></script>

    <script src="{{asset('Dashborad/chart.js')}}"></script>
    <script>
         // Menu Toogle
 let toogle = document.querySelector('.toogle');
 let navigation = document.querySelector('.navigation');
 let main = document.querySelector('.main');

 toogle.onclick = function(){
     navigation.classList.toggle('active');
     main.classList.toggle('active');
 }
 // add hovered class in select list item
 let list = document.querySelectorAll('.navigation li');
 function activeLink(){
     list.forEach((item)=>
     item.classList.remove('hovered'))
     this.classList.add('hovered');
 }
 list.forEach((item)=>
 item.addEventListener('mouseover',activeLink))
    </script>
</body>

</html>

