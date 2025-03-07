<?php

require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$email = $obj->e;
$np = $obj->np;
$rnp = $obj->rnp;
$vcode = $obj->vcode;

if (empty($email)) {
    echo("Missing Email Address");
}else if (empty($np)) {
    echo("please insert a new password");
}else if (strlen($np)<5 || strlen($np)>20) {
    echo(" Invalid Password");
}else if (empty($rnp)) {
    echo("Please re-type your new password");
}else if ($np != $rnp) {
    echo("Password does not matched");
}else  if (empty($vcode)) {
    echo("please enter your varification code");
}else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' AND
    `verification_code`='".$vcode."'");

    $n =$rs->num_rows;

    if ($n ==  1) {
        Database::iud("UPDATE `user` SET `password` = '".$np."' WHERE `email`='".$email."'");
        echo("success");
    }else {
        echo("Invalid Email or Varification Code");
    }


}
