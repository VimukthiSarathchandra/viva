<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
?>
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
                                            <li>Watchlist</li>
                                        </ol>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="row">

                                                <div class="col-12 mt-3">

                                                    <div class="row">

                                                        <div class=" col-11 col-lg-3 d-none d-lg-block">
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
                                                        $user = $_SESSION["u"]["email"];

                                                        $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
                                                        $watch_num = $watch_rs->num_rows;

                                                        if ($watch_num == 0) {
                                                        ?>
                                                            <!-- empty view -->
                                                            <div class="col-12 col-lg-9">
                                                                <div class="row">
                                                                    <div class="col-12 emptyView"></div>
                                                                    <div class="col-12 text-center">
                                                                        <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                                                    </div>
                                                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                                        <a href="home.php" class="btn btn-outline-warning fs-3 fw-bold">Start Shopping</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- empty view -->
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <div class="col-12 col-lg-9 mt-5">
                                                                <div class="row">

                                                                    <!-- <div class="card  mx-0 mx-lg-2 col-12 d-none d-lg-block">
                                                                        <div class="row mb-2 mt-2 g-0">
                                                                            <div class="col-10">
                                                                                <span class="card-title fs-6 mt-2 point text-primary">Add to All Card</span>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <span class="card-title fs-6 mt-2 point text-black offset-5"><i class="bi bi-pencil-square mx-1"></i>Edit</span>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    <?php
                                                                    for ($x = 0; $x < $watch_num; $x++) {
                                                                        $watch_data = $watch_rs->fetch_assoc();
                                                                    ?>
                                                                        <div class=" mb-3 mt-4 mx-0 mx-lg-2 col-12">
                                                                            <div class="row g-0">
                                                                                <div class="col-md-4">
                                                                                    <?php
                                                                                    $img = array();

                                                                                    $images_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $watch_data["book_id"] . "'");
                                                                                    $images_data = $images_rs->fetch_assoc();

                                                                                    ?>
                                                                                    <img src="<?php echo $images_data["path"]; ?>" class="rounded-2" style="height: 300px;" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="card-body mt-3 offset-1">
                                                                                        <?php

                                                                                        $product_rs = Database::search("SELECT * FROM `book` WHERE `id`='" . $watch_data["book_id"] . "'");
                                                                                        $product_data = $product_rs->fetch_assoc();

                                                                                        $price = $product_data["price"];
                                                                                        $adding_price = ($price / 100) * 5;
                                                                                        $new_price = $price + $adding_price;

                                                                                        ?>
                                                                                        <p class="card-title fs-2 text-dark mt-5 mb-3"><?php echo $product_data["title"]; ?></p>
                                                                                        <span class="fs-6 fw-bold text-black-50"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                                                                        <span class="fs-5 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span><br />
                                                                                        <span class="fs-4 fw-bold text-dark">Rs. <?php echo $product_data["price"]; ?> .00</span><br />
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                                if ($product_data["qty"] > 0) {
                                                                                ?>
                                                                                    <div class="col-md-3 mt-5">
                                                                                        <div class="card-body d-lg-grid">
                                                                                            <a href="#" class="btn btn-outline-primary mb-lg-2 rounded-5" onclick='moveToCart(<?php echo $product_data["id"]; ?>);'>Move To Cart</a>
                                                                                            <a href="#" class="btn btn-outline-danger rounded-5" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <div class="col-md-3 mt-5">
                                                                                        <div class="card-body d-lg-grid">
                                                                                            <a href="#" class="btn btn-outline-primary mb-lg-2 rounded-5 disabled">Move To Cart</a>
                                                                                            <a href="#" class="btn btn-outline-danger rounded-5" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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