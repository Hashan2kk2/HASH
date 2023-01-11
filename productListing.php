<?php
if (isset($_GET["tid"])) {
    $typeId = $_GET["tid"];
    // echo $typeId;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php

    // require "connection.php";
    require "navbar.php"; ?>

    <div class="container-fluid">

        <?php

        if ($typeId == 0) {
            $productRs = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 ORDER BY id DESC");
            $pNr = $productRs->num_rows;
        ?>
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1 class="h3">Latest Products</h1>
                </div>
            </div>
            <div class="row g-2 d-flex justify-content-center" id="latest">
                <?php

                for ($i = 0; $i < $pNr; $i++) {
                    $productData = $productRs->fetch_assoc();

                ?>
                    <div class="col-7 col-sm-5 col-lg-3">
                        <a href="<?php echo "singleProductView.php?pid='" . $productData["id"] . "'"; ?>">
                            <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; cursor: pointer; overflow: hidden;">
                                <img src='<?php echo $productData["code"]; ?>' alt="shoe" class="img-fluid">
                            </div>
                        </a>
                        <div class="row p-2">
                            <div class="col-10">
                                <?php echo $productData["productName"]; ?>
                            </div>
                            <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $productData["id"]; ?>);">
                                <i class="bx bx-heart"></i>
                            </div>
                        </div>
                        <div class="row mx-1 p-2 price">
                            <div class="col-10 text-white">
                                <?php echo $productData["price"] . '.00'; ?>
                            </div>
                            <div onclick="addToCart(<?php echo $productData["id"]; ?>);" class="col-2 text-center text-white" style="cursor: pointer;">
                                <i class='bx bx-cart-alt fs-4'></i>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        <?php
        } else if ($typeId == 1) {
            $kidsRs = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 1 ORDER BY id DESC");
            $kNr = $kidsRs->num_rows;
        ?>
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1 class="h3">Kids Products</h1>
                </div>
            </div>
            <div class="row g-2 d-flex justify-content-center" id="latest">
                <?php

                for ($i = 0; $i < $kNr; $i++) {
                    $kidsData = $kidsRs->fetch_assoc();

                ?>
                    <div class="col-7 col-sm-5 col-lg-3">
                        <a href="<?php echo "singleProductView.php?pid='" . $kidsData["id"] . "'"; ?>">
                            <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; cursor: pointer; overflow: hidden;">
                                <img src='<?php echo $kidsData["code"]; ?>' alt="shoe" class="img-fluid">
                            </div>
                        </a>
                        <div class="row p-2">
                            <div class="col-10">
                                <?php echo $kidsData["productName"]; ?>
                            </div>
                            <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $kidsData["id"]; ?>);">
                                <i class="bx bx-heart"></i>
                            </div>
                        </div>
                        <div class="row mx-1 p-2 price">
                            <div class="col-10 text-white">
                                <?php echo $kidsData["price"] . '.00'; ?>
                            </div>
                            <div onclick="addToCart(<?php echo $kidsData["id"]; ?>);" class="col-2 text-center text-white" style="cursor: pointer;">
                                <i class='bx bx-cart-alt fs-4'></i>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        <?php
        } else if ($typeId == 2) {
            $mensRs = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 2 ORDER BY id DESC");
            $mNr = $mensRs->num_rows;
        ?>
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1 class="h3">Mens Products</h1>
                </div>
            </div>
            <div class="row g-2 d-flex justify-content-center" id="latest">
                <?php

                for ($i = 0; $i < $mNr; $i++) {
                    $mensData = $mensRs->fetch_assoc();

                ?>
                    <div class="col-7 col-sm-5 col-lg-3">
                        <a href="<?php echo "singleProductView.php?pid='" . $mensData["id"] . "'"; ?>">
                            <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; cursor: pointer; overflow: hidden;">
                                <img src='<?php echo $mensData["code"]; ?>' alt="shoe" class="img-fluid">
                            </div>
                        </a>
                        <div class="row p-2">
                            <div class="col-10">
                                <?php echo $mensData["productName"]; ?>
                            </div>
                            <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $mensData["id"]; ?>);">
                                <i class="bx bx-heart"></i>
                            </div>
                        </div>
                        <div class="row mx-1 p-2 price">
                            <div class="col-10 text-white">
                                <?php echo $mensData["price"] . '.00'; ?>
                            </div>
                            <div onclick="addToCart(<?php echo $mensData["id"]; ?>);" class="col-2 text-center text-white" style="cursor: pointer;">
                                <i class='bx bx-cart-alt fs-4'></i>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        <?php
        } else if ($typeId == 3) {
            $wmnsRs = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 3 ORDER BY id DESC");
            $wmNr = $wmnsRs->num_rows;
        ?>
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1 class="h3">Womans Products</h1>
                </div>
            </div>
            <div class="row g-2 d-flex justify-content-center" id="latest">
                <?php

                for ($i = 0; $i < $wmNr; $i++) {
                    $wmnsData = $wmnsRs->fetch_assoc();

                ?>
                    <div class="col-7 col-sm-5 col-lg-3">
                        <a href="<?php echo "singleProductView.php?pid='" . $wmnsData["id"] . "'"; ?>">
                            <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; cursor: pointer; overflow: hidden;">
                                <img src='<?php echo $wmnsData["code"]; ?>' alt="shoe" class="img-fluid">
                            </div>
                        </a>
                        <div class="row p-2">
                            <div class="col-10">
                                <?php echo $wmnsData["productName"]; ?>
                            </div>
                            <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $wmnsData["id"]; ?>);">
                                <i class="bx bx-heart"></i>
                            </div>
                        </div>
                        <div class="row mx-1 p-2 price">
                            <div class="col-10 text-white">
                                <?php echo $wmnsData["price"] . '.00'; ?>
                            </div>
                            <div onclick="addToCart(<?php echo $wmnsData["id"]; ?>);" class="col-2 text-center text-white" style="cursor: pointer;">
                                <i class='bx bx-cart-alt fs-4'></i>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    require "footer.php";
    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>