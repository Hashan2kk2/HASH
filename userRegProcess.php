<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$contact = $_POST["contact"];
$gender = $_POST["gender"];

// Input validations
if (empty($fname)) {
    echo "Please Enter your first Name";
} else if (strlen($fname) > 50) {
    echo "First Name should be less than 50 characters";
} elseif (empty($lname)) {
    echo "Please Enter your last Name";
} elseif (strlen($lname) > 50) {
    echo "Last Name should be less than 50 characters";
} elseif (empty($email)) {
    echo "Please Enter Your Email Address";
} elseif (strlen($email) > 100) {
    echo "Email Address should be less than 100 characters";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please Enter valid Email Address";
} else if (empty($contact)) {
    echo "Please enter your Mobile Number";
} else if (strlen($contact) != 10) {
    echo "Contact number should contain 10 characters.";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $contact) == 0) {
    echo "Invalid Mobile Number";
} elseif ($gender == "0") {
    echo "Please Select your Gender";
} elseif (empty($password)) {
    echo "Please Enter your password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password Length Should be between 5 to 20 Characters.";
} else {
    $r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'AND `contact_number`='" . $contact . "'");

    $n = $r->num_rows;

    if ($n > 0) {
        echo "User already Registered with these Email Address or Contact Number.";
        echo $n;
    } else {
        $date = new DateTime();
        $timeZone = new DateTimeZone("Asia/Colombo");
        $date->setTimezone($timeZone);
        $finalDate = $date->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`first_name`,`last_name`,`email`,`contact_number`,`password`,`gender_id`,`register_date`,`user_type_id`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $contact . "','" . $password . "','" . $gender . "','" . $finalDate . "','1')");

        echo "Success";
    }
}
