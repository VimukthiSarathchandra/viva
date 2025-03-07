<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akshara Book Shop</title>
    <link rel="icon" href="assets/img/A_icon.jpg">



    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>+94 77 4573 791</span></i>
            <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: Open 24 Hours</span></i>
            <i class="bi bi-truck ms-4 d-none d-lg-flex align-items-center"><span>Fast delivery</span></i>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <h1><a href="home.php">Akshara</a></h1>

            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="about.php">About</a></li>
                    <li><a class="nav-link scrollto" href="home.php">Book</a></li>
                    <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            

        </div>
    </header>

    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-4.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>Admin</span> Sign In</h2>
                                <p class="animate__animated animate__fadeInUp"></p>
                                <div>
                                    <a href="#" onclick="show();" class="btn-menu animate__animated animate__fadeInUp scrollto">Log In</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog d-none" id="Verify">
            <div class="modal-content">

                <div class="modal-header">
                    <span class="fw-bold modal-title">Admin Verification</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <span class="fs-6 text-danger mb-2" id="msg"></span>

                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="vcode" placeholder="Verification Code" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary rounded-4" onclick="verify();" >Verify</button>
                </div>

            </div>
        </div>

        <div class="modal-dialog" id="signInBox">
            <div class="modal-content">

                <div class="modal-header">
                    <span class="fw-bold modal-title">Sign In to your Account.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="d-block">

                        <div class="col-12">
                            <div class="row">

                                <span class="fs-6 text-danger mb-2" id="msg2"></span>

                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" id="adminEmail">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-4" onclick="adminVerification();">Send Verification</button>
                </div>

            </div>
        </div>

    </div>
    <!-- Modal -->



    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>