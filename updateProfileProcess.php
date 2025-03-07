<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $json = $_POST["json"];

    $obj = json_decode($json);

    $fname = $obj->fn;
    $lname = $obj->ln;
    $mobile = $obj->mobile;
    $line1 = $obj->l1;
    $line2 = $obj->l2;


    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extention)) {
            echo ("Please select a valid image.");
        } else {
            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else  if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resource/profiles_img/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);


            $image_rs = Database::search("SELECT * FROM `profile_images` WHERE
            `user_email`='" . $_SESSION["u"]["email"] . "'");
            $image_num = $image_rs->num_rows;
            if ($image_num == 1) {

                Database::iud("UPDATE `profile_images` SET `path`='" . $file_name . "' WHERE 
                `user_email`='" . $_SESSION["u"]["email"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_images` (`path`,`user_email`) VALUES 
                ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
    WHERE `email`='" . $_SESSION["u"]["email"] . "'");

    $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
    $address_num = $address_rs->num_rows;

    if ($address_num == 1) {

        Database::iud("UPDATE `address` SET `line1`='" . $line1 . "',
        `line2`='" . $line2 . "'
         WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
    } else {

        Database::iud("INSERT INTO `address` 
        (`line1`,`line2`,`user_email`) VALUES 
        ('" . $line1 . "','" . $line2 . "','" . $_SESSION["u"]["email"] . "')");
    }

    echo ("success");
} else {
    echo ("Please login first");
}
