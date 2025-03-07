<?php

session_start();
require "connection.php";

if(empty($_GET["v"])){
    
    echo ("Please enter your verification");

}else{

    $v = $_GET["v"];

    $admin = Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$v."'");
    $num = $admin->num_rows;

    if($num == 1){
        $data = $admin->fetch_assoc();
        $_SESSION["au"] =$data;
        echo ("success");
    }else{
        echo ("invalid verification code.");
    }
}

?>