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



<div class="col-12 bg-body rounded-3 mb-2">
    <div class="row">

        <div class="col-12 mt-4">
            <table class="table">
                <thead>
                    <tr class=" border border-1">
                        <th class="fs-4">Id</th>
                        <th class="fs-4">Title</th>
                        <th class="fs-4 d-none d-lg-block">Description</th>
                        <th class="fs-4">Add Date</th>
                        <th class="fs-4">Action</th>
                    </tr>
                </thead>
                <?php
                $product_rs = Database::search($query);
                $product_num = $product_rs->num_rows;

                for ($x = 0; $x < $product_num; $x++) {

                    $product_data = $product_rs->fetch_assoc();

                ?>
                    <tbody>
                        <tr style="height: 55px;">
                            <td class=" fs-6 mt-2"><?php echo $product_data["id"]; ?></td>
                            <td>
                                <span class="fs-4 p-2"><?php echo $product_data["title"]; ?></span>
                            </td>
                            <td class="fw-bold fs-6 pt-3 d-none d-lg-block">Apple iphone 12pro max</td>
                            <td class="fw-bold fs-6  pt-3"><?php echo $product_data["datetime_added"]; ?></td>
                            <td class="fw-bold fs-6  pt-3">
                                <?php
                                if ($product_data["status_id"] == 1) {
                                ?>
                                    <button id="pb<?php echo $product_data['id']; ?>" class="btn btn-danger" onclick="blockProduct('<?php echo $product_data['id']; ?>');">Block</button>
                                <?php
                                } else {
                                ?>
                                    <button id="pb<?php echo $product_data['id']; ?>" class="btn btn-success" onclick="blockProduct('<?php echo $product_data['id']; ?>');">Unblock</button>
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