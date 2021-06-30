<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BARBER SHOP</title>
    <link rel="icon" type="image/x-icon" href="{{asset('static/img/favicon.ico')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Barber Shop</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Sobre nosotros</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Cortes</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Contactarnos</a></li>
                    @if (Route::has('login'))
                @auth
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}">Index</a></li>
                <li><a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="bx bx-envelope"></i> Cerrar Sesión </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Ingresar</a></li>
                @endauth
                @endif
                </ul>
            </div>
        </div>
    </nav>
    <style>
        header.masthead {
            padding-top: 10.5rem;
            padding-bottom: 6rem;
            text-align: center;
            color: #fff;
            background-image: url('static/img/Fondo.jpg');
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        section.signup-section {
            padding: 10rem 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.5) 75%, #000000 100%), url("static/img/Fondo.jpg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

    </style>
    <!-- Masthead-->
    <header class="masthead">
        {{-- <img src="{{asset('static/img/bg-masthead.jpg')}}" alt="" srcset=""> --}}
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Barber Shop</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Bienvenidos queridos usuarios al sistema de BARBER SHOP</h2>
                @if (Route::has('login'))
                @auth
                @else
                <a class="btn btn-primary js-scroll-trigger" href="{{ route('login') }}">Ingresar</a>
                @endauth
                @endif
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">¿Quiénes somos?</h2>
                    <p class="text-white-50">
                        Barber shop busca dar la mejor comodida a todos los usuarios que deseen solicitar un servicio, por ello llegamos a la comidad de
                        todas las personas las 24 horas del día, creemos en ti, te invitamos a seguir navegando, registrate y se parte de nuestra gran banda,
                        recuerda, de los mejores barberos a los mejores usuarios.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="{{asset('static/img/QuienesSomos.png')}}" alt="..." />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container">
            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7"><img width="800px" class="img-fluid mb-lg-0"
                        src="{{asset('static/img/Corte.jpg')}}" alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Corte barba</h4>
                        <p class="text-black-50 mb-0">En Barber Shop somos profesionales para los mejores cortes de barberia,
                            por ello te invitamos a probar nuestros servicios de cortes de barba, confiamos en ti, de profesionales
                            a gran usuario.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="{{asset('static/img/CorteCabeza.jfif')}}"
                        alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Corte</h4>
                                <p class="mb-0 text-white-50">En Barber Shop se realizan los mejores cortes en medellín con los mejores profesionales, amigos, compañeros
                                    con los cuales tu visita será más amiga, animate, confiamos en ti.
                                </p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="{{asset('static/img/CorteCeja.jpg')}}"
                        alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Corte cejas</h4>
                                <p class="mb-0 text-white-50">En Barber Shop se han especializado en tener el mejor estilo para unas increibles cejas para todos nuestros usuarios.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x  text-white"></i>
                    <h2 class="text-white mb-5">Contantactanos en caso de una pregunta!</h2>

                    <form class="form-inline" action="{{ route('contactos.store') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="col-6 mb-3 m-0 p-1">
                            <input class="form-control mr-2 w-100 @error('nombre') is-invalid @enderror"
                                value="{{old('nombre')}}" type="text" name="nombre"
                                placeholder="Ingresa tu Nombre..." />
                        </div>
                        <input class="form-control col-6   mb-3 @error('correo') is-invalid @enderror" type="email"
                            name="correo" value="{{old('correo')}}" placeholder="Ingresa tu correo..." />

                        <input class="form-control col-12   mb-3 @error('asunto') is-invalid @enderror" type="text"
                            value="{{old('asunto')}}" name="asunto" placeholder="Ingresa el asunto..." />

                        <textarea name="mensaje" rows="10"
                            class="form-control col-12   mb-3 @error('mensaje') is-invalid @enderror"
                            placeholder="Ingresa un mensaje...">{{old('mensaje')}}</textarea>
                        <button class="btn btn-primary js-scroll-trigger col-12" type="submit">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Dirección</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">Medellín, Antioquia</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">soportemasterjj@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Télefono</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">+57 (350) 568-1869</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">Copyright &copy; Barber Shop 2021</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
