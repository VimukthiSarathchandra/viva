<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){
        $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);



        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thilan1218@gmail.com';
            $mail->Password = 'kpwqjtwoloevfujo';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('thilan1218@gmail.com', 'Reset Password');
            $mail->addReplyTo('thilan1218@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Forgot Password Verification Code';
            $bodyContent = '<span style="color:black; font-size: 25px;">Your Verification code is : <span style="color:green; font-size: 20px;">' . $code . '</span></span>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }
        
    }else{
        echo ("Invalid Email address");
    }

}

?>