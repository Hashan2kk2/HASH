<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | HASH</title>
    <!-- css links -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ==================================== -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adminSideNav.css">
</head>

<body>
    <?php

    session_start();
    require "connection.php";

    if (isset($_SESSION["admin"])) {


        $p = $_GET["pid"];
        echo $p;
        $products = Database::search("SELECT * FROM product WHERE id = '".$p."'");
        $prodRs = $products->fetch_assoc();

    ?>
        <!-- ============= Page Content ============= -->
        <div class="wrapper d-flex align-items-stretch">
            <?php
            require "adminNav.php";
            ?>
            <div id="content" class="p-4 p-md-5 add-product">

                <div class="row">
                    <div class="col-2">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>
                    <div class="col-8 logo"></div>
                    <div class="col fs-4 fw-bold">Admin</div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h2 class="pg-title">Edit Products</h2>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8">
                        <p class="pg-description">The Most Important Feature Of The Product Editing Section Is The Product Adding Part. When Adding Product Here, Do Not Ignore
                            To Fill In All The Required Fields Completely And Follow All The Product Adding Rules.</p>
                    </div>
                </div>

                <!-- overview addproduct bar -->
                <div class="row">
                    <div class="col-12 overview-addproduct-bar">
                    </div>
                </div>
                <!-- overview addproduct bar -->


                <!-- overview -->

                <!-- Add product Form -->
                <div class="row mt-3" id="addproductPg">
                    <!-- product details box -->
                    <div class="col-12 col-lg-6 add-product">
                        <div class="row my-3">
                            <div class="col-12 d-block prod-details">
                                <label class=" text-black-50 fw-bold d-block" for="prodName">Product Name</label>
                                <input class="d-block w-100 prod-name" type="text" id="prodName" value="<?php echo $prodRs["productName"]; ?>">
                                <span>Do not Exceed 20 characters when entering the product name</span>
                            </div>
                        </div>
                        <div class="row my-3 justify-content-between">
                            <div class="col-8 category">
                                <label class=" text-black-50 fw-bold d-block" for="category">Category</label>
                                <select name="category" id="category" class="w-100" disabled>
                                    <?php
                                    $cat = Database::search("SELECT category.name FROM category WHERE category.id = '" . $prodRs["category_id"] . "'");
                                    $catRs = $cat->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $prodRs["category_id"]; ?>"><?php echo $catRs["name"]; ?></option>
                                </select>
                            </div>
                            <div class="col-4 type">
                                <label class=" text-black-50 fw-bold d-block" for="type">Type</label>
                                <select name="type" id="type" class="w-100" disabled>
                                    <?php
                                    $type = Database::search("SELECT type.name FROM `type` WHERE type.id = '" . $prodRs["type_id"] . "'");
                                    $typeRs = $type->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $prodRs["type_id"]; ?>"><?php echo $typeRs["name"]; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 brand">
                                <label class="text-black-50 fw-bold d-block" for="brand">Brand</label>
                                <select name="type" id="type" class="w-100" disabled>
                                    <?php
                                    $brand = Database::search("SELECT brand.name FROM `brand` WHERE brand.id = '" . $prodRs["brand_id"] . "'");
                                    $brandRs = $brand->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $prodRs["brand_id"]; ?>"><?php echo $brandRs["name"]; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 description">
                                <label class=" text-black-50 fw-bold d-block" for="prodDescription">Description</label>
                                <textarea name="description" id="prodDescription" rows="10"><?php echo $prodRs["description"] ?></textarea>
                                <span>Do not Exceed 100 words when entering the product Description</span>
                            </div>
                        </div>
                    </div>
                    <!-- product details box -->
                    <!-- product image box -->
                    <div class="col-12 col-lg-6">
                        <div class="row my-3 justify-content-between">
                            <div class="col-12 prod-image">
                                <label class="text-black-50 fw-bold d-block" for="type">Product Images</label>
                            </div>
                            <?php
                            $img1 = Database::search("SELECT images.code FROM images WHERE images.product_id = '" . $p . "' AND images.img_no = 1");
                            $img2 = Database::search("SELECT images.code FROM images WHERE images.product_id = '" . $p . "' AND images.img_no = 2");
                            $img3 = Database::search("SELECT images.code FROM images WHERE images.product_id = '" . $p . "' AND images.img_no = 3");
                            $img4 = Database::search("SELECT images.code FROM images WHERE images.product_id = '" . $p . "' AND images.img_no = 4");

                            $img1Rs = $img1->fetch_assoc();
                            $img2Rs = $img2->fetch_assoc();
                            $img3Rs = $img3->fetch_assoc();
                            $img4Rs = $img4->fetch_assoc();
                            ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6 my-2 prod-image-bx prod-img-1">
                                        <img src="<?php echo $img1Rs["code"]; ?>" alt="prodImg" id="img1Prev">
                                    </div>
                                    <div class="col-12 col-lg-6 my-2 prod-image-bx prod-img-2 text-center">
                                        <img src="<?php echo $img2Rs["code"]; ?>" alt="prodImg" id="img2Prev">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row d-flex gx-1">
                                    <div class="col my-2 prod-img-3 text-center">
                                        <img src="<?php echo $img3Rs["code"]; ?>" alt="prodImg" id="img3Prev">
                                    </div>
                                    <div class="col my-2 prod-img-4 text-center">
                                        <img src="<?php echo $img4Rs["code"]; ?>" alt="prodImg" id="img4Prev">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center">
                                <input type='file' id="pImgUpload1" class="d-none" />
                                <label for="pImgUpload1" class="add-img-btns" onclick="productImgUpload1();">+ Image 1</label>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <input type='file' id="pImgUpload2" class="d-none" />
                                <label for="pImgUpload2" class="add-img-btns" onclick="productImgUpload2();">+ Image 2</label>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <input type='file' id="pImgUpload3" class="d-none" />
                                <label for="pImgUpload3" class="add-img-btns" onclick="productImgUpload3();">+ Image 3</label>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <input type='file' id="pImgUpload4" class="d-none" />
                                <label for="pImgUpload4" class="add-img-btns" onclick="productImgUpload4();">+ Image 4</label>
                            </div>
                        </div>
                        <div class="row product-img-specs">
                            <div class="col-12 my-2">
                                <p>You need to add at least 4 images. Pay attention to the quality of the pictures you add. Comply the Background Color standards. Picture must be in certain dimensions. note that the product shows all the details.</p>
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="size">Price</label>
                                <input class="d-block w-100 prod-name" type="text" id="prodPrice" value="<?php echo $prodRs["price"]; ?>">
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="deliveryCost">Delivery Cost</label>
                                <input class="d-block w-100 prod-name" type="text" id="deliveryCost" value="<?php echo $prodRs["delivery_fee"]; ?>">
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="qty">Quantity</label>
                                <input type="text" name="date" id="prodQty" value="<?php echo $prodRs["qty"]; ?>">
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="date">Date</label>
                                <input type="date" name="date" id="date" value="<?php echo $prodRs["date_added"]; ?>" disabled>
                            </div>
                            <div class="col-12 my-2">
                                <label class=" text-black-50 fw-bold d-block"></label>
                                <button class="w-100" onclick="updateProduct(<?php echo $p; ?>);">Update Product</button>
                            </div>
                        </div>
                    </div>
                    <!-- product image box -->

                </div>
                <!-- Add product Form -->

            </div>
        </div>
        <!-- ============= Page Content ============= -->


        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/admin.js"></script>
    <?php
    } else {
    ?>
        <script>
            window.location = "adminLogin.php";
        </script>
    <?php
    }

    ?>
</body>

</html>