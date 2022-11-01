<?php

// $_SESSION["userEmail"]


session_start();
$id = $_SESSION["userEmail"]["id"];
require "connection.php";

$fName = $_POST["upFname"];
$lName = $_POST["upLname"];
$contact = $_POST["upContact"];
$email = $_POST["upEmail"];
$password = $_POST["upPassword"];
$cnfrmPassword = $_POST["upCnfrmPassword"];
$addLine1 = $_POST["upAddline1"];
$addLine2 = $_POST["upAddline2"];
$city = $_POST["upCity"];
$postalCode = $_POST["upPostalCode"];

if (isset($_FILES["img"])) {
    $imagefile = $_FILES["img"];
}

// $arr = var_dump(explode(' ',$name));
// echo $arr;
// echo $arr[0];

if (empty($fName)) {
    echo "Please Enter your First Name";
} else if (empty($lName)) {
    echo "Please Enter your Last Name";
} else if (empty($email)) {
    echo "Please Enter your email address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please Enter Valid Email Address";
} else if (empty($contact)) {
    echo "Please Enter your Contact Number";
} else if (strlen($contact) != 10) {
    echo "Please Enter 10 Digit Mobile number";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $contact) == 0) {
    echo "Invalide mobile number \n (fixed line numbers are not allowed)";
} else if (empty($password)) {
    echo "Please Enter your Password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password length must between 5 to 20";
} else if (empty($cnfrmPassword)) {
    echo "Please Confirm your password";
} else if ($password != $cnfrmPassword) {
    echo "Your Password and Confirmation password does not match";
} else if (empty($addLine1)) {
    echo "Please Enter your Address Line 1";
} else if (empty($addLine2)) {
    echo "Please Enter your Address Line 2";
} else if (empty($city)) {
    echo "Please Enter your City";
} else if (empty($postalCode)) {
    echo "Please Enter your postal code";
} else if (strlen($postalCode) < 5) {
    echo "Please valid postal Code";
} else {
    // updating user table
    Database::iud("UPDATE user SET `first_name` = '" . $fName . "',`last_name` = '" . $lName . "',`email` = '" . $email . "', `password` = '" . $password . "', `contact_number` = '" . $contact . "' WHERE `id` = '" . $id . "'");

    $rs = Database::search("SELECT * FROM `user_has_address` WHERE user_id = '" . $id . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        Database::iud("UPDATE user_has_address SET line1= '" . $addLine1 . "',line2 = '" . $addLine2 . "',city = '" . $city . "',postal_code = '" . $postalCode . "' WHERE user_id = '" . $id . "'");
    } else {
        Database::iud("INSERT INTO user_has_address (`line1`,`line2`,`city`,`postal_code`,`user_id`) VALUES ('" . $addLine1 . "','" . $addLine2 . "','" . $city . "', '" . $postalCode . "' ,'" . $id . "')");
    }

    $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");

    if (isset($_FILES["img"])) {
        $image = $_FILES["img"];
    }

    if (isset($image)) {
        // echo $image["name"];
        $file_extention = $image["type"];
        if (in_array($file_extention, $allowed_image_extention)) {
            $fileName = "resources//profpic//" . uniqid() . $image["name"];
            move_uploaded_file($image["tmp_name"], $fileName);

            // pi = profile Image

            $pirs = Database::search("SELECT * FROM prof_img WHERE user_id = '" . $id . "' ");
            $pin = $pirs->num_rows;

            if ($pin == 1) {
                Database::iud("UPDATE prof_img SET `code` = '" . $fileName . "' WHERE user_id = '" . $id . "'");
            } else {
                Database::iud("INSERT INTO prof_img (`code`, `user_id`) VALUES('" . $fileName . "','" . $id . "')");
            }
        } else {
            echo "Please select a valid Image.";
        }
    }

    echo "updated successfully";
}
