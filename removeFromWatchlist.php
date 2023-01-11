<?php

session_start();
require "connection.php";

if (isset($_SESSION["userEmail"])) {
    if (isset($_GET["id"])) {
        $pid = $_GET["id"];
        $uid = $_SESSION["userEmail"]["id"];
        $wishlistRs = Database::search("SELECT * FROM watchlist WHERE product_id = '" . $pid . "' AND user_id = '" . $uid . "'");

        $wishlistNr = $wishlistRs->num_rows;
        if ($wishlistNr == 1) {
            $wishlistData = $wishlistRs->fetch_assoc();
            $listId = $wishlistData["id"];

            Database::iud("DELETE FROM `watchlist` WHERE `id`='" . $listId . "'");
            echo "removed";
        }
    }
} else {
    echo "Please Sign in or Register";
}
