<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Akshara Book Shop | My Profile</title>
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

                if (isset($_SESSION["u"])) {

                    $email = $_SESSION["u"]["email"];

                    $image_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email`='" . $email . "'");

                    $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON  user.gender_id = gender.id  WHERE `email`='" . $email . "'");

                    $Address_rs = Database::search("SELECT * FROM `user` INNER JOIN `address` ON user.email = address.user_email WHERE `email`='" . $email . "'");

                    $image_data = $image_rs->fetch_assoc();
                    $user_data = $user_rs->fetch_assoc();
                    $address_data = $Address_rs->fetch_assoc();

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
                                            <li>My Profile</li>
                                        </ol>
                                        <i class="bi bi-box-arrow-right ms-4 d-none d-lg-flex align-items-center fs-3 text-danger point" onclick="signout();"><span class="fs-6 text-black">Log Out </span></i>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

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


                                    <div class="col-12 col-lg-9">
                                        <div class="row">

                                            <div class="col-12 mt-4 mb-4">
                                                <div class="row g-2">

                                                    <div class="col-md-12">
                                                        <div class="d-flex flex-column align-items-center text-center ">

                                                            <?php

                                                            if (empty($image_data["path"])) {

                                                            ?>
                                                                <img src="assets/img/new_user.svg" class="rounded-circle mt-5" style="width: 150px;" id="viewImg" />
                                                            <?php

                                                            } else {

                                                            ?>
                                                                <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewImg" />
                                                            <?php

                                                            }
                                                            ?>
                                                            <span class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                                            <span class="fw-bold text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>

                                                            <input type="file" class="d-none" id="imageuploader" accept="image/*" />
                                                            <label for="imageuploader" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile Image</label>

                                                        </div>
                                                    </div>

                                                    <span class="text-dark fw-bold " id="amsg"></span>

                                                    <div class="col-md-12 mx-auto ">


                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="fw-bold">Profile Settings</h4>
                                                        </div>

                                                        <span class="text-dark fw-bold " id="msg"></span>

                                                        <div class="row mt-4">


                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="fn" value="<?php echo $user_data["fname"]; ?>" />
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="ln" value="<?php echo $user_data["lname"]; ?>" />
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Mobile</label>
                                                                <input type="text" class="form-control" id="mobile" value="<?php echo $user_data["mobile"]; ?>" />
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Gender</label>
                                                                <input type="text" class="form-control" readonly value="<?php echo $user_data["gender_name"]; ?>" />
                                                            </div>


                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control" readonly value="<?php echo $user_data["email"]; ?>" />
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Password</label>
                                                                <input type="password" class="form-control" readonly value="<?php echo $user_data["password"]; ?>" />
                                                            </div>

                                                            <?php

                                                            if (!empty($address_data["line1"])) {

                                                            ?>

                                                                <div class="col-12 col-lg-6">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control" id="line1" placeholder="line1" value="<?php echo $address_data["line1"]; ?>" />
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-12 col-lg-6">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control" id="line1" placeholder="line1" value="" />
                                                                </div>

                                                            <?php
                                                            }

                                                            if (!empty($address_data["line2"])) {

                                                            ?>
                                                                <div class="col-12 col-lg-6 mt-1">
                                                                    <label class="form-label"></label>
                                                                    <input type="text" class="form-control" id="line2" placeholder="line2" value="<?php echo $address_data["line2"]; ?>" />
                                                                </div>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <div class="col-12 col-lg-6 mt-1">
                                                                    <label class="form-label"></label>
                                                                    <input type="text" class="form-control" id="line2" placeholder="line2" value="" />
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                            <div class="col-12 col-lg-4 offset-lg-4 d-grid mt-3">
                                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
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

                <?php

                    include "footer.php";
                } else {
                    echo ("You are Not a valid user");
                }

                ?>
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