<?php
if (isset($_GET["tid"])) {
    $typeId = $_GET["tid"];
    echo $typeId;
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
    require "navbar.php";

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center my-3">
                <h1 class="h3">Womans Dresses</h1>
            </div>
            <!-- show advanced search button -->
            <div class="col-12 pb-3 text-center text-md-end justify-content-md-center d-flex d-md-block shw-advanced-search" id="advancedSearchButton">
                <button class=" me-md-5" onclick="shwAdvancedSearch();">Advanced Search</button>
            </div>
            <!-- show advanced search button -->
            <div class="col-12 advanced-search d-none" id="advancedSearchForm">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 text-end">
                        <button onclick="hideAdvancedSearch();" class="cancel-btn"><i class='bx bx-x-circle'></i></button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 my-2 col-lg-6 d-block text-center searchBar">
                        <input type="text" placeholder="Search for your product..." class="ms-3" style="width:95%;">
                    </div>
                    <br>
                    <!-- brand
                    category
                    type
                    price -->
                    <div class="col-12 my-2 col-lg-6 d-block">
                        <div class="row">
                            <div class="selections py-2 py-md-0 col-12 col-md-4">
                                <select name="brand" id="advncd-brand">
                                    <option value="0">Brand</option>
                                    <option>Nike</option>
                                </select>
                            </div>
                            <div class="selections py-2 py-md-0 col-12 col-md-4">
                                <select name="category" id="advncd-category">
                                    <option value="0">Category</option>
                                    <option>Nike</option>
                                </select>
                            </div>
                            <div class="selections py-2 py-md-0 col-12 col-md-4">
                                <select name="type" id="advncd-type">
                                    <option value="0">Type</option>
                                    <option>Nike</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-3 price-range justify-content-center">
                            <div class="col-12 col-md-3 my-2 my-md-0 offset-md-1 align-items-center d-flex">
                                <span>Price Range</span>
                            </div>
                            <div class="col-md-3 my-2 my-md-0 text-center align-items-center d-flex">
                                <input type="number">
                            </div>
                            <div class="col-1 text-center text-md-center align-items-center d-flex">
                                <span>to</span>
                            </div>
                            <div class="col-md-3 my-2 my-md-0 align-items-center d-flex">
                                <input type="number">
                            </div>
                        </div>
                        <div class="row py-3 apply-btn">
                            <button>Search</button>
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