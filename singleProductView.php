<?php

require "connection.php";

if (isset($_GET["id"])) {

    $bid = $_GET["id"];

    $book_rs = Database::search("SELECT * FROM `book` INNER JOIN `category` ON 
category.id=book.category_id INNER JOIN `language` ON language.id=book.language_id INNER JOIN 
`publisher` ON publisher.id=book.Publisher_id INNER JOIN 
`status` ON status.id=book.status_id INNER JOIN 
`author` ON author.id_num=book.author_id WHERE book.id='" . $bid . "'");

    $bookImage_rs = Database::search("SELECT * FROM `images` WHERE `book_id`='" . $bid . "'");
    $bookImage_data = $bookImage_rs->fetch_assoc();

    $book_num = $book_rs->num_rows;

    if ($book_num == 1) {

        $book_data = $book_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">

            <title><?php echo $book_data["title"]; ?> | Akshara Book Shop</title>
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
            <link rel="stylesheet" href="style.css">
        </head>



        <body>

            <div class="container-fluid">
                <div class="row">


                    <?php
                    session_start();
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
                                            <li>Single Product</li>
                                        </ol>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-12  singleProduct">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-lg-4 order-2 order-lg-1 ">
                                                        <div class="row">
                                                            <div class="col-12 align-items-center border border-1 border-secondary rounded">
                                                                <img src="<?php echo $bookImage_data["path"]; ?>" class="img-thumbnail mt-1 mb-1 mx-lg-4" style="height: 500px;" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 offset-lg-1 col-lg-5 order-3">
                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="row bg-white">
                                                                    <div class="col-12 my-2 border-bottom">
                                                                        <span class="fs-3 text-dark fw-bold"><?php echo $book_data["title"]; ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row ">
                                                                    <div class="col-12 my-2 bg-white p-lg-2">
                                                                        <span class="fs-6"><b>Language : </b><?php echo $book_data["language"]; ?></span><br />
                                                                        <span class="fs-6"><b>Author : </b><?php echo $book_data["author"]; ?></span><br />
                                                                        <span class="fs-6"><b>Publisher : </b><?php echo $book_data["publisher"]; ?></span><br />
                                                                        <span class="fs-6"><b>Paperback : </b><?php echo $book_data["paperback"]; ?></span><br />
                                                                        <span class="fs-6"><b>In Stock : </b><?php echo $book_data["qty"]; ?></span><br>
                                                                    </div>
                                                                </div>
                                                                <!-- <span class="fs-6 "><b>Type :</b><div class="bg-danger"></div></span> -->

                                                            </div>
                                                        </div>
                                                        <div class="row bg-white">
                                                            <div class="col-12 my-2">
                                                                <span class="fs-5 text-dark"><b>Price : </b></span>
                                                                <span class="fs-4 text-dark"><b>Rs. <?php echo $book_data["price"]; ?> .00</b></span>

                                                            </div>
                                                            <div class="fs-6  col-12 mb-3"><b>Quantity :</b>
                                                                <span class="border border-1 border-secondary rounded float-left position-relative product-qty p-2">
                                                                    <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" value="0" id="qty_input" onkeyup='checkValue(<?php echo $book_data["qty"]; ?>);' />
                                                                    <div class="position-absolute qty-buttons">
                                                                        <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-inc ">
                                                                            <i class="bi bi-caret-up-fill text-primary fs-4" onclick='qty_inc(<?php echo $book_data["qty"]; ?>);'></i>
                                                                        </div>
                                                                        <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                            <i class="bi bi-caret-down-fill text-primary fs-4" onclick="qty_dec();"></i>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>

                                                        </div>
                                                        <?php

                                                        if ($book_data["qty"] > 0) {
                                                        ?>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-md-5 mt-5">
                                                                        <div class="card-body d-lg-grid">
                                                                            <a href="#" class="btn btn-outline-success mb-2" onclick="payNow(<?php echo $bid; ?>);">Buy Now</a>
                                                                            <a href="#" class="btn btn-outline-warning mb-2" onclick='addToCart(<?php echo $bid; ?>);'>Add To Cart</a>
                                                                            <a href="#" class="btn btn-outline-primary mb-2" id='heart<?php echo $bid; ?>' onclick='addToWatchlist(<?php echo $bid; ?>);'>Add to watchlist</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-md-5 mt-5">
                                                                        <div class="card-body d-lg-grid">
                                                                            <a href="#" class="btn btn-outline-success mb-2 disabled">Buy Now</a>
                                                                            <a href="#" class="btn btn-outline-warning mb-2 disabled">Add To Cart</a>
                                                                            <a href="#" class="btn btn-outline-primary mb-2" id='heart<?php echo $bid; ?>' onclick='addToWatchlist(<?php echo $bid; ?>);'>Add to watchlist</a>
                                                                        </div>
                                                                    </div>
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

                                <div class="col-12 ">
                                    <div class="row me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                        <div class="col-12">
                                            <span class="fs-3 fw-bold">Related Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12  my-auto mx-auto  row">

                                    <div class="col-12">
                                        <div class="row justify-content-center gap-2">


                                            <?php

                                            $c_rs = Database::search("SELECT * FROM `category`");
                                            $c_num = $c_rs->num_rows;

                                            for ($y = 0; $y < $c_num; $y++) {
                                                $cdata = $c_rs->fetch_assoc();

                                                $product_rs = Database::search("SELECT * FROM `book` WHERE `category_id`='" . $cdata["id"] . "' AND 
                                                            `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 1");
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
                                            }
                                            ?>

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
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

        </html>
<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>