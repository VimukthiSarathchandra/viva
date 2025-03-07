<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$json = $_POST["json"];

$obj = json_decode($json);

$adminEmail = $obj->email;


if (empty($adminEmail)) {

    echo ("Email field should not be empty.");
} else {


    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $adminEmail . "'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0) {

        $code = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $adminEmail . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thilan1218@gmail.com';
        $mail->Password = 'kpwqjtwoloevfujo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('thilan1218@gmail.com', 'Admin Verification Code');
        $mail->addReplyTo('thilan1218@gmail.com', 'Admin Verification Code');
        $mail->addAddress($adminEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Admin Verification Code ';
        $bodyContent = '<span style="color:black; font-size: 25px;">Verification Code : <span style="color:black; font-size: 20px;">' . $code . '</span></span>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }
        // echo 'Success';

    } else {
        echo ("You are not a valid user");
    }
}

?>
