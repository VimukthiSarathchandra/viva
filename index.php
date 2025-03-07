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

            <?php

            session_start();

            if (isset($_SESSION["u"])) {

                $data = $_SESSION["u"];

            ?>
                <a href="#" class="book-a-table-btn scrollto" onclick="signout();">Log Out</a>
            <?php

            } else {

            ?>
                <a href="#" class="book-a-table-btn scrollto" onclick="show();">Log In</a>
            <?php

            }

            ?>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-2.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Akshara</span> Book Shop</h2>
                                <p class="animate__animated animate__fadeInUp">You can choose any type of books you want with a just one click! In here you'll find various kind of book categories such as Novels , Education , Travell , History etc. Just have a look around. Feel free to contact us if you have any issue. Thank you !.</p>
                                <div>
                                    <a href="home.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-4.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>Akshara</span> Book Shop</h2>
                                <p class="animate__animated animate__fadeInUp">You can choose any type of books you want with a just one click! In here you'll find various kind of book categories such as Novels , Education , Travell , History etc. Just have a look around. Feel free to contact us if you have any issue. Thank you !.</p>
                                <div>
                                    <a href="home.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-5.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Fast delivery</h2>
                                <p class="animate__animated animate__fadeInUp">You can choose any type of books you want with a just one click! In here you'll find various kind of book categories such as Novels , Education , Travell , History etc. Just have a look around. Feel free to contact us if you have any issue. Thank you !.</p>
                                <div>
                                    <a href="home.php
                                    " class="btn-menu animate__animated animate__fadeInUp scrollto">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->


    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog d-none" id="signUpBox">
            <div class="modal-content">

                <div class="modal-header">
                    <span class="fw-bold modal-title">Create Your Account</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                </div>

                <div class="modal-body">

                    <span class="fs-6 text-danger mb-2" id="msg"></span>

                    <div class="col-12">

                        <input type="text" class="form-control mb-3" id="f" placeholder="First name" />

                        <input type="text" class="form-control mb-3" id="l" placeholder="Last name" />

                        <input type="email" class="form-control mb-3" id="e" placeholder="Email" />

                        <input type="password" class="form-control mb-3" id="p" placeholder="Password" />

                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="m" placeholder="Mobile" />
                            </div>

                            <div class="col-6">
                                <select class="form-select" id="g">
                                    <?php

                                    require "connection.php";

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-primary mt-3">

                    <div class="col-12">
                        <div class="row">
                            <div class="input-group input-group-sm">
                                <span type="text" class="mx-auto text-black-50 point" onclick="changeView();">I have Account </span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>

                    <button type="button" class="btn btn-primary rounded-4" onclick="signUp();">Sign In</button>
                </div>

            </div>
        </div>

        <div class="modal-dialog" id="signInBox">
            <div class="modal-content">

                <div class="modal-header">
                    <span class="fw-bold modal-title">Welcome to Akshara! Please Log In</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                </div>

                <div class="modal-body">
                    <div class="d-block">

                        <div class="col-12">
                            <div class="row">

                                <span class="fs-6 text-danger mb-2" id="msg2"></span>

                                <?php

                                $Semail = "";
                                $Spassword = "";

                                if (isset($_COOKIE["email"])) {
                                    $Semail = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $Spassword = $_COOKIE["password"];
                                }

                                ?>

                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $Semail; ?>" id="emailSignIn">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" value="<?php echo $Spassword; ?>" id="passwordSignIn">
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar">
                                    <div class="btn-group" role="group" aria-label="First group">

                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="rememberme">
                                                <label class="form-check-label">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="input-group">
                                        <span><a href="#" class="text-dark" onclick="forgotPassword();">Forgot Password</a></span>
                                    </div>
                                </div>

                                <hr class="border border-primary mt-3">


                                <div class="col-12">
                                    <div class="row">
                                        <div class="input-group input-group-sm">
                                            <span type="text" class="mx-auto text-black-50 point" onclick="changeView();">Create an Account </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>

                    <button type="button" class="btn btn-primary rounded-4" onclick="signIn();">Log In</button>
                </div>

            </div>
        </div>

        <!-- forgotPassword -->
        <div class="modal-dialog d-none" id="forgotPassword">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="fw-bold modal-title">Create Your Account</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="npi" />
                                <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <span class="fs-6 text-secondary mb-2" id="fms"></span>

                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vc" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>
                    <button type="button" class="btn btn-primary rounded-4" onclick="resetpw();">Reset Password</button>
                </div>
            </div>
        </div>
        <!-- forgotPassword -->

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