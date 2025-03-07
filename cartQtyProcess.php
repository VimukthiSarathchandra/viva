<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $json = $_POST["json"];

    $obj = json_decode($json);

    $id = $obj->id;
    $check = $obj->c;
    $cart_qty = $obj->cart;

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
            $cart_num = $cart_rs->num_rows;

    for ($x = 0; $x < $id; $x++) {
        $cart_data = $cart_rs->fetch_assoc();

        echo $id;

        // if ($check == "true") {

        //     

        //     for ($x = 0; $x < $cart_num; $x++) {
        //         $cart_data = $cart_rs->fetch_assoc();

        //         $book_rs = Database::search("SELECT * FROM `book` WHERE `id`='" . $cart_data["book_id"] . "'");
        //         $book_data = $book_rs->fetch_assoc();

        //         $total = $total + ($book_data["price"] * $cart_data["qty"]);

        //         $ship = 0;
        //         $ship = $book_data["delivery_fee"];
        //         $shipping = $shipping + $ship;

        //         if ($book_data["qty"] > 0) {
        //         }

        //         $phpobj = new stdClass();
        //         $phpobj->total = $total;
        //         $phpobj->ship = $ship;
        //         $phpobj->shipping = $shipping;


        //         $json = json_encode($phpobj);
        //         echo ($json);
        //     }
        // } else {

        //     echo ("SDG");
        // }
    }

} else {

    echo ("Please Sign In or Register");
}
