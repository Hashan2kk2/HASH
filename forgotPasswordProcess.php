<?php

require "connection.php";
require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_GET["e"])) {
    $e = $_GET["e"];

    if (empty($e)) {
        echo "Please Enter Your Email Address";
    } else {
        $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "'");

        if ($rs->num_rows == 1) {
            $code = uniqid('#hash_');

            Database::iud("UPDATE `user` SET `verification_code` = '" . $code . "' WHERE `email` = '" . $e . "'");

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "hashan.lakruwan22@gmail.com";
            $mail->Password = "iuzagbuezrywidhe";
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom("hashan.lakruwan22@gmail.com");
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = "Verification Code";
            $mail->Body = '<div style="width: 100%; background-color: #b7c2eb; padding: 30px; text-align: center; display: flex; justify-content: center; align-items: center;">
            <div>
              <h1 style="font-family: sans-serif; text-align: center; width: 500px;">HASH Account Password Reset Verification Code</h1>
              <br>
              <p style=" font-family: sans-serif; text-align: center; width: 500px;">Dear HASH User,
                <br>
                We received a request to access your HASH Account <span style="color: #315afc;">hashanlakruwan4156@gmail.com</span> through your email address.
              </p>
              <br>
              <p style="width: 500px; font-family: sans-serif;">
                Your Account verification code is:
                <br>
                <span style="font-size: 30px; line-height: 70px; font-weight:bold;">319842</span>
                <br>
                If you did not request this code, it is possible that someone else is trying to access the Account hashanlakruwan4156@gmail.com. Do not forward or give this code to anyone.
              </p>
            </div>
          </div>';
            $mail->send();
        } else {
            echo "Email Address Not Found";
        }
    }
}

// iuzagbuezrywidhe
