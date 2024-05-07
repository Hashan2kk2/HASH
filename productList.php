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
        <div class="row g-2 justify-content-center" id="latest">
            <div class="col col-lg-10 d-flex align-items-center justify-content-center flex-wrap">
                <?php

                for ($i = 0; $i < $pNr; $i++) {
                    $productData = $productRs->fetch_assoc();

                    ?>

                    <div
                        style="width: 260px; height: 300px; margin: 20px; display: flex; justify-content: center; padding-top: 10px; flex-direction: column; border: 1px solid #dddddd; background: #ffffff; background: -webkit-linear-gradient(0deg, #ffffff 0%, #f0efef 100%); background: linear-gradient(0deg, #ffffff 0%, #f0efef 100%); border-radius: 10px;">
                        <a href="<?php echo "singleProductView.php?pid='" . $productData["id"] . "'"; ?>"
                            class="d-flex align-items-center justify-content-center"
                            style="height: 180px; aspect-ratio: 1/1; overflow: hidden;">
                            <img src="<?php echo $productData["code"]; ?>"
                                style="height: 180px; object-fit: contain; object-position: center;" alt="">
                        </a>
                        <div class="text-start mt-2">
                            <h5 class="text-dark text-start ps-2" style="font-size: 15px;">
                                <?php echo $productData["productName"]; ?>
                            </h5>
                        </div>
                        <hr class="border border-1" style="margin-top: 0px;">
                        <div class="main-div d-flex" style="margin-top: -10px;">
                            <div class="d-flex align-items-center justify-content-between ps-2 fw-normal"
                                style=" width: calc(100% / 1.5); height: 50px;">
                                <p class="my-auto" style="font-size: 14px;">Price
                                    <br>LKR <?php echo $productData["price"]; ?>.00
                                </p>
                            </div>
                            <div class="d-flex wishlist-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i onclick="addtoWishList(<?php echo $productData['id']; ?>);" style="cursor: pointer;"
                                    class="text-black-50 bi bi-heart fs-4"></i>
                            </div>
                            <div class="d-flex cart-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i style="cursor: pointer;" class='text-black-50 bi bi-bag fs-4'
                                    onclick="addToCart(<?php echo $productData['id']; ?>);"></i>
                            </div>
                        </div>

                    </div>
                    <?php
                }

                ?>
            </div>
        </div>
    </div>


    <?php
    require "footer.php";
    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>