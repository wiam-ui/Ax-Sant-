<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css')}}">

<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="hand-right"></ion-icon></span>
                <span class="title">Hello Admin <b>{{ Auth::user()->name }}</b></span>
            </a>
        </li>
        <li>
            <a href="{{url('admin.dashboard')}}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dashborad</span>
            </a>
        </li>
        <li>
            <a href="{{url('patient')}}">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                <span class="title">Patients</span>
            </a>
        </li>
        <li>
            <a href="{{url('medecin')}}">
                <span class="icon"><i class="fa-solid fa-user-doctor"></i></span>
                <span class="title">Medecin</span>
            </a>
        </li>
        <li>
            <a href="{{url('consultation')}}">
                <span class="icon"><i class="fa-solid fa-stethoscope"></i></span>
                <span class="title">Consultations</span>
            </a>
        </li>
        <li>
            <a href="{{url('contenu')}}">
                <span class="icon"><i class="fa-solid fa-file-lines"></i></span>
                <span class="title">Contenu</span>
            </a>
        </li>
        <li>
            <a href="{{url('medicament')}}">
                <span class="icon"><i class="fa-solid fa-tablets"></i></span>
                <span class="title">Medicament</span>
            </a>
        </li>
        <li>
            <a href="{{url('rendez')}}">
                <span class="icon"><ion-icon name="calendar-number"></ion-icon></span>
                <span class="title">Rendez-vous</span>
            </a>
        </li>
        <li>
            <a href="{{url('feedback')}}">
                <span class="icon"><ion-icon name="chatbubble-ellipses-outline"></ion-icon></span>
                <span class="title">Feedback</span>
            </a>
        </li>
    </ul>
</div>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js')}}"></script>


