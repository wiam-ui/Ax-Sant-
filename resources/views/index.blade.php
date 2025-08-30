<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>cabinet</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css') }}" />
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">

        <div id="topbar">
            <div class="container">
                <div class="social-links">
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="logo float-left">
                <h2 class="text-light"><a href="#hero" class="scrollto"><span>Axé Santé</span></a></h2>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Gallery</a></li>
                    <li><a href="#medecin">Medecins</a></li>
                    <li><a href="#call-to-action">Feedback</a></li>
                    <li><a href="#Review">Review</a></li>
                    <li><a href="#footer">Rendez-vous</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth
                        @if (Auth::user()->usertype === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}" class="btn btn-primary text-light">Dashboard</a></li>
                            <li style="padding: 2px;" >
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" style="padding: 7px;" >Logout </button>
                                </form>
                            </li>
                        @endif

                        @if (Auth::user()->usertype === 'user')
                            <li>
                                <a href=" {{ Auth::user()->patient ? route('profile.show') : route('profile') }}"
                                    class="btn btn-primary text-light" id="showProfileForm">
                                    {{ Auth::user()->patient ? 'My Compte' : 'Créer Profil' }}
                                </a>
                            </li>

                            <li style="padding: 2px;" >
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" style="padding: 7px;" >Logout </button>
                                </form>
                            </li>

                        @endif

                    @endauth
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-6 intro-info order-md-first order-last">
                    <h2>Axé Santé <br>pour <span>une récupération non intensive</span>
                    </h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Commencer</a>
                    </div>
                </div>
                <div class="flex flex-column justify-content-center align-items-center order-md-last order-first">

                    <div class="image-container active" id="switchable-image">
                        <img src="assets/img/H (1).jpg" alt="Main" class="main-image">
                        <img src="assets/img/H (1).jpg" alt="Hover" class="hover-image">
                    </div>

                    <div class="controls">
                        <span class="img-btn active" data-main="assets/img/H (1).jpg"
                            data-hover="assets/img/H (1).jpg"></span>
                        <span class="img-btn" data-main="assets/img/H (6).jpg" data-hover="assets/img/H (6).jpg"></span>
                        <span class="img-btn" data-main="assets/img/H (8).jpg" data-hover="assets/img/H (8).jpg"></span>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="">
                            <img src="{{ asset('assets/img/D (8).jpg') }} " class="img-thumbnail" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content">
                            <h2>About</h2>
                            <h3>Bienvenue chez Axe Sante.</h3>
                            <p>C'est un espace dédié à votre bien-être, où une équipe de médecins qualifiés
                                et expérimentés met son expertise au service de votre santé. </p>
                            <ul>
                                <li><i class="ion-android-checkmark-circle"></i>Des soins de qualité.</li>
                                <li><i class="ion-android-checkmark-circle"></i>Un cadre moderne et accueillant .</li>
                                <li><i class="ion-android-checkmark-circle"></i>Une accessibilité optimale .</li>
                                <li><i class="ion-android-checkmark-circle"></i>Disponible 24h/24h sur telephone.</li>
                                <li><i class="ion-android-checkmark-circle"></i>Consultation à domicile .</li>
                                <li><i class="ion-android-checkmark-circle"></i>Système de rappel automatique.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <header class="section-header">
                    <h3>Gallery</h3>
                </header>

                <div class="row">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G.jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (1).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (2).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (3).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (4).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (5).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (6).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (9).jpg') }}" class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="">
                                <img src="{{ asset('assets/img/G (12).jpg') }}"
                                    class="img-thumbnail  border-primary">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        {{-- Nombres des patientes .... --}}
        <section id="" class="call-to-action wow fadeInUp" style="background-color: #52d3f7 ; width:100%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 text-center text-lg-left">
                        <h1 style="color:#eee;">les Patients</h1>
                        <p class="text-center counter" data-target="{{$patientC}}" id="p">0</p>
                    </div>
                    <div class="col-lg-3 col-md-3 text-center text-lg-left">
                        <h1 style="color: #eee;">Rendezvous</h1>
                        <p class="text-center counter" data-target="{{$rendezvous}}" id="p">0</p>
                    </div>
                    <div class="col-lg-3 col-md-3 text-center text-lg-left">
                        <h1 style="color:#eee;">Consultation</h1>
                        <p class="text-center counter " data-target="{{$consultation}}" id="p">0</p>
                    </div>
                    <div class="col-lg-3 col-md-3 text-center text-lg-left">
                        <h1 style="color:#eee;">Medecins</h1>
                        <p class="text-center counter" data-target="{{$med}}" id="p">0</p>
                    </div>
                </div>

            </div>
        </section>


        {{-- Nos medecins --}}
        <section id="medecin" class="services section-bg">
            <div class="container">

                <header class="section-header">
                    <h3>Medecins</h3>
                </header>

                <div class="row">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D2.jpg') }}" class="img-thumbnail border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>Cardiologue</h3>
                                    <p><span>Nom:</span> El AMRANI <br>
                                        <span>Etude: </span> L'aureat de CHU Rabat <br>
                                        <span>Experience: </span> Hôpital Ibn Sina
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D (2).jpg') }}"
                                        class="img-thumbnail border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>psychiatre</h3>
                                    <p><span>Nom: </span> HALTY <br>
                                        <span>Etude: </span> Université Mohammed V, Rabat <br>
                                        <span>Experience: </span> Hôpital Cheikh Zaid
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D (6).jpg') }}"
                                        class="img-thumbnail border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>Genegoloque</h3>
                                    <p><span>Nom:</span> El Aydi <br>
                                        <span>Etude:</span> Université Hassan II, casa <br>
                                        <span>Experience:</span> Centre de santé urbain
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D.jpg') }}" class="img-thumbnail border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>Pédiatre </h3>
                                    <p><span>Nom:</span> Lahlou <br>
                                        <span>Etude:</span> Université de Rabat <br>
                                        <span>Experience:</span> Pédiatre en cabinet privézy
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D (7).jpg') }}"
                                        class="img-thumbnail border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>Dermatologue </h3>
                                    <p><span>Nom:</span> Talbi <br>
                                        <span>Etude:</span> Université Mohammed VI <br>
                                        <span>Experience:</span> Hôpital Privé Al Hayat

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1s">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img src="{{ asset('assets/img/D3.jpg') }}"
                                        class="img-thumbnail  border-primary">
                                </div>
                                <div class="flip-box-back">
                                    <h3>Generaliste </h3><br>
                                    <p><span>Nom:</span> Benchekroun <br>
                                        <span>Etude:</span> Université de Fès <br>
                                        <span>Experience:</span> Clinique Vision Plus
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 text-center text-lg-left">
                        <h1 class="section-header" style="color: #eee;">Feedback</h1>
                        <form action="{{ route('feedback') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="message" class="form-label" style="color: skyblue;">Votre message:
                                </label>
                                <textarea class="form-control" name="message" rows="4" placeholder="Votre feedback" required></textarea>
                            </div>
                            <div class="col-lg-7 col-md-6 cta-btn-container text-center">
                                <button class="cta-btn align-middle" id="button">Envoyer</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-7 col-md-6 cta-btn-container text-center">
                        <div class="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13279.744776355625!2d-7.396777044580077!3d33.684716300000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7b7cff50c10e9%3A0x6db1dcd10fcecb6a!2sCabinet%20de%20M%C3%A9decine%20G%C3%A9n%C3%A9rale%20%26%20%C3%89chographie%20Dr.%20Hajar%20Zandad%20Omnipraticienne!5e0!3m2!1sfr!2sma!4v1743716110811!5m2!1sfr!2sma"
                                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!--End Call To Action Section-->

        <!-- ======= Why Us Section ======= -->

        <section id="Review" class="why-us">
            <div class="container-fluid">

                <header class="section-header">
                    <h3>Review</h3>
                </header>

                <!-- 🎯 Carousel wrapper ajouté -->
                <div class="carousel-container">
                    <div class="carousel-track">

                        <!-- Sanae -->
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="box">
                                <div class="card" style="width:300px">
                                    <img class="card-img-top" src="{{ asset('assets/img/P (1).jpg') }}"
                                        alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary fw-bold text-center">Sanae</h4>
                                        <p class="card-text">Médecin très professionnel et à l’écoute</p>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sara -->
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="box">
                                <div class="card" style="width:300px">
                                    <img class="card-img-top" src="{{ asset('assets/img/P (2).jpg') }}"
                                        alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary fw-bold text-center">Sara</h4>
                                        <p class="card-text">Cabinet propre et personnel accueillant.</p>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Amira -->
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="box">
                                <div class="card" style="width:300px">
                                    <img class="card-img-top" src="{{ asset('assets/img/P (3).jpg') }}"
                                        alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary fw-bold text-center">Amira</h4>
                                        <p class="card-text">Consultation rapide et efficace</p>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Imane -->
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="box">
                                <div class="card" style="width:300px">
                                    <img class="card-img-top" src="{{ asset('assets/img/P (4).jpg') }}"
                                        alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary fw-bold text-center">Imane</h4>
                                        <p class="card-text">Très satisfait du service, je recommande</p>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end .carousel-track -->
                </div> <!-- end .carousel-container -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <div class="footer-top">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="footer-info">
                                    <h4 style="color: #589af1">Axe sante</h4>
                                    <p>Notre objectif est de fournir les meilleurs soins et conseils possibles pour
                                        aider nos clients
                                        à retrouver confiance et à se rétablir rapidement et complètement..</p>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="footer-links">
                                    <h4 style="color: #589af1 ">Links</h4>
                                    <ul>
                                        <li><a href="#hero">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#services">Gallery</a></li>
                                        <li><a href="#call-to-action">Feedback</a></li>
                                        <li><a href="#why-us">Avis</a></li>
                                        <li><a href="#footer">Rendez-vous</a></li>
                                        <li class="active"><a href="#hero">Home</a></li>

                                    </ul>
                                </div>

                                <div class="footer-links">
                                    <h4 style="color: #589af1">Rendez-vous</h4>
                                    <p>
                                        <strong>Phone:</strong> +0 545 130 518<br>
                                        <strong>Email:</strong> Axe.sante24@gmail.com<br>
                                    </p>
                                </div>

                                <div class="social-links">
                                    <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                                </div>

                            </div>

                        </div>

                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-6">

                        <div class="form">

                            <h4 style="color: #589af1">Prendre rendez-vous</h4>

                            <form action="{{ route('rendezvous') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="date" class="form-control" name="date"
                                        data-rule="minlen:4" data-msg="Please enter a valid Date" />
                                    <div class="validate"></div>

                                </div>

                                <div class="form-group">
                                    <input type="time" class="form-control" name="heure" data-rule="minlen:4"
                                        data-msg="Please enter a valid Date" />
                                    <div class="validate"></div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="medecin_id" required>
                                        {{-- @dd($medecins) --}}
                                        @foreach($medecins as $medecin)
                                            <option value="{{ $medecin->id }}">{{ $medecin->specialiste }}</option>
                                        @endforeach
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="text-center">
                                    <button type="submit"title="Send Message">Reserver</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Axe Sante</strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by <a href="">Wiam Barka</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/mobile-nav/mobile-nav.js') }}"></script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

</body>

</html>
