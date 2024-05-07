<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php

    // require "connection.php";
    require "navbar.php";

    ?>

    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active carousel-1 ">
                <div class="carousel-caption d-none d-md-block">
                    <button class="carousel-btn">Shop Men</button>
                    <button class="carousel-btn">Shop Woman</button>
                    <h5>COMFORT THAT KEEPS UP</h5>
                    <p>On-the-go style is softer than ever thanks to these hoodies and sweats</p>
                </div>
            </div>
            <div class="carousel-item carousel-2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>COMFORT NEVER FOLLOWS. COMFORT LEADS</h5>
                    <p>Unlock your possibilities and inner confidence by finding your ultimate state of comfort.</p>
                </div>
            </div>
            <div class="carousel-item carousel-3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>WOMEN’S CLOTHING</h5>
                    <p>Authenticated by Experts</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel -->

    <!-- Popular Right Now -->

    <section class="container-fluid container-lg">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center d-flex popular-right-now mt-4 py-3">
                <h2 class="text-black">popular now</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 pt-3 links">
                <p class="text-center">Shoes</p>
            </div>
            <div class="col-6 col-md-3 pt-3 links">
                <p class="text-center">T-Shirts</p>
            </div>
            <div class="col-6 col-md-3 pt-3 links">
                <p class="text-center">Backpacks</p>
            </div>
            <div class="col-6 col-md-3 pt-3 links">
                <p class="text-center">Wearables</p>
            </div>
        </div>
        <!-- Popular Right Now -->
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-12 cat category-1"></div>
                </div>
                <div class="row product-text">
                    <div class=" text-center col-12">
                        Shoes
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-12 cat category-2"></div>
                </div>
                <div class="row product-text">
                    <div class=" text-center col-12">
                        T Shirts
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-12 cat category-3"></div>
                </div>
                <div class="row product-text">
                    <div class=" text-center col-12">
                        Backpacks
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="row">
                    <div class="col-12 cat category-4"></div>
                </div>
                <div class="row product-text">
                    <div class=" text-center col-12">
                        Watches
                    </div>
                </div>
            </div>
        </div>

        <!-- Selection -->
        <div class="row d-flex justify-content-center my-3 gap-1">
            <div class="col-5 text-center col-md-2 selection active" id="latestbtn" onclick="switchLatest();">Latest
            </div>
            <div class="col-5 text-center col-md-2 selection" id="mentbtn" onclick="switchMens();">For Mens</div>
            <div class="col-5 text-center col-md-2 selection" id="womanbtn" onclick="switchWomans();">For Womans</div>
            <div class="col-5 text-center col-md-2 selection" id="kidbtn" onclick="switchKids();">For Kids</div>
        </div>
        <!-- Selection -->

        <!-- latest Products -->
        <div class="row g-2 d-flex justify-content-center" id="latest">

            <div class="col d-flex align-items-center justify-content-center flex-wrap">
                <?php

                $prod = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 ORDER BY id DESC LIMIT 4");
                $prodNr = $prod->num_rows;
                for ($i = 0; $i < $prodNr; $i++) {
                    $prodRs = $prod->fetch_assoc();
                    // echo $prodRs["code"];
                    ?>
                    <div
                        style="width: 260px; height: 300px; margin: 20px; display: flex; justify-content: center; padding-top: 10px; flex-direction: column; border: 1px solid #dddddd; background: #ffffff; background: -webkit-linear-gradient(0deg, #ffffff 0%, #f0efef 100%); background: linear-gradient(0deg, #ffffff 0%, #f0efef 100%); border-radius: 10px;">
                        <a href="<?php echo "singleProductView.php?pid='" . $prodRs["id"] . "'"; ?>"
                            class="d-flex align-items-center justify-content-center"
                            style="height: 180px; aspect-ratio: 1/1; overflow: hidden;">
                            <img src="<?php echo $prodRs["code"]; ?>"
                                style="height: 180px; object-fit: contain; object-position: center;" alt="">
                        </a>
                        <div class="text-start mt-2">
                            <h5 class="text-dark text-start ps-2" style="font-size: 15px;">
                                <?php echo $prodRs["productName"]; ?>
                            </h5>
                        </div>
                        <hr class="border border-1" style="margin-top: 0px;">
                        <div class="main-div d-flex" style="margin-top: -10px;">
                            <div class="d-flex align-items-center justify-content-between ps-2 fw-normal"
                                style=" width: calc(100% / 1.5); height: 50px;">
                                <p class="my-auto" style="font-size: 14px;">Price
                                    <br>LKR <?php echo $prodRs["price"] . '.00'; ?>
                                </p>
                            </div>
                            <div class="d-flex wishlist-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i onclick="addtoWishList(<?php echo $prodRs['id']; ?>);" style="cursor: pointer;"
                                    class="text-black-50 bi bi-heart fs-4"></i>
                            </div>
                            <div class="d-flex cart-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i style="cursor: pointer;" class='text-black-50 bi bi-bag fs-4'
                                    onclick="addToCart(<?php echo $prodRs['id']; ?>);"></i>
                            </div>
                        </div>

                    </div>
                    <?php
                }

                ?>
            </div>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "0"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- latest Products -->

        <!-- mens Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forMen">
            <div class="col d-flex align-items-center justify-content-center flex-wrap">
                <?php

                $men = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 2 ORDER BY id LIMIT 4");
                $menNr = $men->num_rows;
                for ($i = 0; $i < $menNr; $i++) {
                    $menRs = $men->fetch_assoc();
                    // echo $menRs["code"];
                    ?>
                    <div
                        style="width: 260px; height: 300px; margin: 20px; display: flex; justify-content: center; padding-top: 10px; flex-direction: column; border: 1px solid #dddddd; background: #ffffff; background: -webkit-linear-gradient(0deg, #ffffff 0%, #f0efef 100%); background: linear-gradient(0deg, #ffffff 0%, #f0efef 100%); border-radius: 10px;">
                        <a href="<?php echo "singleProductView.php?pid='" . $menRs["id"] . "'"; ?>"
                            class="d-flex align-items-center justify-content-center"
                            style="height: 180px; aspect-ratio: 1/1; overflow: hidden;">
                            <img src="<?php echo $menRs["code"]; ?>"
                                style="height: 180px; object-fit: contain; object-position: center;" alt="">
                        </a>
                        <div class="text-start mt-2">
                            <h5 class="text-dark text-start ps-2" style="font-size: 15px;">
                                <?php echo $menRs["productName"]; ?>
                            </h5>
                        </div>
                        <hr class="border border-1" style="margin-top: 0px;">
                        <div class="main-div d-flex" style="margin-top: -10px;">
                            <div class="d-flex align-items-center justify-content-between ps-2 fw-normal"
                                style=" width: calc(100% / 1.5); height: 50px;">
                                <p class="my-auto" style="font-size: 14px;">Price
                                    <br>LKR <?php echo $menRs["price"] . '.00'; ?>
                                </p>
                            </div>
                            <div class="d-flex wishlist-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i onclick="addtoWishList(<?php echo $menRs['id']; ?>);" style="cursor: pointer;"
                                    class="text-black-50 bi bi-heart fs-4"></i>
                            </div>
                            <div class="d-flex cart-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i style="cursor: pointer;" class='text-black-50 bi bi-bag fs-4'
                                    onclick="addToCart(<?php echo $mendRs['id']; ?>);"></i>
                            </div>
                        </div>

                    </div>
                    <?php
                }

                ?>
            </div>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "2"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- mens Products -->
        <!-- woman Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forWoman">
            <div class="col d-flex align-items-center justify-content-center flex-wrap">
                <?php

                $ladies = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 3 ORDER BY id LIMIT 4");
                $ladiesNr = $ladies->num_rows;
                // echo $ladiesNr;
                for ($i = 0; $i < $ladiesNr; $i++) {
                    $ladiesRs = $ladies->fetch_assoc();
                    // echo $ladiesRs["code"];
                    ?>
                    <div
                        style="width: 260px; height: 300px; margin: 20px; display: flex; justify-content: center; padding-top: 10px; flex-direction: column; border: 1px solid #dddddd; background: #ffffff; background: -webkit-linear-gradient(0deg, #ffffff 0%, #f0efef 100%); background: linear-gradient(0deg, #ffffff 0%, #f0efef 100%); border-radius: 10px;">
                        <a href="<?php echo "singleProductView.php?pid='" . $ladiesRs["id"] . "'"; ?>"
                            class="d-flex align-items-center justify-content-center"
                            style="height: 180px; aspect-ratio: 1/1; overflow: hidden;">
                            <img src="<?php echo $ladiesRs["code"]; ?>"
                                style="height: 180px; object-fit: contain; object-position: center;" alt="">
                        </a>
                        <div class="text-start mt-2">
                            <h5 class="text-dark text-start ps-2" style="font-size: 15px;">
                                <?php echo $ladiesRs["productName"]; ?>
                            </h5>
                        </div>
                        <hr class="border border-1" style="margin-top: 0px;">
                        <div class="main-div d-flex" style="margin-top: -10px;">
                            <div class="d-flex align-items-center justify-content-between ps-2 fw-normal"
                                style=" width: calc(100% / 1.5); height: 50px;">
                                <p class="my-auto" style="font-size: 14px;">Price
                                    <br>LKR <?php echo $ladiesRs["price"] . '.00'; ?>
                                </p>
                            </div>
                            <div class="d-flex wishlist-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i onclick="addtoWishList(<?php echo $ladiesRs['id']; ?>);" style="cursor: pointer;"
                                    class="text-black-50 bi bi-heart fs-4"></i>
                            </div>
                            <div class="d-flex cart-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i style="cursor: pointer;" class='text-black-50 bi bi-bag fs-4'
                                    onclick="addToCart(<?php echo $ladiesdRs['id']; ?>);"></i>
                            </div>
                        </div>

                    </div>
                    <?php
                }

                ?>
            </div>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "3"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- woman Products -->
        <!-- woman Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forKids">
            <div class="col d-flex align-items-center justify-content-center flex-wrap">
                <?php

                $kids = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 1 ORDER BY id LIMIT 4");
                $kidsNr = $kids->num_rows;
                // echo $kidsNr;
                for ($i = 0; $i < $kidsNr; $i++) {
                    $kidsRs = $kids->fetch_assoc();
                    // echo $kidsRs["code"];
                    ?>
                    <div
                        style="width: 260px; height: 300px; margin: 20px; display: flex; justify-content: center; padding-top: 10px; flex-direction: column; border: 1px solid #dddddd; background: #ffffff; background: -webkit-linear-gradient(0deg, #ffffff 0%, #f0efef 100%); background: linear-gradient(0deg, #ffffff 0%, #f0efef 100%); border-radius: 10px;">
                        <a href="<?php echo "singleProductView.php?pid='" . $kidsRs["id"] . "'"; ?>"
                            class="d-flex align-items-center justify-content-center"
                            style="height: 180px; aspect-ratio: 1/1; overflow: hidden;">
                            <img src="<?php echo $kidsRs["code"]; ?>"
                                style="height: 180px; object-fit: contain; object-position: center;" alt="">
                        </a>
                        <div class="text-start mt-2">
                            <h5 class="text-dark text-start ps-2" style="font-size: 15px;">
                                <?php echo $kidsRs["productName"]; ?>
                            </h5>
                        </div>
                        <hr class="border border-1" style="margin-top: 0px;">
                        <div class="main-div d-flex" style="margin-top: -10px;">
                            <div class="d-flex align-items-center justify-content-between ps-2 fw-normal"
                                style=" width: calc(100% / 1.5); height: 50px;">
                                <p class="my-auto" style="font-size: 14px;">Price
                                    <br>LKR <?php echo $kidsRs["price"] . '.00'; ?>
                                </p>
                            </div>
                            <div class="d-flex wishlist-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i onclick="addtoWishList(<?php echo $kidsRs['id']; ?>);" style="cursor: pointer;"
                                    class="text-black-50 bi bi-heart fs-4"></i>
                            </div>
                            <div class="d-flex cart-btn align-items-center justify-content-center"
                                style=" width: calc(100% / 6); height: 50px;">
                                <i style="cursor: pointer;" class='text-black-50 bi bi-bag fs-4'
                                    onclick="addToCart(<?php echo $ladiesdRs['id']; ?>);"></i>
                            </div>
                        </div>

                    </div>

                    <?php
                }

                ?>
            </div>

            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "1"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- woman Products -->

    </section>
    <?php
    require "footer.php";
    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.wishlist-btn').hover(function () {
                $(this).css('background-color', '#f0f0f0');
                $(this).children('i').addClass('bi-heart-fill');
                $(this).children('i').removeClass('bi-heart');
                $(this).children('i').css('color', '#000');
            }, function () {
                $(this).css('background-color', '#ffffff');
                $(this).children('i').removeClass('bi-heart-fill');
                $(this).children('i').addClass('bi-heart');
            });

            $('.cart-btn').hover(function () {
                $(this).css('background-color', '#f0f0f0');
                $(this).children('i').addClass('bi-bag-fill');
                $(this).children('i').removeClass('bi-bag');
            }, function () {
                $(this).css('background-color', '#ffffff');
                $(this).children('i').removeClass('bi-bag-fill');
                $(this).children('i').addClass('bi-bag');
            });
        });
    </script>


    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>