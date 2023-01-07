<?php

session_start();

$password = $_SESSION["admin"]["password"];

$oldpw = $_POST["oldPw"];
$newpw = $_POST["newPw"];
$cnfmpw = $_POST["cnfmPw"];

$uppercase = preg_match('@[A-Z]@', $newpw);
$lowercase = preg_match('@[a-z]@', $newpw);
$number    = preg_match('@[0-9]@', $newpw);

if (empty($oldpw)) {
    echo "Please Enter Your Old Password";
} else if (empty($newpw)) {
    echo "Please Enter your New Password";
} else if (empty($cnfmpw)) {
    echo "Please Confirm your Password";
} else if (!$uppercase || !$lowercase || !$number || strlen($newpw) < 8) {
    echo "Your password must contain uppercase, lowercase characters and numbers. Must contain atleast 8 characters";
} else if ($newpw != $cnfmpw) {
    echo "Your Confirmed Password dosen't match with your New Password";
} else if ($newpw == $oldpw) {
    echo "Please Try Another Password.";
}else if($oldpw != $password){
    echo "Your Entered Old Password Dosen't Match with your Actual Old Password";
}else{
    Database::iud("UPDATE user SET `password` = '' WHERE `id` = '' AND `password` = '".$newpw."'");
}

// }
