<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SHRIMP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
    .inputfield {
        padding: 10px;
        position: relative;
        z-index: 10;
    }

    .readmore {
        color: #fff;
        text-align: center;
        padding: 5px;
    }

    .reply-form {
        position: relative;
        z-index: 10;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .breadcrumbs {
        background-size: cover;
        padding: 60px 0;
        text-align: center;
    }

    h2 {
        font-family: 'Arial', sans-serif;
        color: #444;
    }

    .form-group label {
        display: block;
        color: #555;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 15px;
        box-sizing: border-box;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .bg-sp {
        background-color: rgb(188 177 177) !important;
        margin-top: 5%;
    }

    .error-message {
        color: #e63946;
        font-size: 0.9rem;
        margin-top: -10px;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <h1>SHRIMP<span><i class="fa-solid fa-shrimp" style="color: #fff;font-size: 25px;"></i></span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href=" ">About</a></li>
                    <li><a href=" ">Categories</a></li>
                    <li><a href=" ">Vendors</a></li>
                    <li><a href=" " class="active">Login/Signup</a></li>
                    <li><a href=" ">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/breadcrumbs-bg.jpg'); padding: 60px 0; background-size: cover;">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <div class="reply-form bg-sp shadow-lg rounded p-4" style="width: 35%; max-width: 450px;">
                    <h3 class="text-center mb-4" style="font-weight: bold; color: #333;">Reset Password</h3>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" value="{{ $email }}" readonly name="email" placeholder="Email" required autofocus autocomplete="username">
                            @error('email')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            @error('password_confirmation')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>

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
                    <!-- Footer links here... -->
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

    <!-- Scroll to top button -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    @if(session('success'))
    swal({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });
    @endif

    @if(session('error'))
    swal({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error",
        button: "OK",
    });
    @endif
    </script>
</body>

</html>
