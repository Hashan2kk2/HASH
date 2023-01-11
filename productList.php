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