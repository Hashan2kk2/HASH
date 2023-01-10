<?php

session_start();
require "connection.php";

$id = $_SESSION["admin"]["id"];
$statId = "1";

$pName = $_POST["pName"];
$pCat = $_POST["pCat"];
$pType = $_POST["pType"];
$pBrand = $_POST["pBrand"];
$pDesc = $_POST["pDesc"];
$pPrice = $_POST["pPrice"];
$pDelCost = $_POST["pDelCost"];
$pDate = $_POST["pDate"];
$pQty = $_POST["prodQty"];


if (empty($pName)) {
    echo "Please Enter the product Name";
} else if (strlen($pName) > 40) {
    echo "Product name should be less than 40 Characters";
} else if ($pCat == "0") {
    echo "Please Select Category";
} else if ($pType == "0") {
    echo "Please Select the Product Type";
} else if ($pBrand == "0") {
    echo "Please Select the Brand";
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
} else if (empty($pDate)) {
    echo "Please Enter the date";
} else {
    Database::iud("INSERT INTO product (`price`,`qty`,`description`,`productName`,`date_added`,`delivery_fee`,`user_id`,`brand_id`,`status_id`,`type_id`,`category_id`) VALUES ('" . $pPrice . "','" . $pQty . "','" . $pDesc . "','" . $pName . "','" . $pDate . "','" . $pDelCost . "','" . $id . "','" . $pBrand . "','" . $statId . "','" . $pType . "','" . $pCat . "')");

    $last_id = Database::$connection->insert_id;

    $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");

    if (!isset($_FILES["pImg1"])) {
        echo "Please Select image 1";
    } else if (!isset($_FILES["pImg2"])) {
        echo "Please Select image 2";
    } else if (!isset($_FILES["pImg3"])) {
        echo "Please Select image 3";
    } else if (!isset($_FILES["pImg4"])) {
        echo "Please Select image 4";
    } else {
        $image_1 = $_FILES["pImg1"];
        $image_2 = $_FILES["pImg2"];
        $image_3 = $_FILES["pImg3"];
        $image_4 = $_FILES["pImg4"];

        $file_extention_1 = $image_1["type"];
        $file_extention_2 = $image_2["type"];
        $file_extention_3 = $image_3["type"];
        $file_extention_4 = $image_4["type"];


        if (in_array($file_extention_1, $allowed_image_extention) && in_array($file_extention_2, $allowed_image_extention) && in_array($file_extention_3, $allowed_image_extention) && in_array($file_extention_4, $allowed_image_extention)) {
            $fileName_1 = "resources//product_img//" . uniqid() . $image_1["name"];
            $fileName_2 = "resources//product_img//" . uniqid() . $image_2["name"];
            $fileName_3 = "resources//product_img//" . uniqid() . $image_3["name"];
            $fileName_4 = "resources//product_img//" . uniqid() . $image_4["name"];
            move_uploaded_file($image_1["tmp_name"], $fileName_1);
            move_uploaded_file($image_2["tmp_name"], $fileName_2);
            move_uploaded_file($image_3["tmp_name"], $fileName_3);
            move_uploaded_file($image_4["tmp_name"], $fileName_4);
            Database::iud("INSERT INTO `images` (`code`,`product_id`,`img_no`) VALUES('" . $fileName_1 . "','".$last_id."','1'),('" . $fileName_2 . "','".$last_id."','2'),('" . $fileName_3 . "','".$last_id."','3'),('" . $fileName_4 . "','".$last_id."','4') ");
            
        }
    }
    echo "OK";

}
