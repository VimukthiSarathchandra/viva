<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>AdminPanel | Akshara</title>
        <link rel="icon" href="assets/img/A_icon.jpg">

        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />
        <link href="assets/css/style.css" rel="stylesheet">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="col-2 col-lg-2 fixed-bottom d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 align-items-start bg-dark vh-100">
                            <div class="row g-1 text-center">

                                <div class="col-12 mt-5">

                                    <img src="assets/img/A_icon.jpg" onclick="window.location='index.php'" class="rounded-circle" style="width: 80px;" id="viewImg" />

                                    <div class="mx-5 mt-1">
                                        <a href="index.php">
                                            <h4>Akshara</h4>
                                        </a>
                                    </div>
                                    <hr class="border border-1 border-white" />


                                </div>
                                <div class="nav flex-column nav-pills me-3 mt-2 " role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">

                                        <div class="mt-3">
                                            <a href="AdminPanel.php" class="text-decoration-none ">
                                                <i class='bx bx-grid-alt fs-3'></i>
                                                <span class="text-white fs-3">Dashboard</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="addProduct.php" class="text-decoration-none">
                                                <i class='bx bx-coin-stack fs-3'></i>
                                                <span class="text-white fs-3">Add Book</span>
                                            </a>
                                        </div>
                                        <div class="mt-3 ">
                                            <a href="Products.php" class="text-decoration-none ">
                                                <i class='bx bx-box fs-3 '></i>
                                                <span class="text-white fs-3 ">Books</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="users.php" class="text-decoration-none">
                                                <i class='bx bx-user fs-3'></i>
                                                <span class="text-white fs-3">Users</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="stock.php" class="text-decoration-none nav-link active">
                                                <i class='bx bx-coin-stack fs-3'></i>
                                                <span class="text-white fs-3">Stock</span>
                                            </a>
                                        </div>

                                        <div class="mt-3 align-items-end">
                                            <a href="#" onclick="adminSignout();" class="text-decoration-none">
                                                <i class='bx bx-log-out fs-3'></i>
                                                <span class="text-white fs-3">Log out</span>
                                            </a>
                                        </div>

                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="mx-lg-auto  col-12 col-lg-12 bg-body rounded-3 mb-2">
                    <div class="row">

                        <div class=" col-lg-1 offset-lg-2 px-5 mt-5 mb-4">
                            <span class="fs-3 ">Stock</span>
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <div class="row">
                                <div class="offset-lg-2 col-8 col-lg-7 mb-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Search ..." id="stockSearch" />
                                </div>
                                <div class="col-3 col-lg-3 d-grid mb-3 mt-4">
                                    <button class="btn btn-primary" onclick="stockSearch();">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-lg-block col-lg-3 mt-5 mb-4">
                            <span class=" mt-2 mb-2 mx-2 justify-content-end">Admin :</span>
                            <span class=" mt-2 mb-2 mx-2 justify-content-end"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                        </div>
                    </div>


                </div>


                <div class="offset-lg-2 col-sm-10 col-lg-10 bg-body rounded-3 mb-2">
                    <div class="row">

                        <div class="col-12 mb-3" id="adminSearchResult">

                                <div class="col-12">
                                    <div class="row justify-content-center gap-3">
                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `book` ");
                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();

                                        ?>
                                            <div class="card col-6 col-lg-1 mt-2 mb-2" style="width: 14rem;" onclick='qty(<?php echo $product_data["id"]; ?>);'>
                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();


                                                ?>
                                                <img src="<?php echo $image_data["path"]; ?>" class="mx-2 img-thumbnail mt-2" style="height: 180px;" />
                                                <div class="card-body ms-0 m-0 ">
                                                    <span class="card-title fs-6 "><?php echo $product_data["title"]; ?></span><br />
                                                    <span class="card-text fw-bold text-black">Quantity : <?php echo $product_data["qty"]; ?></span> <br />
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

                <!--  -->


                <div class="modal" tabindex="-1" id="qtymodel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="fw-bold modal-title">Update Item.</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                            </div>

                            <div class="modal-body">
                                <div class="d-block">

                                    <div class="col-12">
                                        <div class="row">

                                            <span class="fs-6 text-danger mb-2" id="msg2"></span>

                                            <div class="form-check form-switch offset-lg-1 p-3">
                                                <input class="form-check-input" type="checkbox" role="switch" checked />
                                                <label class="form-check-label fw-bold">
                                                    Make Your Product Active
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold" style="font-size: 20px;">Quantity</label>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <input type="number" class="form-control" value="0" min="0" id="qty" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs.</span>
                                                            <input type="text" class="form-control" id="price" />
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs.</span>
                                                            <input type="text" class="form-control" id="delivery" />
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>
                                <button type="button" class="btn btn-primary rounded-4" onclick='bookUpdate(<?php echo $product_data["id"]; ?>);'>Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->

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
<?php

} else {
    echo ("You are Not a valid user");
}

?>