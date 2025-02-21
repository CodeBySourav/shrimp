<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SHRIMP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <style>
    .submitbtn {
        margin-top: 2%;
    }

    .form-label {
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
    }

    h5 {
        text-align: center;
        margin-bottom: 50px;
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <h1>SHRIMP<span><i class="fa-solid fa-shrimp" style="color: #fff;font-size: 25px;"></i></span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>

                    @auth
                    @if (auth()->user()->role == 1)
                    <li><a href="{{ route('categories_vender') }}">Categories</a></li>
                    <li><a href="{{ route('my_posting') }}">My posting</a></li>
                    @endif
                    @endauth

                    @auth
                    @if (auth()->user()->role == 2)
                    <li><a href="{{ route('categories_corporate_users') }}">Categories</a></li>
                    <li><a href="{{ route('corporate_users.all_vender') }}">Vendor</a></li>
                    <li><a href="{{ route('corporate_users.awaiting_vender') }}">Awaiting Vendors</a></li>
                    <li><a href="{{ route('corporate_users.all_posting') }}">All Posting</a></li>
                    <li><a href="{{ route('corporate_users.enquiries') }}">enquiries</a></li>
                    @endif
                    @endauth
 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @auth
                            @if (auth()->user()->role == 2)
                            <li>
                                <a class="dropdown-item" href="{{ route('add_corporateuser') }}">Add Corporate User</a>
                            </li>
                            @endif
                            @endauth
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('password.change') }}">Change Password</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout Form (hidden) -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>

        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>SHRIMP</h3>
                            <p>
                                101 Merritt 7 Corporate Park 3rd Floor
Norwalk, <br>
                                CT  06851<br><br>
                                <strong>Phone:</strong> +91- 9052979685<br>
                                <strong>Email:</strong> newepolimson@gmail.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Vendors</a></li>
                            <li><a href="#">Login/Signup</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Vannamei Raw IQF</a></li>
                            <li><a href="#">Vannamei Cooked IQF</a></li>
                            <li><a href="#">Black Tiger</a></li>
                            <li><a href="#">Peel Deveined Tail On</a></li>
                            <li><a href="#">HOSO</a></li>
                            <li><a href="#">Popular shrimp</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>We are here</h4>
                        <ul>
                            <li><a href="#">Hyderabad</a></li>
                            <li><a href="#">Rajahmundry</a></li>
                            <li><a href="#">Visakhapatnam</a></li>
                            <li><a href="#">Vijayawada</a></li>
                            <li><a href="#">Bangalore</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>SHRIMP</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>