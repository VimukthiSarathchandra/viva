<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `book_id` = '".$pid."' AND `user_email` = '".$email."'");
        $cart_num = $cart_rs->num_rows;

        $book_rs = Database::search("SELECT * FROM `book` WHERE `id` = '".$pid."'");
        $book_data = $book_rs->fetch_assoc();
        $book_qty = $book_data["qty"];

        if($cart_num == 1){

            $cart_data = $cart_rs->fetch_assoc();
            $current_qty = $cart_data["qty"];
            $new_qty = (int)$current_qty + 1;

            if($book_qty >= $new_qty){

                Database::iud("UPDATE `cart` SET `qty` = '".$new_qty."' WHERE `book_id` = '".$pid."' AND `user_email` = '".$email."'");
                echo ("Product Updated");

            }else{
                echo ("Invalid Quantity");
            }

        }else{

            Database::iud("INSERT INTO `cart`(`book_id`,`user_email`,`qty`) VALUES ('".$pid."','".$email."','1')");
            
            echo ("Product added successfully");

        }

    }else{
        echo ("Something went wrong");
    }

}else{
    echo ("Please Sign In or Register.");
}

?>