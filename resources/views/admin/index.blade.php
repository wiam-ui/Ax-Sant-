<!DOCTYPE>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashborad/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <style>
        .avatar-circle {
            width: 35px;
            height: 35;
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

        <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">

                    <div class="activity-counter">
                        <p>Consultations aujourd'hui : <strong>{{ $todayConsultationCount }}</strong></p>
                    </div>

                </div>
                <!-- user image -->
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button id="button">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Logout</span>
                        </button>
                    </form>
                </div>

                <div class="d-flex align-items-center">
                    <div class="avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="ms-2">{{ Auth::user()->name }}</span>

                </div>
            </div>

            <!--  cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{ $patient }}</div>
                        <div class="cardName">Patient</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{ $medecin }}</div>
                        <div class="cardName">Medecin</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{ $consultation }}</div>
                        <div class="cardName">Consultation</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $rendezvous }}</div>
                        <div class="cardName">Rendez-vous</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="calendar-number"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $user }}</div>
                        <div class="cardName">user</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-add"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">{{ $feedback }}</div>
                        <div class="cardName">Feedback</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                </div>




            </div>


        </div>
        <script type="module" src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') }}"></script>
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js') }}"></script>
        <script src="{{ asset('Dashborad/chart.js') }}"></script>
        <script>
            // Menu Toogle
            let toogle = document.querySelector('.toogle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');

            toogle.onclick = function() {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
            // add hovered class in select list item
            let list = document.querySelectorAll('.navigation li');

            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'))
                this.classList.add('hovered');
            }
            list.forEach((item) =>
                item.addEventListener('mouseover', activeLink))
        </script>
</body>

</html>
