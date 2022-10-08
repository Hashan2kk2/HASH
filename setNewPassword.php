<?php

require "connection.php";

session_start();
$p1 = $_POST["p1"];
$p2 = $_POST["p2"];
$email = $_SESSION["resetEmail"];

Database::iud("UPDATE final_project_webdev.user SET user.password = '".$p1."' WHERE user.email = '".$email."'");
echo "Password Updated Success";
