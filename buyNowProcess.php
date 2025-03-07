<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $pid = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];



    $array;

    // $order_id = sprintf('%08d', mt_rand(0, 99999999));
    $order_id = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

    

    $product_rs = Database::search("SELECT * FROM `book` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='".$umail."'");
    $city_num = $city_rs->num_rows;

    if($city_num == 1){

        $city_data = $city_rs->fetch_assoc();

        $address = $city_data["line1"].", ".$city_data["line2"];

        $delivery = $product_data["delivery_fee"];

        $item = $product_data["title"];
        $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;


        $hash = strtoupper(
            md5(
                "1221063" .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    "LKR" .
                    strtoupper(md5("NDA4ODMxNjA5NTI1OTIwMDIzNTIxMjgyMTQxNjkyMzk4MTA4ODcyOA=="))
            )
        );

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $user_address = $address;

        $array["hash"] = $hash;
        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $user_address;
        $array["mail"] = $umail;

        echo json_encode($array);

    }else{
        echo ("2");
    }

}else{
    echo ("1");
}

?>