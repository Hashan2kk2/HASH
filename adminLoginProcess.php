<?php

require "connection.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

// validations
if (empty($email)) {
    echo "Please Enter your Email Address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please Enter Valid Email Address";
} else if (empty($password)) {
    echo "Please Enter your Password";
} else {
    $usrResult =  Database::search("SELECT * FROM user WHERE email = '" . $email . "' AND `password` = '" . $password . "' AND user_type_id = '2'");
    $nr = $usrResult->num_rows;
    if ($nr == 1) {
        $d = $usrResult->fetch_assoc();
        $_SESSION["admin"] = $d;
        echo "exist";
    } else {
        echo "Invalid Details";
    }
}
