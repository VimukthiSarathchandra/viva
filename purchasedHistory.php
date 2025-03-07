<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akshara Book Shop | Watchlist</title>
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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

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
                            <div class="row">

                                <div class="col-12 justify-content-center d-lg-none d-block">
                                    <div class="row mb-3 mt-3">

                                        <div class="col-12 col-lg-6">

                                            <div class="input-group mt-5 mb-3">
                                                <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Type Keyword to search...">
                                            </div>

                                        </div>

                                        <div class="col-12 col-lg-1 d-grid">
                                            <button class="btn btn-primary mt-3 mb-3">Search</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <ol>
                                        <li><a href="home.php">Home</a></li>
                                        <li>purchased History</li>
                                    </ol>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class=" col-11 col-lg-3  d-none d-lg-block">

                                            <a href="#" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">Manage My Account</a>
                                            <div class="mx-3 mb-4 mt-3">
                                                <a class="text-decoration-none text-secondary" href="profile.php">My Profile</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">Address Book</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">My Payment Options</a><br>
                                                <a class="text-decoration-none text-secondary" href="purchasedHistory.php">Purchase</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">Vouchers</a>
                                                <a class="text-decoration-none text-secondary" href="myProduct.php">My Produts</a>
                                            </div>

                                            <a href="purchasedHistory.php" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">My Orders</a>
                                            <div class="mx-3 mb-4 mt-3">
                                                <a class="text-decoration-none text-secondary" href="#">My Returns</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">My Cancellations</a>
                                            </div>
                                            <a href="watchlist.php" class="fw-bold fs-4 text-decoration-none text-dark">Watchlist</a>

                                        </div>


                                        <div class="card mb-3 mx-0 col-12 col-lg-9 ms-auto">
                                            <div class="row g-0">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-10 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fw-bold text-black-50 fs-5">Order ID :</span>&nbsp;
                                                                    <span class="fw-bold text-black-50 fs-5">#3564791445</span>&nbsp;
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a href="#" class="fw-bold text-primary text-decoration-none fs-5"> Manage</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-3">

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="" title="Product Details">
                                                        <img src="resource/product_images/vivo_y20.svg" class="img-fluid rounded-start mx-5" style="max-width: 200px;">
                                                    </span>
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="card-body mt-5 ">
                                                                <span class="card-title mx-4">Vivo Y20 64GB DUAL SIM 6.51in 13MP 4GB RAM 4G LTE </span>
                                                                <span class="text-black-50">qty </span>:1<span></span>
                                                            </div>
                                                        </div>
                                                        <div class="card col-md-2 rounded-5 mt-auto" style="height: 2rem;">
                                                            <span class="mx-2 mt-1">Delivered</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Placed on 04 Apr 2022 22:18:33</span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Delivered on 07 Apr 2022</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="card mb-3 mx-0 col-12 col-lg-9 ms-auto justify-content-end">
                                            <div class="row g-0">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-10 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fw-bold text-black-50 fs-5">Order ID :</span>&nbsp;
                                                                    <span class="fw-bold text-black-50 fs-5">#3564791445</span>&nbsp;
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a href="#" class="fw-bold text-primary text-decoration-none fs-5"> Manage</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-3">

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="" title="Product Details">
                                                        <img src="resource/product_images/vivo_y20.svg" class="img-fluid rounded-start mx-5" style="max-width: 200px;">
                                                    </span>
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="card-body mt-5 ">
                                                                <span class="card-title mx-4">Vivo Y20 64GB DUAL SIM 6.51in 13MP 4GB RAM 4G LTE </span>
                                                                <span class="text-black-50">qty </span>:1<span></span>
                                                            </div>
                                                        </div>
                                                        <div class="card col-md-2 rounded-5 mt-auto" style="height: 2rem;">
                                                            <span class="mx-2 mt-1">Delivered</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Placed on 04 Apr 2022 22:18:33</span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Delivered on 07 Apr 2022</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>
                </main>

                <?php include "footer.php"; ?>

            </div>
        </div>

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