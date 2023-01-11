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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php

    // require "connection.php";
    require "navbar.php";
    if (isset($_SESSION["userEmail"])) {
    ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h1 class="ps-5 pt-3">My Wishlist</h1>
                </div>
            </div>

            <?php

            $uid = $_SESSION["userEmail"]["id"];
            $watchlistRs = Database::search("SELECT * FROM watchlist WHERE user_id = '" . $uid . "'");

            $watchlistNr = $watchlistRs->num_rows;
            $countRs = Database::search("SELECT COUNT(watchlist.product_id) AS count FROM watchlist WHERE watchlist.user_id = '" . $uid . "'");

            $count = $countRs->fetch_assoc();
            if ($count["count"] == 0) {
            ?>
                <!-- no items -->
                <div class="row">
                    <div class="col-12 vh-50 align-items-center justify-content-center d-flex">
                        <div class="empty-cart-wrapper">
                            <div class="text-center">
                                <i class='bx bxs-heart-circle'></i>
                                <h2>Your Wishlist is Empty</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- no items -->
            <?php
            } else {
            ?>
                <!-- if items in the cart -->
                <div class="row">
                    <div class="col-12 cart-wrapper">
                        <hr class="my-4">
                        <?php
                        for ($i = 0; $i < $watchlistNr; $i++) {
                            $watchlistData = $watchlistRs->fetch_assoc();

                            $prodId = $watchlistData["product_id"];
                            $prodRs = Database::search("SELECT product.price,product.productName,images.code FROM product INNER JOIN images ON product.id = images.product_id WHERE img_no = 1 AND product.id = '" . $prodId . "'");
                            $prodData = $prodRs->fetch_assoc();

                            $otherRs = Database::search("SELECT product.productName, product.category_id, category.name,`type`.name AS tname FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN `type` ON product.type_id = `type`.id WHERE product.id = '" . $prodId . "'");
                            $otherData = $otherRs->fetch_assoc();

                        ?>
                            <!-- cart cards -->
                            <div class="row justify-content-center py-2">
                                <div class="col-12 cart-card">
                                    <div class="row">
                                        <div class="col-4 align-items-center justify-content-center d-flex">
                                            <div class="cart-img-bx">
                                                <img src="<?php echo $prodData["code"]; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <!-- card title -->
                                            <div class="d-flex justify-content-between">
                                                <h3><?php echo $prodData["productName"]; ?></h3>
                                                <button onclick="removefromWatchlist(<?php echo $prodId; ?>);" style="background-color: white; border-radius: 4px; border: none; outline: none; width: 30px; height: 30px;"><i class='bx bx-trash'></i></button>
                                            </div>
                                            <p>Category : <span><?php echo $otherData["name"]; ?></span></p>
                                            <p>Type : <span><?php echo $otherData["tname"]; ?></span></p>
                                            <p>Price : <span><?php echo $prodData["price"]; ?></span></p>
                                            <!-- card title -->
                                            <p></p>
                                        </div>
                                        <hr class="my-3">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary">Add To Cart</button>
                                            <button class="btn btn-dark">View Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- cart cards -->
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <!-- if items in the cart -->
            <?php
            }
            ?>



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