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
                                            <a href="Products.php" class="text-decoration-none">
                                                <i class='bx bx-box fs-3 '></i>
                                                <span class="text-white fs-3 ">Books</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="users.php" class="text-decoration-none nav-link active">
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

                        <div class="offset-lg-2 col-lg-1 px-5 mt-5 mb-4">
                            <span class="fs-3">Users</span>
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <div class="row">
                                <div class="offset-lg-2 col-8 col-lg-7 mb-3 mt-4">
                                    <input type="text" class="form-control" placeholder="Search ..." id="adminUserSearch" />
                                </div>
                                <div class="col-3 col-lg-3 d-grid mb-3 mt-4">
                                    <button class="btn btn-primary" onclick="adminUserSearch();">Search</button>
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

                        <div class="col-12 mt-4 card" id="adminSearchResult">
                            <table class="table card-body mt-4">
                                <thead>
                                    <tr class=" border border-1">
                                        <th class="fs-4">Id</th>
                                        <th class="fs-4">Name</th>
                                        <th class="fs-4 d-none d-lg-block">Email</th>
                                        <th class="fs-4">Mobile</th>
                                        <th class="fs-4">Action</th>
                                    </tr>
                                </thead>
                                <?php


                                $u_rs = Database::search("SELECT * FROM `user`");
                                $u_num = $u_rs->num_rows;

                                for ($y = 0; $y < $u_num; $y++) {
                                    $user_data = $u_rs->fetch_assoc();

                                ?>

                                    <tbody>
                                        <tr style="height: 55px;">
                                            <td class=" fs-6 mt-2"><?php echo $y + 1; ?></td>
                                            <td>
                                                <span class="fs-4 p-2"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                            </td>
                                            <td class="fw-bold fs-6 pt-3 d-none d-lg-block"><?php echo $user_data["email"]; ?></td>
                                            <td class="fw-bold fs-6  pt-3 "><?php echo $user_data["mobile"]; ?></td>
                                            <td class="fw-bold fs-6  pt-3">
                                                <?php
                                                if ($user_data["status"] == 1) {
                                                ?>
                                                    <button id="ub<?php echo $user_data['email']; ?>" class="btn btn-danger border-0" onclick="blockUser('<?php echo $user_data['email']; ?>');">Block</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button id="ub<?php echo $user_data['email']; ?>" class="btn btn-success border-0" onclick="blockUser('<?php echo $user_data['email']; ?>');">Unblock</button>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
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