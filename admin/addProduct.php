<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | HASH</title>
    <!-- css links -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ==================================== -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/adminSideNav.css">
</head>

<body>
    <?php

    session_start();
    require "../connection.php";

    if (isset($_SESSION["admin"])) {
    ?>
        <!-- ============= Page Content ============= -->
        <div class="wrapper d-flex align-items-stretch">
            <?php
            require "adminNav.php";
            ?>
            <div id="content" class="p-4 p-md-5 add-product">

                <div class="row">
                    <div class="col-2">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>
                    <div class="col-8 logo"></div>
                    <div class="col fs-4 fw-bold">Admin</div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h2 class="pg-title">Edit Products</h2>
                    </div>
                    <div class="col-12">
                        <p class="pg-description">The Most Important Feature Of The Product Editing Section Is The Product Adding Part. When Adding Product Here, Do Not Ignore
                            To Fill In All The Required Fields Completely And Follow All The Product Adding Rules.</p>
                    </div>
                </div>

                <!-- overview addproduct bar -->
                <div class="row">
                    <div class="col-12 overview-addproduct-bar">
                        <button>Overview</button>
                        <button>+ Add Product</button>
                    </div>
                </div>
                <!-- overview addproduct bar -->

                <!-- overview -->
                <div class="row">
                    <!-- search bar -->
                    <div class="col-12 d-flex end-0">
                        <div class="input-group search-bar">
                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bx-search-alt'></i></div>
                            <input type="text" class="search" placeholder="Search for ID, Brand, Category or Somthing..." aria-label="Search for ID, Brand, Category or Somthing..." aria-describedby="btnGroupAddon">
                        </div>
                    </div>
                </div>
                <!-- search bar -->
                <!-- products list -->
                <div class="col-12 products-list">
                    <div class="row no-gutters gy-0 justify-content-around">
                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->

                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->

                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->

                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->

                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->

                        <!-- card -->
                        <div class="col-11 col-md-5 card-body d-block">
                            <div class="product-img d-flex">
                                <img src="../img/jacket.png" alt="product-img">
                            </div>
                            <div class="product-details d-flex justify-content-around">
                                <div class="product-name align-items-center d-flex">
                                    Nike Sportswear Tech Fleece
                                </div>
                                <div class="edit align-items-center d-flex">
                                    <button><i class='bx bxs-edit'></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                    </div>
                </div>
                <!-- products list -->
                <!-- overview -->
            </div>
        </div>
        <!-- ============= Page Content ============= -->


        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/admin.js"></script>
    <?php
    } else {
    ?>
        <script>
            window.location = "adminLogin.php";
        </script>
    <?php
    }

    ?>
</body>

</html>