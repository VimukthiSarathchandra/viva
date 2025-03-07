<?php
session_start();
require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$email = $obj->e;
$password = $obj->p;
$rememberme = $obj->rme;


if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must have between 5-20 charaters");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $n = $rs->num_rows;
    $user_Data = $rs->fetch_assoc();

    if ($n == 1) {

        if ($user_Data["status"] == 1) {

            echo ("success");
            
            $_SESSION["u"] = $user_Data;

            if ($rememberme == "true") {

                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {

                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo ("You have been blocked by admin.");
        }
    } else {
        echo ("Invalid Username or Password");
    }
}
