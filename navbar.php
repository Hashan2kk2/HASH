<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Css file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    require "connection.php";
    ?>

    <!-- topbar -->
    <div class="container-fluid">
        <div class="row ut-main py-2 px-xl-5">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="d-inline-flex align-items-center upperbar-tools">
                    <!-- <a class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Goto User Account">Hello Hashan</a> -->
                    <?php
                    if (isset($_SESSION["userEmail"])) {
                        $user = $_SESSION["userEmail"]["first_name"];
                        $uid = $_SESSION["userEmail"]["id"];
                        $urs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $uid . "'");
                        $n = $urs->num_rows;
                        $udata = $urs->fetch_assoc();
                    ?>
                        <a class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Goto User Account" href="userProfile.php">Hello <?php echo $udata["first_name"]; ?></a>
                        <span class="text-muted px-2">|</span>
                        <a class="" href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Log Out" onclick="signout();">Logout</a>
                    <?php
                    } else {
                    ?>
                        <a class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Log In" onclick="loginPage();">Log In</a>
                    <?php
                    }
                    ?>
                    <span class="text-muted px-2">|</span>
                    <a class="" href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Help">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="" href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Support">Support</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-lg-end">
                <div class="d-inline-flex align-items-center justify-content-between">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pe-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- visible logo in medim size screens -->
        <!-- <div class="container-fluid"> -->
        <div class="row d-lg-none logo-md-bx">
            <div class="col-12 d-flex align-items-center justify-content-center py-3">
                <img src="img/Asset 7.png" alt="logo" width="100">
            </div>
        </div>
        <!-- </div> -->
        <!-- visible logo in medim size screens -->

        <!-- bottom bar -->
        <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-12 bottom-nav">
                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">Featured</a>
                <a href="#">Pricing</a>
            </div>
        </div>
        <!-- </div> -->
        <!-- bottom bar -->

        <div class="row search-div align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="img-fluid">
                    <img src="img/Asset 7.png" width="100" alt="">
                </a>
            </div>
            <div class="col-7 col-md-6 offset-md-2 offset-lg-0 text-end">
                <div class="input-group gap-1">
                    <input type="text" class="form-control search" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text h-100">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-2 text-center h-100 gap-md-1 gap-md-3 d-flex">
                <?php
                if (isset($_SESSION["userEmail"])) {
                ?>
                    <button class="navbtn text-center d-flex justify-content-center align-items-center" onclick="gotoCart();">
                        <?php
                        $cart = Database::search("SELECT COUNT(id) AS cartCount FROM cart WHERE user_id = '" . $uid . "'");
                        $cartRs = $cart->fetch_assoc();
                        ?>
                        <i class="fas fa-shopping-cart ps-2"></i>
                        <span class="badge"><?php echo $cartRs["cartCount"]; ?></span>
                    </button>
                    <button class="navbtn text-center d-flex justify-content-center align-items-center" onclick="gotoWatchlist();">
                        <?php
                        $watchlist = Database::search("SELECT COUNT(id) AS count FROM watchlist WHERE user_id = '" . $uid . "'");
                        $watchlistRs = $watchlist->fetch_assoc();
                        ?>
                        <i class="fas fa-heart ps-2"></i>
                        <span class="badge"><?php echo $watchlistRs["count"]; ?></span>
                    </button>
                <?php
                }else{
                    ?>
                    <label>Please Login or Signup</label>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- topdar -->

    <script>
        function gotoWatchlist() {
            window.location = "watchlist.php";
        }

        function gotoCart() {
            window.location = "cart.php";
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>