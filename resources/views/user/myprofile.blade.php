<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Patient </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            min-height: 100vh;
            transition: 0.3s ease, color 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6fc;
        }
        .sidebar {
            width: 250px;
            background: #007BFF;
            box-shadow: 5px 0 15px rgba(0,0,0,0.3);
            padding: 35px;
            position: fixed;
            height: 100%;

        }
        .sidebar h2 {
            color: #fff;
            margin-bottom: 40px;
            font-size: 27px;
        }
        .sidebar ul {
            list-style: none;
            width: 100%;
        }
        .sidebar ul li {
            width: 100%;
        }
        .sidebar ul li a {
           display: block;
           padding: 15px 10px;
           color: #eee;
           text-decoration: none;
           transition: 0.3s;
           margin: 5px 0;
        }

        .sidebar ul li a:hover {
            background: #c0daf6;
            color: #0d47a1;
            border-radius: 15px;
        }

        .sidebar ul li form {
           display: block;
           padding: 15px 10px;
           color: white;
           text-decoration: none;
           transition: 0.3s;
           margin: 5px 0;
        }

        .sidebar ul li button:hover {
            background: blue;
            color: #eee;
            border-radius: 15px;
            border: none
        }

        .sidebar ul li button {
            background: rgb(2, 171, 250);
            color: white;
            padding: 15px;
            border-radius: 10px;
            border: skyblue
        }

        .main-content {
            margin-left: 270px;
            padding: 40px;
            width: calc(100% - 260px);
        }

        .h1 {
            color: #333;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cards {
            display: flex;
            gap: 100px;
            padding-top: 5%;
        }

        .card {
            background:white;
            flex: 1;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.6);
            background: #64b5f6;
        }

        .card h3 {
            margin-bottom: 15px;
            color: #007BFF;
            text-align: center
        }

        .card .number {
            font-size: 24px;
            font-weight: bold;
            color: #102947;
            text-align: center;
        }

        /* Toggle Switch */
        .dark-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 8px 15px;
            border-radius: 30px;
            cursor: pointer;
            user-select: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        /* Dark Mode Styles - Bleu ciel et dégradés */
        body.dark {
            background: linear-gradient(135deg, skyblue 10%, #afb4f5 90%);
        }

        body.dark .main-content .h1 {
         color: #333;
        }

        body.dark .card {
            background: linear-gradient(145deg, rgb(0, 0, 200) 10%, BLUE 90%);
            box-shadow: 0 4px 15px rgb(0, 68, 255);
            border: 2px solid rgba(0, 0, 0, 0.5);
        }

        body.dark .card:hover {
            background: linear-gradient(145deg, #070265 0%, #7fa2ee 100%);
            transform: translateY(10px);
            box-shadow: 0 5px 25px gainsboro;
        }

        body.dark .card h3 {
            color: #dbeafe;
            text-shadow: 0 1px 2px rgba(2, 44, 34, 0.5);
        }

        body.dark .card .number {
            color: #e7e5ed;
            font-size: 26px;
        }

        body.dark .sidebar {
            background: linear-gradient(145deg, rgb(0, 0, 200) 10%, BLUE 90%);
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.7);
        }

        body.dark .sidebar ul li a:hover {
            background: rgba(128, 184, 248, 0.87);
            color: #dbeafe;
            backdrop-filter: blur(15px);
        }

        .dark-toggle {
            background: transparent;
            color: black;
            border: 2px solid rgba(147, 196, 253, 0.648);
            backdrop-filter: blur(5px);
        }

        body.dark .dark-toggle {
            background: rgba(30, 64, 175, 0.3);
            color: #eee;
            border: 1px solid rgba(191, 219, 254, 0.436);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Salut Patient</h2>
    <ul>
        <li><a href="{{url('myprofile') }}">🏠 Dashboard</a></li>
        <li><a href="{{url('informations') }}">⚙️ Mes information</a></li>
        <li><a href="{{url('reser')}}">📋 Mes Rendez-vous</a></li>
        <li><a href="{{url('feed')}}">📈 Mes feedback</a></li>
        <li><a href="{{url('/') }}"> 🔗 Site </a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button id="button">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">🔓 Deconnexion</span>
                </button>
            </form>
        </li>
    </ul>
</div>

<div class="main-content">
    <div class="dark-toggle" onclick="toggleDarkMode()">🌙</div>
    <div class="h1"><h1>Bienvenue, {{$patient->nom }} </h1></div>
    <div class="cards">
        <div class="card">
            <h3>Total rendez-vous</h3>
            <p class="number">{{$rendez}}</p>
        </div>
        <div class="card">
            <h3>Rendez-vous Aujourd'hui</h3>
            <p class="number">{{$rendezCount}}</p>
        </div>
        <div class="card">
            <h3>Feedback</h3>
            <p class="number">{{$feedback}}</p>
        </div>
    </div>
</div>

<script>
   function toggleDarkMode() {
    const body = document.body;
    const darkToggle = document.querySelector('.dark-toggle');

    body.classList.toggle('dark');

    if(body.classList.contains('dark')) {
        darkToggle.innerHTML = '☀️ Light Mode';
        darkToggle.style.background = 'rgba(191, 219, 254, 0.3)';
    } else {
        darkToggle.innerHTML = '🌙 Dark Mode';
        darkToggle.style.background = 'rgba(30, 58, 138, 0.3)';
    }
}
</script>

</body>
</html>
