<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Barber Shop</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('static/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/vendor/aos/aos.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('static/css/menu.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio - v1.5.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <style>
        #hero {
            width: 100%;
            height: 100vh;
            background: url('static/img/demo-image-02.jpg') top center;
            background-size: cover;
        }

    </style>
    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">
            <div class="profile">
                <img src="{{asset('static/img/barbero.jpg')}}" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="#">{{ Auth::user()->name }}</a></h1>
            </div>
            <nav class="nav-menu">
                <ul>
                    @if (auth::user()->rol === 'Administrador')
                    <li class="active"><a href="/home"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
                    <li><a href="{{route('categorias.index')}}"><i class="bx bx-user"></i> <span>Categoría servicios</span></a>
                    </li>
                    <li><a href="{{route('productos.index')}}"><i class="bx bx-book-content"></i>Productos</a></li>
                    <li><a href="{{route('servicios.index')}}"><i class="bx bx-server"></i>Servicios</a></li>
                    <li><a href="{{route('cita.index')}}"><i class="bx bx-calendar"></i>Citas</a></li>
                    <li><a href="{{route('index')}}"><i class="bx bx-user"></i>Usuarios</a></li>
                    <li><a href="https://youtube.com/playlist?list=PLMuCWY-YeRL_d_QSbvGGD0AwrDGWWQm7L"><i class="bx bx-user"></i>Ayuda en línea</a></li>

                    @endif
                    @if (auth::user()->rol === 'Usuario')
                    <li class="active"><a href="/home"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
                    <div class="dropdown">
                        <button class="btn btn-ligth dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catálogo
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a href="{{route('productoss.show')}}"><i class="bx bx-server"></i>Productos</a></li>
                            <li><a href="{{route('servicio.show')}}"><i class="bx bx-calendar"></i>Servicios</a></li>
                          </div>
                      </div>

                    <li><a href="{{route('servicios.MisCitas')}}"><i class="bx bx-book"></i>Mis Citas</a></li>
                    @endif

                    <li><a  class="btn btn-danger mb-5" href="{{ route('logout') }}" style="padding: 15 px" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Cerrar Sesión </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    {{--  @endguest --}}
                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('static/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('static/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('static/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('static/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('static/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('static/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('static/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('static/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('static/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('static/vendor/aos/aos.js') }}"></script>
    <!-- Fonts -->

    <!-- Template Main JS File -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>



</body>



@yield('content')
