<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>invoice | Akshara Book Shop</title>
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

<body class="home">

    <div class="container-fluid">
        <div class="row">

            <?php
            session_start();
            require "connection.php";

            if (isset($_SESSION["u"])) {

                include "header.php";

                $umail = $_SESSION["u"]["email"];
                $oid = $_GET["id"];
            ?>

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12 col-lg-10" id="page">
                            <div class="offset-lg-2">
                                <div class="row">
                                    <div class="card  col-12">

                                        <div class="logo" style="height: 100px;"></div>
                                        <div class="mx-lg-auto">
                                            <h1>Akshara</h1>
                                        </div>


                                        <div class="row mb-2 mt-2 ">
                                            <div class="card-body">
                                                <?php
                                                $address_rs = Database::search("SELECT * from `address` WHERE `user_email`='" . $umail . "'");
                                                $address_data = $address_rs->fetch_assoc();
                                                ?>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="fw-bold">TO :</span><br>
                                                        <span class="text-black-50">Deliver to:</span><span class="fs-5"> <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span><br>
                                                        <span class="text-black-50">Address :</span> <span class="fs-5"> <?php echo $address_data["line1"] . "," . $address_data["line2"]; ?></span><br>
                                                        <span class="text-black-50">Email :</span><span class="fs-5"> <?php echo $umail ?></span><br>
                                                        <span class="text-black-50">Contect No :</span><span class="fs-5"> <?php echo $_SESSION["u"]["mobile"]; ?></span>
                                                    </div>

                                                    <div class=" col-6 ">
                                                        <div class="offset-3">
                                                            <span class="fw-bold">From :</span><br>
                                                            <span class="text-black-50">Deliver to:</span><span class="fs-5">Akshara</span><br>
                                                            <span class="text-black-50">Address :</span> <span class="fs-5">Maradana, Colombo 10, Sri Lanka.</span><br>
                                                            <span class="text-black-50">Email :</span><span class="fs-5">info@akshara.lk</span><br>
                                                            <span class="text-black-50">Contect No :</span><span class="fs-5">+94 77 4573 791</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <?php
                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                                    $invoice_data = $invoice_rs->fetch_assoc();
                                                    ?>
                                                    <div class="col-6">
                                                        <span>Invoice No :</span>
                                                        <span>0<?php echo $invoice_data["id"]; ?></span><br>
                                                        <span>Invoice Date :</span>
                                                        <span><?php echo $invoice_data["date"]; ?></span>
                                                    </div>

                                                    <div class=" col-6 ">
                                                        <div class="offset-3">
                                                            <span>Order ID :</span>
                                                            <span>#<?php echo $invoice_data["order_id"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-12 mt-4 card">
                                                    <table class="table card-body">
                                                        <thead>
                                                            <tr class=" border border-1">
                                                                <th>#</th>
                                                                <th>Product</th>
                                                                <th class="text-end">Unit Price</th>
                                                                <th class="text-end">Quantity</th>
                                                                <th class="text-end">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr style="height: 55px;">
                                                                <td class=" fs-3">01</td>
                                                                <?php

                                                                $product_rs = Database::search("SELECT * FROM `book` WHERE `id`='" . $invoice_data["book_id"] . "'");
                                                                $product_data = $product_rs->fetch_assoc();

                                                                $unitPrice = $product_data["price"];
                                                                $qty = $invoice_data["qty"];

                                                                $OneBookPrice = $unitPrice * $qty;


                                                                ?>
                                                                <td>
                                                                    <span class="fs-4 p-2"><?php echo $product_data["title"]; ?></span>
                                                                </td>
                                                                <td class="fw-bold fs-6 text-end pt-3">Rs. <?php echo $unitPrice ?> .00</td>
                                                                <td class="fw-bold fs-6 text-end pt-3"><?php echo $qty ?></td>
                                                                <td class="fw-bold fs-6 text-end pt-3">Rs. <?php echo $OneBookPrice ?> .00</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <?php
                                                            $delivery = $product_data["delivery_fee"];


                                                            $t = $invoice_data["total"];
                                                            $g = $t - $delivery;
                                                            ?>
                                                            <tr>
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="fs-5 text-end fw-bold">Sub Total (LKR)</td>
                                                                <td class="text-end  fw-bold">Rs. <?php echo $g; ?> .00</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="fs-5 text-end fw-bold">Delivery Fee (LKR)</td>
                                                                <td class="text-end fw-bold">Rs. <?php echo $delivery; ?> .00</td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="fs-5 text-end fw-bold">Saved (LKR)</td>
                                                                <td class="text-end fw-bold">Rs. 350 .00</td>
                                                            </tr> -->

                                                            <tr>
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="fs-5 text-end fw-bold">Total Amount (LKR)</td>
                                                                <td class="text-end fw-bold">Rs. <?php echo $t; ?> .00</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                                <div class="col-12 text-center mt-5">
                                                    <span class="fs-1 ">Thank You !</span>
                                                </div>

                                                <div class="col-12">
                                                    <hr class="border border-1 border-primary" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 btn-toolbar justify-content-end">
                            <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printInvoice();"></i>Print</button>
                            <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf" onclick="printInvoice();"></i>Export as PDF</button>
                        </div>

                    </div>
                </div>

            <?php
            }
            include "footer.php";
            ?>

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