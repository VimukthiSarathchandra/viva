<?php

require "connection.php";

if(isset($_GET["id"])){

        $cid = $_GET["id"];

        $cart_rs=Database::search("SELECT * FROM `cart` WHERE `id`='".$cid."'");
        $cart_data = $cart_rs->fetch_assoc();

        $user=$cart_data["user_email"];
        $book=$cart_data["book_id"];

        Database::iud("INSERT INTO `recent`(`book_id`,`user_email`) VALUES ('".$book."','".$user."') ");
       Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");
       
       echo("success");

    
}else {
    echo("SOMETHING WENT WRONG");
}

?>