<?php

require "connection.php";

if (isset($_GET["id"])) {
    
    $wid=$_GET["id"];

    $watch_rs = Database:: search ("SELECT * FROM `watchlist`  WHERE `id`='".$wid."'  ");
    $watch_num=$watch_rs->num_rows;
    $watch_data=$watch_rs->fetch_assoc();

    if ($watch_num==0) {
        echo ("Something went wrong. please try again later.");

    }else{
        Database::iud("INSERT INTO `recent`(`book_id`,`user_email`) VALUES
         ('".$watch_data["book_id"]."','".$watch_data["user_email"]."') ");
        Database::iud("DELETE FROM `watchlist` WHERE `id`='".$wid."'");
        
        echo ("success");
    }
}else {
    echo ("Please select product");
}
?>