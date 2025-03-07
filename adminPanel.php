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

            <div class="col-2r col-lg-2 fixed-bottom d-none d-lg-block">
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
                                            <a href="AdminPanel.php" class="text-decoration-none nav-link active">
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
                                            <a href="Products.php" class="text-decoration-none">
                                                <i class='bx bx-box fs-3 '></i>
                                                <span class="text-white fs-3 ">Books</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="users.php" class="text-decoration-none ">
                                                <i class='bx bx-user fs-3'></i>
                                                <span class="text-white fs-3">Users</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="stock.php" class="text-decoration-none">
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

                        <div class="offset-lg-2 col-lg-1 mt-5 mb-4 px-5">
                            <span class="fs-3">Dashboard</span>
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <div class="row">
                                <div class="offset-lg-2 col-8 col-lg-7 mb-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Search ..." />
                                </div>
                                <div class="col-3 col-lg-3 d-grid mb-3 mt-4">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-lg-block col-lg-3 mt-5 mb-4">
                            <span class=" mt-2 mb-2 mx-2 justify-content-end">Admin :</span>
                            <span class=" mt-2 mb-2 mx-2 justify-content-end"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                        </div>
                    </div>
                </div>

                <div class="mx-lg-auto  col-12 col-lg-8 bg-body rounded-3 mb-2">

                    <div class="row">
                        <div class="home-content offset-1">
                            <div class="overview-boxes">
                                <div class="box">
                                    <div class="right-side">
                                        <div class="box-topic">Total Order</div>
                                        <div class="number">40,876</div>
                                        <div class="indicator">
                                            <i class='bx bx-up-arrow-alt'></i>
                                            <span class="text">Up from yesterday</span>
                                        </div>
                                    </div>
                                    <i class='bx bx-cart-alt cart'></i>
                                </div>
                                <div class="box">
                                    <div class="right-side">
                                        <div class="box-topic">Total Sales</div>
                                        <div class="number">38,876</div>
                                        <div class="indicator">
                                            <i class='bx bx-up-arrow-alt'></i>
                                            <span class="text">Up from yesterday</span>
                                        </div>
                                    </div>
                                    <i class='bx bxs-cart-add cart two'></i>
                                </div>
                                <div class="box">
                                    <div class="right-side">
                                        <div class="box-topic">Total Profit</div>
                                        <div class="number">128,076</div>
                                        <div class="indicator">
                                            <i class='bx bx-up-arrow-alt'></i>
                                            <span class="text">Up from yesterday</span>
                                        </div>
                                    </div>
                                    <i class='bx bx-cart cart three'></i>
                                </div>
                                <div class="box">
                                    <div class="right-side">
                                        <div class="box-topic">Total Return</div>
                                        <div class="number">11,086</div>
                                        <div class="indicator">
                                            <i class='bx bx-down-arrow-alt down'></i>
                                            <span class="text">Down From Today</span>
                                        </div>
                                    </div>
                                    <i class='bx bxs-cart-download cart four'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="offset-lg-2 p-5 col-sm-10 col-lg-10 bg-body rounded-3 mb-2">
                    <div class="row ">

                        <div class="col-12">
                            <span class="text-center fs-4 ">Recent Sales</span>
                        </div>

                        <div class="offset-lg-0 col-12 col-lg-11 mb-2 col-sm-12 card">
                            <div class="row">

                                <div class="col-12">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3 bg-light mb-3">
                                                <label class="form-label fs-3 fw-bold">Product</label><br>
                                                <span class="fs-5">iPhone12</span><br>
                                                <span class="fs-5">Mavic 3</span><br>
                                                <span class="fs-5">Insta360</span><br>
                                                <span class="fs-5">iPhone14</span><br>
                                                <span class="fs-5">Asus Lap</span><br>
                                                <span class="fs-5">Canon Camera</span><br>
                                                <span class="fs-5">Go Pro</span><br>

                                            </div>
                                            <div class="col-3 bg-light mb-3">
                                                <label class="form-label fs-3 fw-bold">Seller</label><br>
                                                <span class="fs-5">Vimukthi</span><br>
                                                <span class="fs-5">Thilan</span><br>
                                                <span class="fs-5">Vimukthi</span><br>
                                                <span class="fs-5">Vimukthi</span><br>
                                                <span class="fs-5">Man Shahi</span><br>
                                                <span class="fs-5">Kusal</span><br>
                                                <span class="fs-5">Dasun</span><br>
                                            </div>
                                            <div class="col-3 bg-light mb-3">
                                                <label class="form-label fs-3 fw-bold">Status</label><br>
                                                <span class="fs-5">Delivered</span><br>
                                                <span class="fs-5">Pending</span><br>
                                                <span class="fs-5">Returned</span><br>
                                                <span class="fs-5">Pending</span><br>
                                                <span class="fs-5">Delivered</span><br>
                                                <span class="fs-5">Pending</span><br>
                                                <span class="fs-5">Delivered</span><br>
                                            </div>
                                            <div class="col-3 bg-light  mb-3">
                                                <label class="form-label fs-3 fw-bold">Time</label><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                                <span class="fs-5">2022-02-12 12:01:52</span><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script src="assets/js/main.js"></script>
        <script src="assets/js/script.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("You are Not a valid user");
}

?>