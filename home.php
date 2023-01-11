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

    ?>

    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
            <div class="col-5 text-center col-md-2 selection active" id="latestbtn" onclick="switchLatest();">Latest</div>
            <div class="col-5 text-center col-md-2 selection" id="mentbtn" onclick="switchMens();">For Mens</div>
            <div class="col-5 text-center col-md-2 selection" id="womanbtn" onclick="switchWomans();">For Womans</div>
            <div class="col-5 text-center col-md-2 selection" id="kidbtn" onclick="switchKids();">For Kids</div>
        </div>
        <!-- Selection -->

        <!-- latest Products -->
        <div class="row g-2 d-flex justify-content-center" id="latest">
            <?php

            $prod = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 ORDER BY id DESC LIMIT 4");
            $prodNr = $prod->num_rows;
            for ($i = 0; $i < $prodNr; $i++) {
                $prodRs = $prod->fetch_assoc();
                // echo $prodRs["code"];
            ?>
                <div class="col-7 col-sm-5 col-lg-3">
                    <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; cursor: pointer; overflow: hidden;">
                        <img src='<?php echo $prodRs["code"]; ?>' alt="shoe" class="img-fluid">
                    </div>
                    <div class="row p-2">
                        <div class="col-10">
                            <?php echo $prodRs["productName"]; ?>
                        </div>
                        <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $prodRs["id"]; ?>);">
                            <i class="bx bx-heart"></i>
                        </div>
                    </div>
                    <div class="row mx-1 p-2 price">
                        <div class="col-10 text-white">
                            <?php echo $prodRs["price"] . '.00'; ?>
                        </div>
                        <div onclick="addToCart(<?php echo $prodRs["id"]; ?>);" class="col-2 text-center text-white" style="cursor: pointer;">
                            <i class='bx bx-cart-alt fs-4'></i>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "0"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- latest Products -->

        <!-- mens Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forMen">
            <?php

            $men = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 2 ORDER BY id LIMIT 4");
            $menNr = $men->num_rows;
            for ($i = 0; $i < $menNr; $i++) {
                $menRs = $men->fetch_assoc();
                // echo $menRs["code"];
            ?>
                <div class="col-7 col-sm-5 col-lg-3">
                    <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; overflow: hidden;">
                        <img src='<?php echo $menRs["code"]; ?>' alt="shoe" class="img-fluid">
                    </div>
                    <div class="row p-2">
                        <div class="col-10">
                            <?php echo $menRs["productName"]; ?>
                        </div>
                        <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $menRs["id"]; ?>);">
                            <i class="bx bx-heart"></i>
                        </div>
                    </div>
                    <div class="row mx-1 p-2 price">
                        <div class="col-10 text-white">
                            <?php echo $menRs["price"] . '.00'; ?>
                        </div>
                        <div class="col-2 text-center text-white">
                            <i class='bx bxs-message-square-add fs-4'></i>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "2"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- mens Products -->
        <!-- woman Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forWoman">
            <?php

            $ladies = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 3 ORDER BY id LIMIT 4");
            $ladiesNr = $ladies->num_rows;
            // echo $ladiesNr;
            for ($i = 0; $i < $ladiesNr; $i++) {
                $ladiesRs = $ladies->fetch_assoc();
                // echo $ladiesRs["code"];
            ?>
                <div class="col-7 col-sm-5 col-lg-3">
                    <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; overflow: hidden;">
                        <img src='<?php echo $ladiesRs["code"]; ?>' alt="shoe" class="img-fluid">
                    </div>
                    <div class="row p-2">
                        <div class="col-10">
                            <?php echo $ladiesRs["productName"]; ?>
                        </div>
                        <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $ladiesRs["id"]; ?>);">
                            <i class="bx bx-heart"></i>
                        </div>
                    </div>
                    <div class="row mx-1 p-2 price">
                        <div class="col-10 text-white">
                            <?php echo $ladiesRs["price"] . '.00'; ?>
                        </div>
                        <div class="col-2 text-center text-white">
                            <i class='bx bxs-message-square-add fs-4'></i>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
            <div class="col-12 text-end">
                <a href="productListing.php?tid=<?php echo "3"; ?>" class="text-decoration-none fs-6">View More</a>
            </div>
        </div>
        <!-- woman Products -->
        <!-- woman Products -->
        <div class="row g-2 d-flex justify-content-center d-none" id="forKids">
            <?php

            $kids = Database::search("SELECT product.id ,product.productName, product.price,product.qty,product.description,product.delivery_fee, images.code,product.type_id AS tId FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND product.type_id = 1 ORDER BY id LIMIT 4");
            $kidsNr = $kids->num_rows;
            // echo $kidsNr;
            for ($i = 0; $i < $kidsNr; $i++) {
                $kidsRs = $kids->fetch_assoc();
                // echo $kidsRs["code"];
            ?>
                <div class="col-7 col-sm-5 col-lg-3">
                    <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; overflow: hidden;">
                        <img src='<?php echo $kidsRs["code"]; ?>' alt="shoe" class="img-fluid">
                    </div>
                    <div class="row p-2">
                        <div class="col-10">
                            <?php echo $kidsRs["productName"]; ?>
                        </div>
                        <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;" onclick="addtoWishList(<?php echo $kidsRs["id"]; ?>);">
                            <i class="bx bx-heart"></i>
                        </div>
                    </div>
                    <div class="row mx-1 p-2 price">
                        <div class="col-10 text-white">
                            <?php echo $kidsRs["price"] . '.00'; ?>
                        </div>
                        <div class="col-2 text-center text-white">
                            <i class='bx bxs-message-square-add fs-4'></i>
                        </div>
                    </div>
                </div>

            <?php
            }

            ?>
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



    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>