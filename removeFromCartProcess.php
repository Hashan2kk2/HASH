<?php

session_start();
require "connection.php";

if (isset($_SESSION["userEmail"])) {
    if (isset($_GET["id"])) {
        $pid = $_GET["id"];
        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "'");
        $cart_data = $cart_rs->fetch_assoc();
        Database::iud("DELETE FROM `cart` WHERE `product_id`='" . $pid . "'");

        echo "success";
    } else {
        echo "Something Went Wrong.";
    }
}
