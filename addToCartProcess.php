<?php

session_start();
require "connection.php";

if (isset($_SESSION["userEmail"])) {

    if (isset($_GET)) {
        $pid = $_GET["pid"];
        $uid = $_SESSION["userEmail"]["id"];

        $cartProduct_rs = Database::search("SELECT * FROM `cart` WHERE 
        user_id='" . $uid . "' AND product_id='" . $pid . "'");
        $cart_product_num = $cartProduct_rs->num_rows;

        $product_qty_rs = Database::search("SELECT `qty` FROM `product` WHERE id='" . $pid . "'");
        $product_qty_data = $product_qty_rs->fetch_assoc();

        $product_qty = $product_qty_data["qty"];

        if ($cart_product_num == 1) {
            $cartProductData = $cartProduct_rs->fetch_assoc();
            $currentQty = $cartProductData["qty"];
            $newQty = (int)$currentQty + 1;

            if ($product_qty >= $newQty) {
                Database::iud("UPDATE `cart` SET `qty`='" . $newQty . "' 
                WHERE user_id='" . $uid . "' AND product_id='" . $pid . "'");

                echo "Product quantity Updated";
            } else {
                echo "Invalid Product Quantity";
            }
        } else {
            Database::iud("INSERT INTO `cart` (`product_id`,`user_id`,`qty`) VALUES 
            ('" . $pid . "','" . $uid . "','1')");

            echo "New Product added to the cart";
        }
    }
} else {
    echo "Please Sign in or Register";
}
