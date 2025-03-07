<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akshara Book Shop | Contact Us</title>
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
</head>

<body>

    <div class="container-fluid">
        <div class="row">
        <?php
            session_start();
            require "connection.php";
            include "header.php";
            ?>

            <main id="main">
                <section class="breadcrumbs">
                    <div class="container">

                        <div class="d-flex justify-content-between align-items-center ">
                            <ol class="mt-5 mt-lg-0">
                                <li><a href="home.php">Home</a></li>
                                <li>Contact Us</li>
                            </ol>
                        </div>

                    </div>

                    <div class="container">


                        <section id="contact" class="contact">
                            <div class="container">

                                <div class="section-title">
                                    <h2><span>Contact</span> Us</h2>
                                    <p>If there is anything you don't understand or any kind of issue, feel free to contactus. Thank you!.</p>
                                </div>
                            </div>

                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.8833236723185!2d80.23270381520219!3d7.139488767675242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3051f820f90c7%3A0xf9eefc6006b315f0!2sGalapitamada!5e0!3m2!1sen!2slk!4v1674292258148!5m2!1sen!2slk" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                            <div class="container mt-5">

                                <div class="info-wrap">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 info">
                                            <i class="bi bi-geo-alt"></i>
                                            <h4>Location:</h4>
                                            <p>Galapitamada<br>Srilanka</p>
                                        </div>

                                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                            <i class="bi bi-clock"></i>
                                            <h4>Open Hours:</h4>
                                            <p>Monday-Saturday:<br> Open 24 Hours</p>
                                        </div>

                                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                            <i class="bi bi-envelope"></i>
                                            <h4>Email:</h4>
                                            <p>info@akshara.lk<br>contact@akshara.lk</p>
                                        </div>

                                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                            <i class="bi bi-phone"></i>
                                            <h4>Call:</h4>
                                            <p>+94 77 4573 791<br>+94 77 3345 791</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>


                </section>


            </main>

            <?php include "footer.php"; ?>
        </div>
    </div>

    
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>