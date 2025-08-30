<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Dashborad/dashborad.css')}}">

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

                <h3>Modifier contenu</h3>
                <form action="{{url('update_contenu',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Tension:</label>
                    <input type="text" value="{{$data ->tension}}" name="tension" placeholder="saisir la tension" required><br>

                    <label for="">Poids :</label>
                    <input type="text" value="{{$data ->poids}}"  name="poids" placeholder="saisir le poids" required><br>

                    <label for="">Taille :</label>
                    <input type="text" value="{{$data ->taille}}"  name="taille" placeholder="saisir la taille" required><br>

                    <label for="">Temperature :</label>
                    <input type="text" value="{{$data ->temperature}}"  name="temperature" placeholder="saisir la temperature" required><br>

                    <label for="">Sexe :</label>
                    <select name="sexe" id="">
                        <option value="{{$data->sexe}}">{{$data->sexe}}</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select><br>
                    <label for=""> Rapport :</label>
                    <input type="text" value="{{$data ->rapport}}"  name="rapport" placeholder="saisir le rapport" required><br>

                    <label for="prix">Id de consultation :</label>
                    <input type="number"  name="consultation_id" value="{{$data->consultation_id}}" placeholder="saisir id de consultation" ><br>

                    <button type="submit">Modifier</button>
                </form>





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

