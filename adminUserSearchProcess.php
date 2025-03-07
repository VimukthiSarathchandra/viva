<?php

require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$text = $obj->t;

$query = "SELECT * FROM `user`";

if (!empty($text)) {
    $query .= "WHERE `fname` LIKE '%" . $text . "%' OR `lname` LIKE '%" . $text . "%'";
}
?>



<div class="col-12 bg-body rounded-3 mb-2">
    <div class="row">

        <div class="col-12 mt-4">
            <table class="table">
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
                $user_rs = Database::search($query);
                $user_num = $user_rs->num_rows;

                for ($x = 0; $x < $user_num; $x++) {

                    $user_data = $user_rs->fetch_assoc();

                ?>
                    <tbody>
                        <tr style="height: 55px;">
                            <td class=" fs-6 mt-2"><?php echo $x + 1; ?></td>
                            <td>
                                <span class="fs-4 p-2"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                            </td>
                            <td class="fw-bold fs-6 pt-3 d-none d-lg-block"><?php echo $user_data["email"]; ?></td>
                            <td class="fw-bold fs-6  pt-3"><?php echo $user_data["mobile"]; ?></td>
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