<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Akshara Book Shop | Cart</title>
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
                                            <li>Cart</li>
                                        </ol>
                                    </div>

                                </div>



                                <div class="col-12 mb-3">
                                    <div class="row">

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class=" col-11 col-lg-3 d-none d-lg-block position-absolute mt-lg-4">


                                            <a href="#" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">Manage My Account</a>
                                            <div class="mx-3 mb-4 mt-3">
                                                <a class="text-decoration-none text-secondary" href="profile.php">My Profile</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">Address Book</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">My Payment Options</a><br>
                                                <a class="text-decoration-none text-secondary" href="purchasedHistory.php">Purchase</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">Vouchers</a>
                                            </div>

                                            <a href="purchasedHistory.php" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">My Orders</a>
                                            <div class="mx-3 mb-4 mt-3">
                                                <a class="text-decoration-none text-secondary" href="#">My Returns</a><br>
                                                <a class="text-decoration-none text-secondary" href="#">My Cancellations</a>
                                            </div>
                                            <a href="watchlist.php" class="fw-bold fs-4 text-decoration-none text-dark">Watchlist</a>



                                        </div>

                                        <?php

                                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                                        $cart_num = $cart_rs->num_rows;

                                        if ($cart_num == 0) {

                                        ?>
                                            <!-- Empty View -->
                                            <div class="col-12 offset-lg-3 col-lg-9">
                                                <div class="row">
                                                    <div class="col-12 emptyCart"></div>
                                                    <div class="col-12 text-center mb-2">
                                                        <label class="form-label fs-1 fw-bold">
                                                            You have no items in your Cart yet.
                                                        </label>
                                                    </div>
                                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                        <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                                            Start Shopping
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Empty View -->
                                        <?php

                                        } else {

                                        ?>


                                            <div class="col-12 col-lg-6 offset-lg-3">

                                                <!-- products -->
                                                <div class="col-12">
                                                    <div class="row">
                                                        <?php


                                                        for ($x = 0; $x < $cart_num; $x++) {
                                                            $cart_data = $cart_rs->fetch_assoc();

                                                            $book_rs = Database::search("SELECT * FROM `book` WHERE `id`='" . $cart_data["book_id"] . "'");
                                                            $book_data = $book_rs->fetch_assoc();

                                                            // $total = $total + ($book_data["price"] * $cart_data["qty"]);

                                                            // $ship = 0;
                                                            // $ship = $book_data["delivery_fee"];
                                                            // $shipping = $shipping + $ship;

                                                            if ($book_data["qty"] > 0) {

                                                        ?>
                                                                <div class="card mb-3 mx-0 col-12">
                                                                    <div class="row g-0">

                                                                        <div class="form-check mt-2">
                                                                            <input class="form-check-input " type="checkbox" id="check" onclick='cartNum(<?php echo $cart_data["id"]; ?>);'>
                                                                        </div>


                                                                        <div class="col-md-4">

                                                                            <?php
                                                                            $img = array();

                                                                            $images_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $cart_data["book_id"] . "'");
                                                                            $images_data = $images_rs->fetch_assoc();

                                                                            ?>

                                                                            <span>
                                                                                <img src="<?php echo $images_data["path"]; ?>" class="img-fluid rounded mx-5 mt-2 mb-2" style="max-width: 120px;">
                                                                            </span>

                                                                        </div>

                                                                        <div class="col-md-7">
                                                                            <div class="row">
                                                                                <div class="col-md-12 px-5">
                                                                                    <div class="card-body px-2">
                                                                                        <span class="card-title fs-4 fw-bold"><?php echo $book_data["title"]; ?></span><br>
                                                                                        <?php

                                                                                        $lng_rs = Database::search("SELECT * FROM `language` WHERE `id`='" . $book_data["language_id"] . "'");
                                                                                        $lng_data = $lng_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <span class="fw-bold text-black-50 fs-6">Language : <b class="text-black"><?php echo $lng_data["language"]; ?></b></span></br>
                                                                                        <span class="fw-bold text-black-50 fs-6">Price : <b class="text-black">Rs. <?php echo $book_data["price"]; ?> .00</b></span></br>
                                                                                        <span class="fw-bold text-black-50 fs-6">In Stock : <b class="text-black"><?php echo $book_data["qty"]; ?></b></span></br>

                                                                                        <span class="fw-bold text-black-50 fs-6 mt-3">Quantity :</span>
                                                                                        <!-- <input type="number" class="mt-3 border rounded-2   cardqtytext" value="<?php echo $book_data["qty"]; ?>"> -->
                                                                                        <input type="number" class="mt-3 border rounded-2 cardqtytext" id="cart_qty" value="1" min="1" max="<?php echo $book_data["qty"]; ?>">

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class=" offset-5">
                                                                                <i class="bi bi-trash3 fs-4" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="card mb-3 mx-0 col-12" style="background-color: #f2f1ef;">
                                                                    <div class="row g-0">

                                                                        <div class="form-check mt-2">
                                                                            <input class="form-check-input" disabled type="checkbox">
                                                                        </div>


                                                                        <div class="col-md-4">

                                                                            <?php
                                                                            $img = array();

                                                                            $images_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $cart_data["book_id"] . "'");
                                                                            $images_data = $images_rs->fetch_assoc();

                                                                            ?>

                                                                            <span>
                                                                                <img src="<?php echo $images_data["path"]; ?>" class="img-fluid rounded mx-5 mt-2 mb-2" style="max-width: 120px;">
                                                                            </span>

                                                                        </div>

                                                                        <div class="col-md-7">
                                                                            <div class="row">
                                                                                <div class="col-md-12 px-5">
                                                                                    <div class="card-body px-2">
                                                                                        <span class="card-title fs-4 fw-bold"><?php echo $book_data["title"]; ?></span><br>
                                                                                        <?php

                                                                                        $lng_rs = Database::search("SELECT * FROM `language` WHERE `id`='" . $book_data["language_id"] . "'");
                                                                                        $lng_data = $lng_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <span class="fw-bold text-black-50 fs-6">Language : <b class="text-black"><?php echo $lng_data["language"]; ?></b></span></br>
                                                                                        <span class="fw-bold text-black-50 fs-6">Price : <b class="text-black">Rs. <?php echo $book_data["price"]; ?> .00</b></span></br>
                                                                                        <span class="fw-bold text-danger fs-6">Out Of Stock</span></br>

                                                                                        <span class="fw-bold text-black-50 fs-6 mt-3">Quantity :</span>
                                                                                        <!-- <input type="number" class="mt-3 border rounded-2   cardqtytext" value="<?php echo $book_data["qty"]; ?>"> -->
                                                                                        <input type="number" class="mt-3 border rounded-2 cardqtytext" value="0" min="0" max="<?php echo $book_data["qty"]; ?>" disabled>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class=" offset-5">
                                                                                <i class="bi bi-trash3 fs-4" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                    </div>
                                                </div>
                                                <!-- products -->

                                            </div>


                                            <!-- summary -->
                                            <div class=" col-12 col-lg-3">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fs-5 mx-2 mt-2">Order Summary</label>
                                                            <hr />
                                                        </div>

                                                        <div class="col-6 mb-3">
                                                            <span class="fs-6  mx-2">items (<?php echo $cart_num; ?>)</span>
                                                        </div>

                                                        <div class="col-6 text-end mb-3">
                                                            <span class="fs-6 fw-bold mx-2">Rs. <?php echo $total; ?> .00</span>
                                                        </div>

                                                        <div class="col-6">
                                                            <span class="fs-6 mx-2">Shipping</span>
                                                        </div>

                                                        <div class="col-6 text-end">
                                                            <span class="fs-6 fw-bold mx-2">Rs. <?php echo $shipping; ?> .00</span>
                                                        </div>

                                                        <div class="col-12 mt-3">
                                                            <hr />
                                                        </div>

                                                        <div class="col-6 mt-2">
                                                            <span class="fs-5 mx-2">Total</span>
                                                        </div>

                                                        <div class="col-6 mt-2 text-end">
                                                            <span class="fs-6 fw-bold mx-2">Rs. <?php echo ($shipping + $total); ?> .00</span>
                                                        </div>
                                                        <?php
                                                        $payment = $shipping + $total;
                                                        ?>

                                                        <div class="col-11  mt-3 mb-3 d-grid">
                                                            <a href="invoice.php" class="btn btn-primary fs-6 ms-auto">CHECKOUT</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mt-4 d-none d-lg-block">
                                                    <div class="row mx-2 mb-2 mt-2 g-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label fw-bold" style="font-size: 20px;">We accept:</label>
                                                                <!-- <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner_dark.png" alt="PayHere" width="250" /></a> -->
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-2 pm pm1"></div>
                                                                    <div class="col-2 pm pm2"></div>
                                                                    <div class="col-2 pm pm3"></div>
                                                                    <div class="col-2 pm pm4"></div>
                                                                    <div class="col-2 pm pm6"></div>
                                                                    <div class="col-2 pm pm5"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- summary -->
                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>

                            </div>
                        </section>

                    </main>

                </div>
            </div>

        </body>




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
<?php
    include "footer.php";
} else {

    echo ("Please Sign In or Register");
}
?>