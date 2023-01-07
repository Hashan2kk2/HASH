<?php

session_start();
require "../connection.php";

$id = $_SESSION["admin"]["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$contact = $_POST["contact"];

if (isset($_FILES["profPic"])) {
    $imagefile = $_FILES["profPic"];
}

if(empty($fname)){
    echo "Please Enter Your First Name";
}else if(empty($lname)){
    echo "Please Enter your Last Name";
}else if(empty($email)){
    echo "Please Enter your Email Address";
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Please Enter valid email address";
}else if(strlen($contact) != 10){
    echo "Please Enter Valid mobile Number";
}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $contact) == 0){
    echo "Please Enter Valid Mobile Number";
}else{
    Database::iud("UPDATE user SET `first_name` = '" . $fname . "',`last_name` = '" . $lname . "',`email` = '" . $email . "', `contact_number` = '" . $contact . "' WHERE `id` = '" . $id . "'");

    $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");

    if (isset($_FILES["profPic"])) {
        $image = $_FILES["profPic"];
    }

    if (isset($image)) {
        // echo $image["name"];
        $file_extention = $image["type"];
        if (in_array($file_extention, $allowed_image_extention)) {
            $fileName = "..//resources//profpic//" . uniqid() . $image["name"];
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
    
    echo "Success";

}
