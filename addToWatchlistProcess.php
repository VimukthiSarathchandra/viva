<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $bid = $_GET["id"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `book_id`='" . $bid . "' AND 
        `user_email`='" . $email . "'");
        $watchlist_num =$watchlist_rs->num_rows;

        if($watchlist_num == 1){

            $watchlist_data = $watchlist_rs->fetch_assoc();
            $list_id = $watchlist_data["id"];

            Database::iud("DELETE FROM `watchlist` WHERE `id`='".$list_id."'");
            echo ("removed");

        }else{

            Database::iud("INSERT INTO `watchlist`(`book_id`,`user_email`) VALUES ('" . $bid . "','" . $email . "')");
            echo ("added");

        }

    }else{
        echo ("Something Went Wrong");
    }

}else{
    echo ("Please Login First");
}

?>