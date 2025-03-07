<?php

require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$text = $obj->t;
$page = $obj->p;

$query = "SELECT * FROM `book`";

if (!empty($text)) {
    $query .= "WHERE `title` LIKE '%" . $text . "%'";
}



?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <ol>
                            <li><a href="home.php">Home</a></li>
                            <li>Search</li>
                        </ol>
                    </div>
                </div>
            </section>

            <div class="col-12">
                <div class="row justify-content-center gap-2">

                    <?php


                    if ("0" != $page) {
                        $pageno = $page;
                    } else {
                        $pageno = 1;
                    }

                    $product_rs = Database::search($query);
                    $product_num = $product_rs->num_rows;


                    $results_per_page = 10;
                    $number_of_pages = ceil($product_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;

                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();

                        $product_data = $product_rs->fetch_assoc();
                    ?>


                        <div class="card col-6 col-lg-1 mt-2 mb-2 mx-2" style="width: 14rem;" onclick='window.location="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>";'>
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

    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>