<?php

$pName = $_POST["pName"];
$pDesc = $_POST["pDesc"];
$pPrice = $_POST["pPrice"];
$pDelCost = $_POST["pDelCost"];
$pQty = $_POST["prodQty"];
$id = $_POST["id"];

session_start();
require "connection.php";

if (empty($pName)) {
    echo "Please Enter the product Name";
} else if (strlen($pName) > 40) {
    echo "Product name should be less than 40 Characters";
} else if (empty($pDesc)) {
    echo "Please add Description";
} else if (str_word_count($pDesc) > 100) {
    echo "Description should be less than 100 word";
} else if (empty($pPrice)) {
    echo "Please Enter the Price";
} else if ($pPrice == "0" || $pPrice < 0) {
    echo "Please Enter Valid Price";
} else if (!is_numeric($pPrice)) {
    echo "Please Enter Valid Price";
} else if (empty($pDelCost)) {
    echo "Please Enter Delivery Price";
} else if ($pDelCost == "0" || $pDelCost < 0) {
    echo "Please Enter Valid Delivery Cost";
} else if (!is_numeric($pDelCost)) {
    echo "Please Enter Valid Delivery Cost";
} else if (empty($pQty)) {
    echo "Please Enter Quantity";
} else if ($pQty == "0" || $pQty < 0) {
    echo "Please Enter Valid Quantity";
} else if (!is_numeric($pQty)) {
    echo "Please Enter Valid Quantity";
} else {
    Database::iud("UPDATE product SET `price` = '" . $pPrice . "',`qty`= '" . $pQty . "',`description`= '" . $pDesc . "',`productName` = '" . $pName . "',`delivery_fee` = '" . $pDelCost . "' WHERE id = '" . $id . "';");

    echo "OK";
}
