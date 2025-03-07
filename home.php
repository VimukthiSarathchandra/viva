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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            session_start();
            require "connection.php";
            include "header.php";
            ?>

            <main id="SearchResult">

                <section class="breadcrumbs">
                    <div class="container">

                        <div class="row">

                            <div class="col-12 justify-content-center d-lg-none d-block">
                                <div class="row mb-3 mt-3">

                                    <div class="col-12 col-lg-6">

                                        <div class="input-group mt-5 mb-3">
                                            <input type="text" class="form-control" id="basic_search_txt" aria-label="Text input with dropdown button" placeholder="Type Keyword to search...">
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-1 d-grid">
                                        <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);">Search</button>
                                    </div>

                                </div>
                            </div>

                            <hr />

                            <div class="col-12">
                                <div class="row">

                                    <div class=" col-lg-12 d-none d-lg-block mx-lg-auto">

                                        <div id="carouselExampleIndicators" class="carousel slide mx-5" data-bs-ride="true">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/img/slide/slide-2.jpg" class="d-block w-100 poster-img">
                                                    <div class="carousel-caption d-none d-md-block poster-caption">
                                                        <h3 class="poster-title1"><span class="poster-title">Welcome to </span>Akshara</h3>
                                                        <p class="poster-text text-black">Sri lanka Best Online Book Shop.</p>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <img src="assets/img/slide/slide-5.jpg" class="d-block w-100 poster-img">
                                                </div>

                                                <div class="carousel-item">
                                                    <img src="assets/img/slide/slide-1.jpg" class="d-block w-100 poster-img">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                                <span class="visually-hidden ">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12" id="allProduct">
                                        <?php
                                        $c_rs = Database::search("SELECT * FROM `category`");
                                        $c_num = $c_rs->num_rows;

                                        for ($y = 0; $y < $c_num; $y++) {
                                            $cdata = $c_rs->fetch_assoc();
                                        ?>

                                            <!-- category name -->

                                            <div class="col-12 mt-3 mb-3">
                                                <a href="#" class="text-decoration-none link-dark fs-3 fw-bold"><?php echo $cdata["category"]; ?></a> &nbsp;&nbsp;
                                                <a href="#" class="text-decoration-none link-dark fs-6" onclick='allProduct(<?php echo $cdata["id"]; ?>, 0);'>See All &nbsp; &rarr;</a>
                                            </div>

                                            <!-- category name -->

                                            <!-- Products-->

                                            <div class="col-12 mb-3">
                                                <div class="row border border-primary rounded-3 shadow">

                                                    <div class="col-12">
                                                        <div class="row justify-content-center gap-2">


                                                            <?php

                                                            $product_rs = Database::search("SELECT * FROM `book` WHERE `category_id`='" . $cdata["id"] . "' AND 
                                                        `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                                                            $product_num = $product_rs->num_rows;

                                                            for ($z = 0; $z < $product_num; $z++) {
                                                                $product_data = $product_rs->fetch_assoc();

                                                            ?>
                                                                <div class="card col-6 col-lg-1 mt-2 mb-2" style="width: 14rem;" onclick='window.location="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>";'>
                                                                    <?php

                                                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $product_data["id"] . "'");
                                                                    $image_data = $image_rs->fetch_assoc();

                                                                    $price = $product_data["price"];
                                                                    $adding_price = ($price / 100) * 5;
                                                                    $new_price = $price + $adding_price;

                                                                    ?>
                                                                    <img src="<?php echo $image_data["path"]; ?>" class="mx-2 img-thumbnail mt-2" style="height: 180px;" />
                                                                    <div class="card-body ms-0 m-0 ">
                                                                        <span class="card-title fs-6 "><?php echo $product_data["title"]; ?></span><br />
                                                                        <span class="card-text fw-bold text-black">Rs. <?php echo $product_data["price"]; ?> .00</span> <br />
                                                                        <span class=" text-black-50 text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Products-->

                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </main><!-- End #main -->

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