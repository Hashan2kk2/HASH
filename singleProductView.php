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
        <div class="row">
            <div class="col-12 sp-view-main-container">
                <div class="row">
                    <div class="col-12 my-3 p-name">
                        Ultraboost 5 DNA Shoes
                    </div>
                    <div class="col-12 my-3 fs-4 p-ratings">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <span>175</span>
                    </div>
                    <div class="col-12 p-price">
                        <span>Rs. 1920.00</span>
                    </div>
                </div>
                <div class="row p-images">
                    <!-- product images -->
                    <div class="col-12 p-img-container">
                        <img src="img/jacket.png" alt="">
                    </div>
                    <div class="col-12 p-img-container">
                        <img src="img/jacket.png" alt="">
                    </div>
                    <div class="col-12 p-img-container">
                        <img src="img/jacket.png" alt="">
                    </div>
                    <!-- product images -->
                </div>
                <div class="row">
                    <div class="col-12 p-colors">
                        <span>Colors Available</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Default checked radio
                            </label>
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