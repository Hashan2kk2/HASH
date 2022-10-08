<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

$rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
$n = $rs->num_rows;

if($n == 1){
    $d = $rs->fetch_assoc();
    $_SESSION["userEmail"] = $d;
}

// echo $email;
// echo $password;

if (empty($email)) {
    echo "Please Enter your Email Address";
} else if (empty($password)) {
    echo "Please Enter your Password";
} else {
    $resultset = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $n = $resultset->num_rows;
    // echo $n;
    if ($n == 1) {
        echo "success";
    } else {
        echo "Theres no account with these details. Please Check the details you have entered.";
    }
}
