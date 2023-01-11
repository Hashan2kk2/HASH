<?php if (isset($_GET["pid"])) {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single Product View</title>

        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/singleProductView.css">

        <link rel="stylesheet" href="css/bootstrap.css">

        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
        <?php

        require "navbar.php";
        ?>

        <div class="container-fluid">

            <?php
            $prodid = $_GET["pid"];
            $prodRs = Database::search("SELECT * FROM product WHERE product.id = " . $prodid . "");
            $prodData = $prodRs->fetch_assoc();

            $img1Rs = Database::search("SELECT images.code FROM images WHERE product_id = " . $prodid . " AND images.img_no = 1");
            $img2Rs = Database::search("SELECT images.code FROM images WHERE product_id = " . $prodid . " AND images.img_no = 2");
            $img3Rs = Database::search("SELECT images.code FROM images WHERE product_id = " . $prodid . " AND images.img_no = 3");

            $img1Data = $img1Rs->fetch_assoc();
            $img2Data = $img2Rs->fetch_assoc();
            $img3Data = $img3Rs->fetch_assoc();

            ?>

            <!-- images -->
            <div class="row">
                <div class="col-12 sp-view-main-container">
                    <div class="row">
                        <div class="col-12 my-3 p-name">
                            <?php echo $prodData['productName']; ?>
                        </div>
                    </div>
                    <div class="row p-images">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <!-- product images -->
                                <div class="col-12 p-img-container justify-content-center align-items-center d-flex">
                                    <img src="<?php echo $img1Data["code"]; ?>" alt="">
                                </div>
                                <div class="col-12 col-md-6 p-img-container justify-content-center align-items-center d-flex">
                                    <img src="<?php echo $img2Data["code"]; ?>" alt="">
                                </div>
                                <div class="col-12 col-md-6 p-img-container justify-content-center align-items-center d-flex">
                                    <img src="<?php echo $img3Data["code"]; ?>" alt="">
                                </div>
                                <!-- product images -->
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 ps-lg-5">
                            <div class="row my-4">
                                <div class="col-12 p-price">
                                    <span class="fs-3"><?php echo $prodData["price"]; ?>.00</span>
                                </div>
                                <div class="col-12 my-3 fs-4 p-ratings">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <span>175</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- description -->
                                    <p><?php echo $prodData["description"] ?></p>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 p-colors">
                                    <span class="h3">Available Options</span>
                                    <hr>
                                    <div class="row">
                                        <span class="py-4 h4">Colors</span>
                                        <div class="col-12 d-flex gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="red" checked>
                                                <label class="form-check-label" for="red">
                                                    Red
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="green">
                                                <label class="form-check-label" for="green">
                                                    Green
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="blue">
                                                <label class="form-check-label" for="blue">
                                                    Blue
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="yellow">
                                                <label class="form-check-label" for="yellow">
                                                    Yellow
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="py-4 h4">Sizes</span>
                                        <div class="col-12 d-flex gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sizes" id="small" checked>
                                                <label class="form-check-label" for="small">
                                                    Small
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sizes" id="medium">
                                                <label class="form-check-label" for="medium">
                                                    Mediun
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sizes" id="large">
                                                <label class="form-check-label" for="large">
                                                    Large
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sizes" id="xl">
                                                <label class="form-check-label" for="xl">
                                                    XL
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">

                                        <?php

                                        $categoryRs = Database::search("SELECT category.name FROM product INNER JOIN category ON product.category_id = category.id WHERE product.id = " . $prodid . "");
                                        $categoryData = $categoryRs->fetch_assoc();

                                        ?>
                                        <div class="col-12 col-md-6">
                                            <p>Category: <span><?php echo $categoryData["name"] ?></span></p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p>Availability: <span><?php echo $prodData["qty"] ?></span> Units</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row d-none">
                                        <div class="col-12 qty">
                                            <span class="py-4 h4">Qantity</span>
                                            <input type="text" class="d-block mt-4">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-6 buttons addtocart my-2">
                                            <button onclick="addToCartSpView(<?php echo $prodid; ?>);">Add to Cart</button>
                                        </div>
                                        <div class="col-12 col-md-6 buttons addtowishlist my-2">
                                            <button onclick="addtoWishListSpView(<?php echo $prodid; ?>);"><i class='bx bxs-heart'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- images -->

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

<?php
} else {
?>
    <script>
        window.location = "home.php";
    </script>
<?php
}


?>