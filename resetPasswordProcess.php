<?php

session_start();

require "connection.php";
$code = $_POST['code'];
$email = $_SESSION['resetEmail'];

$rs = Database::search("SELECT * FROM final_project_webdev.user WHERE email = '" . $email . "' AND verification_code = '" . $code . "'");

if (empty($code)) {
    echo "Please Enter the Verification Code";
} else if (!$rs->num_rows == 1) {
    echo "Invalid Verification Code";
} else {
    echo "succeess";
}
