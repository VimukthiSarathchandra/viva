<?php

require "connection.php";

if (isset($_GET["email"])) {
    
    $user_email = $_GET["email"];

    $user_rs = Database :: search("SELECT * FROM `user` WHERE `email`='".$user_email."'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {
        
        $user_Data=$user_rs->fetch_assoc();

        if ($user_Data["status"]==1) {
            Database::iud("UPDATE `user` SET `status`='0' WHERE `email`='".$user_email."'");
            echo("blocked");
        }elseif ($user_Data["status"]==0) {
            Database::iud("UPDATE `user` SET `status`='1' WHERE `email`='".$user_email."'");
            echo("unblocked");
        }


    }else {
        echo ("Cannot find the user.Please try again later.");
    }

}else {
    echo ("Somthing Went Wrong");
}

?>