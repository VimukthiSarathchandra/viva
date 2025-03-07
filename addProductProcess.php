<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$json = $_POST["json"];

$obj = json_decode($json);

$title = $obj->title;
$category = $obj->category;
$language = $obj->language;
$author = $obj->author;
$publisher = $obj->publi;
$qty = $obj->qty;
$paper = $obj->paper;
$cost = $obj->price;
$delivery = $obj->delivery;

if (empty($title)) {
    echo ("Please Enter a Title");
} else if (strlen($title) >= 100) {
    echo ("Title should have lover than 100 characters");
} else if ($category == "0") {
    echo ("Please select a Category");
} else if ($language == "0") {
    echo ("Please select a Language");
} else if ($author == "0") {
    echo ("Please select a Author");
} else if ($publisher == "0") {
    echo ("Please select a Publisher");
} else if (empty($cost)) {
    echo ("Please Enter the Price.");
} else if (!is_numeric($cost)) {
    echo ("Invalid input for Cost");
} else if (empty($qty)) {
    echo ("Please Enter the Quantity.");
} else if ($qty == "0" | $qty == "e" | $qty < 0) {
    echo ("Invalid input for Quantity");
} else if (empty($paper)) {
    echo ("Please Enter the Book Paperback.");
} else if ($paper == "0" | $paper == "e" | $paper < 0) {
    echo ("Invalid input for Book Paperback");
} else if (empty($delivery)) {
    echo ("Please Enter the delivery fee.");
} else if (!is_numeric($delivery)) {
    echo ("Please Enter the delivery fee");
} else {


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

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

            $file_name = "resource/product_images/" . $title . "_" . uniqid() . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);

            Database::iud("INSERT INTO `book`
    (`title`,`paperback`,`category_id`,`Publisher_id`,`datetime_added`,`language_id`,`type`,`status_id`,
    `price`,`qty`,`delivery_fee`,`author_id`) VALUES 
    ('" . $title . "','" . $paper . "','" . $category . "','" . $publisher . "','" . $date . "','" . $language . "','1','" . $status . "',
    '" . $cost . "','" . $qty . "','" . $delivery . "','" . $author . "')");

            $product_id = Database::$connection->insert_id;


            Database::iud("INSERT INTO `images` (`path`,`book_id`) VALUES 
                ('" . $file_name . "','" . $product_id . "')");

            echo ("Product saved successfully");
        }
    } else {
        echo ("Please select a Image");
    }
}
