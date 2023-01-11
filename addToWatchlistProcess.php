<?php

session_start();
require "connection.php";

if (isset($_SESSION["userEmail"])) {
    if (isset($_GET["pid"])) {
        $pid = $_GET["pid"];
        $uid = $_SESSION["userEmail"]["id"];

        $wishlistRs = Database::search("SELECT * FROM watchlist WHERE product_id = '" . $pid . "' AND user_id = '" . $uid . "'");

        $wishlistNr = $wishlistRs->num_rows;
        if ($wishlistNr == 1) {
            $wishlistData = $wishlistRs->fetch_assoc();
            $listId = $wishlistData["id"];

            Database::iud("DELETE FROM `watchlist` WHERE `id`='".$listId."'");
            echo "removed";
        }else{
            Database::iud("INSERT INTO `watchlist` (`product_id`,`user_id`) VALUES 
            ('".$pid."','".$uid."')");
            echo "added";
        }
    }else{
        echo "Somthing went wrong";
    }
} else {
    echo "Please Sign in or Register";
}
