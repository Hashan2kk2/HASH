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
    require "navbar.php";

    if (isset($_SESSION["userEmail"])) {

        $iud = $_SESSION["userEmail"]["id"];
        $total = 0;
        $subTotal = 0;

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $uid . "'");
        $cart_num = $cart_rs->num_rows;

        $cartCountRs = Database::search("SELECT COUNT(id) AS cartCount FROM cart WHERE user_id = '" . $uid . "' ");
        $cartCountData = $cartCountRs->fetch_assoc();
        $cartcount = $cartCountData["cartCount"];
    ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1 class="ps-5 pt-3">My Cart</h1>
                </div>
            </div>

            <?php

            if ($cartcount == 0) {

            ?>

                <!-- no items -->
                <div class="row">
                    <div class="col-12 vh-50 align-items-center justify-content-center d-flex">
                        <div class="empty-cart-wrapper">
                            <div class="text-center">
                                <i class='bx bx-cart-alt'></i>
                                <h2>Your Cart is Empty</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- no items -->
            <?php

            } else {
            ?>
                <div class="row">
                    <div class="col-12 col-lg-7 cart-wrapper">
                        <hr class="my-4">
                        <?php

                        for ($i = 0; $i < $cart_num; $i++) {

                            $cart_data = $cart_rs->fetch_assoc();

                            $productRs = Database::search("SELECT product.productName,category.name AS catName,`type`.name AS tName,product.price FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN `type` ON product.type_id = `type`.id  WHERE product.id = '" . $cart_data["product_id"] . "'");

                            $product_data = $productRs->fetch_assoc();

                            $imageRs = Database::search("SELECT images.code FROM images WHERE product_id = '" . $cart_data["product_id"] . "' AND images.img_no = '1'");

                            $imageData = $imageRs->fetch_assoc();

                        ?>
                            <!-- cart cards -->
                            <div class="row justify-content-center py-2">
                                <div class="col-12 cart-card">
                                    <div class="row">
                                        <div class="col-4 align-items-center justify-content-center d-flex">
                                            <div class="cart-img-bx">
                                                <img src="<?php echo $imageData["code"] ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <!-- card title -->
                                            <div class="d-flex justify-content-between">
                                                <h3><?php echo $product_data["productName"]; ?></h3>
                                                <button onclick="removeFromCart(<?php echo $cart_data["product_id"]; ?>);" style="background-color: white; border-radius: 4px; border: none; outline: none; width: 30px; height: 30px;"><i class='bx bxs-trash'></i></button>
                                            </div>
                                            <p>Category : <span><?php echo $product_data["catName"]; ?></span></p>
                                            <p>Type : <span><?php echo $product_data["tName"]; ?></span></p>
                                            <a href="<?php echo "singleProductView.php?pid='" . $cart_data["product_id"] . "'"; ?>">
                                                <button class="btn btn-primary">View Product</button>
                                            </a>
                                            <!-- card title -->
                                            <p></p>
                                        </div>
                                        <hr class="my-3">
                                        <div class="col-12 text-end">
                                            <?php
                                            $unitPrice = $product_data["price"];
                                            $quantity = $cart_data["qty"];
                                            $total = (int)$unitPrice * (int)$quantity;
                                            ?>
                                            <p class="fs-4 d-inline">Quantity : <span><?php echo $quantity; ?></span></p>
                                            <p class="fs-4 d-inline">|</p>
                                            <p class="fs-4 d-inline">unit Price : <span><?php echo $unitPrice; ?></span></p>
                                            <p class="fs-4 fw-bold">Total : <span><?php echo $total; ?>.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- cart cards -->
                        <?php
                        }

                        ?>

                    </div>
                    <!-- chackout box -->
                    <div class="col-12 col-lg-5 mt-5 ms-4 ms-lg-0 justify-content-center align-items-center">
                        <div class="row mt-2 checkout-wrapper">
                            <hr class="my-4">
                            <div class="col-12 checkout text-center">
                                <a href="invoice.php">
                                    <button>Checkout</button>
                                </a>
                                <div>We Accept</div>
                                <div>

                                    <i class='bx bxl-visa'></i><i class='bx bxl-mastercard'></i><i class='bx bxl-paypal'></i>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chackout box -->
                </div>
                <!-- if items in the cart -->
            <?php
            }

            ?>
            <!-- if items in the cart -->

        </div>

    <?php
        require "footer.php";
    } else {
    ?>
        <script>
            window.location = "index.php";
        </script>

    <?php
    }

    ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>