<?php

require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$text = $obj->t;

$query = "SELECT * FROM `book`";

if (!empty($text)) {
    $query .= "WHERE `title` LIKE '%" . $text . "%'";
}
?>



<div class="col-12">
    <div class="row justify-content-center gap-3">
        <?php
        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        for ($x = 0; $x < $product_num; $x++) {

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