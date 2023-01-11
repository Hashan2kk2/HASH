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

    $brandRs = Database::search("SELECT * FROM brand");
    $brandNr = $brandRs->num_rows;

    $categoryRs = Database::search("SELECT * FROM category");
    $categoryNr = $categoryRs->num_rows;

    $typeRs = Database::search("SELECT * FROM type");
    $typeNr = $typeRs->num_rows;


    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 my-2 col-lg-6 d-block text-center searchBar d-block">
                <input type="text" placeholder="Search for your product..." class="ms-3" style="width:100%;" id="search">
            </div>
            <br>
            <!-- brand
                    category
                    type
                    price -->
            <div class="col-12 my-2 col-lg-8 d-block">
                <div class="row mb-3">
                    <div class="col-12 apply-btn d-block">
                        <button onclick="advancedSearch(0);">Search</button>
                    </div>
                </div>
                <div class="row">
                    <div class="selections py-2 py-md-0 col-12 col-md-4">
                        <select name="brand" id="advncd-brand">
                            <option onchange="advancedSearch(0);" value="0">Brand</option>
                            <?php
                            for ($i = 0; $i < $brandNr; $i++) {
                                $brandData = $brandRs->fetch_assoc();
                            ?>
                                <option value="<?php echo $brandData["id"]; ?>"><?php echo $brandData["name"]; ?></option>
                            <?php    # code...
                            }
                            ?>

                        </select>
                    </div>
                    <div class="selections py-2 py-md-0 col-12 col-md-4">
                        <select name="category" id="advncd-category">
                            <option value="0">Category</option>
                            <?php
                            for ($i = 0; $i < $categoryNr; $i++) {
                                $categoryData = $categoryRs->fetch_assoc();
                            ?>
                                <option value="<?php echo $categoryData["id"]; ?>"><?php echo $categoryData["name"]; ?></option>
                            <?php    # code...
                            }
                            ?>
                        </select>
                    </div>
                    <div class="selections py-2 py-md-0 col-12 col-md-4">
                        <select name="type" id="advncd-type">
                            <option value="0">Type</option>
                            <?php
                            for ($i = 0; $i < $typeNr; $i++) {
                                $typeData = $typeRs->fetch_assoc();
                            ?>
                                <option value="<?php echo $typeData["id"]; ?>"><?php echo $typeData["name"]; ?></option>
                            <?php    # code...
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row py-3 price-range justify-content-center">
                    <div class="col-12 col-md-3 my-2 my-md-0 offset-md-1 align-items-center d-flex">
                        <span>Price Range</span>
                    </div>
                    <div class="col-md-3 my-2 my-md-0 text-center align-items-center d-flex">
                        <input type="number" id="priceFrom" onkeyup="advancedSearch(0);">
                    </div>
                    <div class="col-1 text-center text-md-center align-items-center d-flex">
                        <span>to</span>
                    </div>
                    <div class="col-md-3 my-2 my-md-0 align-items-center d-flex">
                        <input type="number" id="priceTo">
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2 col-12 col-lg-8 bg-white rounded mb-3">
                <div class="row">

                    <div class="offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row" id="view_area">

                            <div class="offset-5 col-2 mt-5">
                                <span class="text-black-50 fw-bold h1"><i class="bi bi-search fs-1"></i></span>
                            </div>
                            <div class="offset-3 col-6 mt-3 mb-5">
                                <span class="text-black-50 h1">No Items Searched Yet...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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